app.ui.premios = (function() {
    function init() {
        $(".js-ver-mas-premios-globales").on("click", abrirModalPremiosGlobalesCallback);
        $(".js-ver-mas-premios-actuales").on("click", abrirModalPremiosActualesCallback);
    }
    function abrirModalPremiosGlobalesCallback() {
        bootbox.dialog({
            className: "modal-premios-globales",
            message: function() {
                return $(".premios-globales-popup-js").html();
            },
            closeButton: true
        });
    }

    function abrirModalPremiosActualesCallback() {
        bootbox.dialog({
            className: "modal-premios-actuales",
            message: function() {
                return $(".premios-actuales-popup-js").html();
            },
            closeButton: true
        });
    }

    return {
        init: init
    };
})();