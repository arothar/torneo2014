app.ui = (function() {
   function init() {
       /* $(".partido-gol-input").on("keydown", function(e) {
            var keyCode = (e.keyCode ? e.keyCode : e.which);
            var caracter = String.fromCharCode(keyCode);
            if (!validarGol(caracter, $(this), keyCode)) {
                e.preventDefault();
            }
        });*/
    }

    function validarGol(caracter, input, keyCode) {
       /* if (caracter.match("[a-zA-Z]") || caracter === "" || caracter === " " || caracter === "  " || caracter === undefined) {
            return false;
        }
        if (input.val().length >= 2) {
            if(keyCode === 8 || keyCode === 9){
                return true;
            }
            return false;
        }
        return true;*/
    }

    return {
        init: init,
        validarGol: validarGol
    };
})();