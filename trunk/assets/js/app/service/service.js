app.service = (function() {
    function uriService() {
        return app.url();
    }

    function get(uri) {
        return $.get(uri);
    }

    function post(uri, data) {
        return $.ajax({
            contentType: 'application/json; charset=UTF-8',
            url: uri,
            type: 'POST',
            data: data,
            dataType: 'json'
        });
    }
    
    function postSync(uri, data) {
        return $.ajax({
            contentType: 'application/json; charset=UTF-8',
            url: uri,
            type: 'POST',
            data: JSON.stringify(data),
            dataType: 'json',
            async: false
        });
    }


    function put(uri, data) {
        return $.ajax({
            contentType: 'application/json; charset=UTF-8',
            url: uri,
            type: 'PUT',
            data: JSON.stringify(data),
            dataType: 'json'
        });
    }

    function eliminar(uri, data) {
        return $.ajax({
            contentType: 'application/json; charset=UTF-8',
            url: uri,
            type: 'DELETE',
            data: JSON.stringify(data),
            dataType: 'json'
        });
    }


    return {
        url: uriService,
        get: get,
        post: post,
        postSync: postSync,
        put: put,
        eliminar: eliminar
    };
})();
