var app = (function() {

    function urlIndex() {
          // var url = "http://localhost/prodelucho/";
		  var url = "http://localhost/ProdeLucho/dev/";
		  //var url = "http://176.9.45.109/~elgranp/luchoprode/";

      // var url = "https://www.desafiomundial2014.com.ar/desafioMundialCert/appMundial/web/";

        return url;
    }

    function urlLogin() {
        var url = urlIndex() + "login";
        return url;
    }
    function urlLoginFB() {
        var url = urlIndex() + "fb";
        return url;
    }


    function urlHome() {
        var url = urlIndex() + "home";
        return url;
    }


    function urlNotLike() {
        var url = urlIndex() + "notLike";
        return url;
    }

    return {
        url: urlIndex,
        urlHome: urlHome,
        urlNotLike: urlNotLike,
        urlLogin: urlLogin,
        urlLoginFB: urlLoginFB
    };

})();