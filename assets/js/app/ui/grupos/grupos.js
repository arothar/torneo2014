app.ui.grupos = (function() {

    function init() {
        $('.partido').on('click', '.boton-editar', editarPartidoCallback);
        $('.partido').on('click', '.boton-enviar', enviarPartidoCallback);
        $('.partido').on('click', 'input', limpiarInput);
		$('.partido').on('change', 'input', comprobarEmpate);
        $('.partido input').numberMask({beforePoint:2});
		
		$('#grupos .partido').tooltip({position: "BOTTOM RIGHT"});
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
		partido.ganador= partidoPadre.find(".radioGanador:checked").attr("data-id");
        partido.golesVisitante = partidoPadre.find(".partido-gol-input-visitante").val();

        app.service.grupo.enviarPartido(partido).done(function() {
            botonActual.removeClass('boton-enviar').addClass('boton-editar');
            loader.css("display","none");
            botonActual.show();
			$("#alertSuccess").show("slow").delay(3000).queue(function(n) {
			  $(this).hide("slow"); n();
			});
            botonActual.parents(".partido").find("input").attr('disabled', true);
        });
    }
	
    function comprobarEmpate(){
        var textoActual = $(this);
		var partidoPadre = textoActual.parents(".partido");
		var partido = {};
		
        partido.ganador= partidoPadre.find(".radioGanador").attr("data-id");

		if (partido.ganador != null){
			partido.golesLocal = partidoPadre.find(".partido-gol-input-local").val();
			partido.golesVisitante = partidoPadre.find(".partido-gol-input-visitante").val();
			
			if (partido.golesLocal == partido.golesVisitante ){
				partidoPadre.find(".ganador").show();
				partidoPadre.find(".ganador-izq").show();
			}else{
				partidoPadre.find(".ganador").hide();
				partidoPadre.find(".ganador-izq").hide();
			}
		}
    }
	
    return {
        init: init
    };
})();