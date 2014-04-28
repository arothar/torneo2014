app.ui.detallePuntaje = (function() {

    function init() {
        $('.header-usuario .detalle').on('click', abrirModalDetallePuntaje);
    }

    function abrirModalDetallePuntaje() {
        console.log("ca");
        bootbox.dialog({
            className: "modal-detalle-puntaje",
            message: function() {
                return $(".js-detalle-puntaje").html();
            },
            closeButton: true
        });
    }

    return {
        init: init
    };
})();