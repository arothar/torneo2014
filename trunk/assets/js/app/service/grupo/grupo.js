app.service.grupo = (function() {

    function enviarPartido(partido) {
        var url = app.service.url() + "prode/partido/";
        return app.service.post(url, partido);
    }
    return {
        enviarPartido: enviarPartido
    };
})();