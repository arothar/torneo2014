app.service.usuario = (function() {

    function loguear(login) {
        var url = app.service.url() + "usuario/login/";
        return app.service.post(url, login);
    }

    function registrar(registro) {
        var url = app.service.url() + "usuario/registro/";
        return app.service.post(url, registro);
    }
    
    function obtenerEmpresa(codigoEmpresa) {
        var url = app.service.url() + "usuario/empresa/";
        return app.service.postSync(url, codigoEmpresa);
    }

    return {
        loguear: loguear,
        registrar: registrar,
        obtenerEmpresa: obtenerEmpresa
    };
})();