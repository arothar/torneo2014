app.ui.login = (function() {

    function init() {
        $('.form-login').on('submit', enviarLoginCallback);
    }

    function enviarLoginCallback() {
        var username = $(".username_js").val();
        var codigoEmpresa = $(".js-codigo-empresa").val();
        var id = 0;
        app.service.usuario.obtenerEmpresa({'codigoEmpresa': codigoEmpresa})
                .done(function(resp) {
            id = resp;
        }).fail(function(e) {
            console.log(e);
            return false;
        });
        $("#username").val(id+"_"+username);
    }

    return {
        init: init
    };
})();