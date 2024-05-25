<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hilda's | Compra en linea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="./css/inicio.css" rel="stylesheet">
</head>
<body>
<header style="text-shadow: 2px 2px 4px black;">
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
                        <a class="nav-link" href="{{ route('snosotros') }}">Sobre nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#abajo">Contactenos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('pFrescos') }}">Productos Frescos</a></li>
                            <li><a class="dropdown-item" href="{{ route('pConge') }}">Productos Congelados</a></li>
                            <li><a class="dropdown-item" href="{{ route('pCuida') }}">Cuidado Personal</a></li>
                            <li><a class="dropdown-item" href="{{ route('pHogar') }}">Cuidado del Hogar</a></li>
                            <li><a class="dropdown-item" href="{{ route('pMascotas') }}">Cuidado de Mascotas</a></li>
                            <li><a class="dropdown-item" href="{{ route('pBebidas') }}">Bebidas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Nuevo div para el carrito -->
            <div class="ms-auto">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('carrito')}}">
                            <i class="bi bi-cart bi-lg"></i> <span class="badge bg-danger">{{ count((array) session('carrito')) }} </span>
                        </a>
                    </li>
                    @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-person" ></i></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
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
                <a class="dropdown-item" href="{{ route('pCuida') }}">
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

    <section class="bannerinicio d-flex justify-content-center align-items-center">
        <a href="{{route('pHogar')}}">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="./images/bannerHogar1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="./images/bannerHogar2.png" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </a>
    </section>

</main>

<footer id="abajo">

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
                <p class="card-text">
                    2441-5704
                    <br>
                    variedadeshildas@gmail.com
                    <br>
                    <a href="https://www.instagram.com/variedadeshildas?igsh=MXBsdGVscW1qcmdyeg=="><i class="bi bi-instagram"></i></a>
                    <a href="https://www.facebook.com/variedades.hildas?mibextid=kFxxJD"><i class="bi bi-facebook"></i></a> 
                </p>
                <h5>
                    Nuestros Horarios
                </h5>
                <p>
                    Lunes a Viernes 8:00AM a las 6:00PM
                    <br>
                    Sabados y Domingos 8:00AM hasta las 2:00PM
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