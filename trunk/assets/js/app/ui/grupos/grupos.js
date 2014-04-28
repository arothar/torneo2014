app.ui.grupos = (function() {
    function init() {
        $('.partido').on('click', '.boton-editar', editarPartidoCallback);
        $('.partido').on('click', '.boton-enviar', enviarPartidoCallback);
        $('.partido').on('click', 'input', limpiarInput);
        $('.partido input').numberMask({beforePoint:2});
      /*  
        $(".countdown").countdown({
		date: $('.hasta').html(),
		format: "on"
	});
        */
    }
    
    function limpiarInput(){
        $(this).val("");
    }
    
    function editarPartidoCallback() {
        var botonActual = $(this);
        botonActual.removeClass('boton-editar').addClass('boton-enviar');
        botonActual.parents(".partido").find("input").attr('disabled', false);
    }

    function enviarPartidoCallback() {
        var botonActual = $(this);
        var partidoPadre = botonActual.parents(".partido");
        var partido = {};
        var loader = partidoPadre.find(".loader-partido");
        botonActual.hide();
        loader.css("display","inline-block");
        partido.idPartido = partidoPadre.data("id");
        partido.golesLocal = partidoPadre.find(".partido-gol-input-local").val();
        partido.golesVisitante = partidoPadre.find(".partido-gol-input-visitante").val();
        app.service.grupo.enviarPartido(partido).done(function() {
            botonActual.removeClass('boton-enviar').addClass('boton-editar');
            loader.css("display","none");
            botonActual.show();
            botonActual.parents(".partido").find("input").attr('disabled', true);
        });
    }

    return {
        init: init
    };
})();