// Función para mostrar u ocultar el botón basado en la posición del usuario en la página
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("btn-back-to-top").style.display = "block";
        } else {
            document.getElementById("btn-back-to-top").style.display = "none";
        }
    }

    // Función para volver al principio de la página cuando se hace clic en el botón
    document.getElementById("btn-back-to-top").addEventListener("click", function() {
        document.body.scrollTop = 0; // Para Safari
        document.documentElement.scrollTop = 0; // Para Chrome, Firefox, IE y Opera
    });