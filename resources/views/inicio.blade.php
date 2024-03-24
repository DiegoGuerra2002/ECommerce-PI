<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOMMERCE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="./css/inicio.css" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('inicio') }}">
                <img src="/images/logo.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top me-2">    
                <span class="d-inline-block">Mini-Super Hilda's</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('inicio') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contactenos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('pFrescos') }}">Productos Frescos</a></li>
                            <li><a class="dropdown-item" href="{{ route('pConge') }}">Productos Congelados</a></li>
                            <li><a class="dropdown-item" href="#">Cuidado Personal</a></li>
                            <li><a class="dropdown-item" href="#">Cuidado del Hogar</a></li>
                            <li><a class="dropdown-item" href="#">Cuidado de Mascotas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Nuevo div para el carrito -->
            <div class="ms-auto">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Carrito
                            <i class="bi bi-cart bi-lg"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>

    <section class="banner d-flex justify-content-center align-items-center">
        <img src="/images/banner.png" alt="Banner" style="max-width: 100%;">
    </section>

    <section class= "sec2 d-flex justify-content-center align-items-center">
        <h1 class= "Separadores"> Categorías destacadas  </h1>
    </section>

    <section class="card-section">
        <div class="card-group">
            <div class="card">
                <a class="dropdown-item" href="{{ route('pFrescos') }}">
                    <img src="/images/pfrescos.jpeg" class="card-img-top" alt="...">  
                </a> 
            </div>
            <div class="card">
                <a class="dropdown-item" href="#">
                   <img src="/images/pcuidadoper.jpeg" class="card-img-top" alt="..."> 
                </a>
            </div>
            <div class="card">
                <a class="dropdown-item" href="{{ route('pConge') }}">
                   <img src="/images/pcongelados.jpg" class="card-img-top" alt="..."> 
                </a>
            </div>
        </div>
    </section>
</main>

<footer>

    <section class="banner2 d-flex justify-content-center align-items-center">
        <img src="/images/banner2.png" alt="Banner" style="max-width: 100%;">
    </section>

    <section>
        <div class="card text-center border-0">
            <div class="card-header border-0">
                <h2> Mini-Super Hilda's S.A de C.V </h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Contactanos</h5>
                <p class="card-text">2441-5704<br>7876-0573<br>7260-8282
                    <br>
                    variedadeshildas@gmail.com
                </p>
            </div>
            <div class="card-footer text-body-secondary border-0" id="footer-date">
            </div>
        </div>
    </section>
</footer>
    <button id="btn-back-to-top" class="btn btn-primary rounded-circle"><i class="bi bi-arrow-up"></i></button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
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
    </script>

    <script>
        // Obtener el elemento del footer donde se mostrará la fecha
        var footerDateElement = document.getElementById("footer-date");

        // Crear un objeto de fecha para obtener la fecha actual
        var currentDate = new Date();

        // Formatear la fecha como "día/mes/año"
        var formattedDate = currentDate.getDate() + "/" + (currentDate.getMonth() + 1) + "/" + currentDate.getFullYear();

        // Insertar la fecha formateada en el HTML del footer
        footerDateElement.textContent = "El dia de hoy es: " + formattedDate;
    </script>
</body>
</html>