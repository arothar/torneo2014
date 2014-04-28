app.ui.trivias = (function() {
    function init() {
        $(".js-boton-responder-trivia").on("click", abrirModalResponderTriviaCallback);
    }
    function abrirModalResponderTriviaCallback() {
        app.service.trivia.obtener()
                .done(function(trivia) {
            var popupTrivia = bootbox.dialog({
                className: "modal-responder-trivia",
                message: function() {
                    return $("#popupTrivia").render(trivia);
                },
                closeButton: false
            });

            $(".modal-responder-trivia").on("click", ".close", function() {
                var respuestaTrivia = {};
                respuestaTrivia.triviaId = $(".popup-trivia").data("id");
                respuestaTrivia.opcionId = -1;
                respuestaTrivia.tiempo = 1;
                app.service.trivia.enviar(respuestaTrivia);
                $(".contenedor-trivia").html($("#bannerTriviaRespondidoMal").render());
                popupTrivia.modal('hide');
            });

            var preparados = $(".modal-responder-trivia .preparados");
            var listos = $(".modal-responder-trivia .listos");
            var ya = $(".modal-responder-trivia .ya");
            var tiempo = $(".modal-responder-trivia .tiempo");

            var cont = 23;
            var interval = setInterval(function() {
                var respuestaTrivia = {};
                if (cont > 0) {
                    if (cont === 22) {
                        preparados.hide();
                        listos.show();
                    }
                    if (cont === 21) {
                        listos.hide();
                        ya.show();
                    }
                    if (cont === 20) {
                        ya.hide();
                        tiempo.show();
                    }
                    if (cont < 21)
                        tiempo.html(cont);
                    cont--;
                } else {
                    tiempo.html(0);
                    tiempo.addClass("reloj-parado");
                    clearInterval(interval);
                    respuestaTrivia.triviaId = $(".popup-trivia").data("id");
                    respuestaTrivia.opcionId = -1;
                    respuestaTrivia.tiempo = 1;
                    app.service.trivia.enviar(respuestaTrivia).done(function(resp) {
                        $(".respuesta").removeClass("js-respuesta").addClass("resp");
                        ;

                        $(".pregunta").html("Se ha expirado el tiempo. Vuelva a intentarlo mañana.");
                        $(".respuesta[data-id='" + resp + "']").addClass("resaltada-verde");
                        setTimeout(function() {
                            popupTrivia.modal('hide');
                        }, 3500);

                    });
                }
            }, 1000);
            $(".modal-responder-trivia").on("click", ".js-respuesta", function() {
                if (cont < 21) {
                    var opcion = $(this);
                    var respuestaTrivia = {};
                    respuestaTrivia.triviaId = opcion.parents(".popup-trivia").data("id");
                    respuestaTrivia.opcionId = opcion.data("id");
                    respuestaTrivia.tiempo = opcion.parents(".popup-trivia").find(".tiempo").html();
                    clearInterval(interval);
                    app.service.trivia.enviar(respuestaTrivia).done(function(resp) {
                        $(".respuesta").removeClass("js-respuesta").addClass("resp");
                        console.log(resp);
                        if (resp.respuesta === 0) {
                            $(".pregunta").html("Has respondido correctamente!");
                            $(".respuesta[data-id='" + respuestaTrivia.opcionId + "']").addClass("resaltada-verde");
                            if (resp.tipo === 0) {
                                $(".contenedor-trivia").html($("#bannerTriviaRespondidoConSorteo").render());
                            } else {
                                $(".contenedor-trivia").html($("#bannerTriviaRespondido").render());
                            }
                        } else {
                            $(".pregunta").html("Ha fallado. Vuelva a intentarlo mañana.");
                            $(".respuesta[data-id='" + respuestaTrivia.opcionId + "']").addClass("resaltada-roja");
                            $(".respuesta[data-id='" + resp + "']").addClass("resaltada-verde");
                            $(".contenedor-trivia").html($("#bannerTriviaRespondidoMal").render());
                        }
                        setTimeout(function() {
                            popupTrivia.modal('hide');
                        }, 3500);
                    });
                }
            });


        }).fail(function(resp) {
            console.log(resp);
        });
    }

    return {
        init: init
    };
})();