app.service.trivia = (function() {

    function obtener() {
        var url = app.service.url() + "trivia/";
        return app.service.get(url);
    }

    function enviar(respuestaTrivia) {
        var url = app.service.url() + "trivia/";
        return app.service.post(url, respuestaTrivia);
    }
    return {
        obtener: obtener,
        enviar: enviar
    };
})();