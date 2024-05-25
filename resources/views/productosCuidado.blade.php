<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuidado Personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="./css/inicio.css" rel="stylesheet">
</head>
<body>
    @extends('headerGeneral')
    @section('content')
    
    <main>
        <section class= "sec2 d-flex">
            <div class="container mt-4">
               
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                    
                @endif
                @yield('content')
            </div>
            @yield('scripts')
        </section>
        <section class="sec2 d-flex justify-content-center align-items-center">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">


                        <!-- CAMBIAR POR OTRO BANNER POR FAVOR-->



                    <img src="./images/bannerCuida2.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="./images/bannerCuida2.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>    


        <section class= "sec2 d-flex justify-content-center align-items-center">
            <h1 class= "Separadores"> Cuidado Personal </h1>
        </section>

        <section class="sec2 d-flex justify-content-center align-items-center">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 justify-content-center">
                @foreach ($ppoductos as $ppoducto)
                <div class="col mb-4">
                    <div class="card text-white bg-fe9b32">
                        <img src="{{ asset('images/' . $ppoducto->imagen) }}" class="card-img-top" alt="{{ $ppoducto->nombre }}">
                        <div class="card-body">
                        <h5 class="card-title" style="text-shadow: 2px 2px 4px black;">{{ $ppoducto->nombre }}</h5> <!-- Agregar estilo para text-shadow -->
                        <p class="card-text" style="text-shadow: 2px 2px 4px black;">{{ $ppoducto->descripcion }}</p> <!-- Agregar estilo para text-shadow -->
                        <p class="card-text" style="text-shadow: 2px 2px 4px black;">${{ $ppoducto->precio }}</p> <!-- Agregar estilo para text-shadow -->
                            <!-- Input para la cantidad -->
                            <!--<div class="input-container justify-content-center">
                                <button class="decrement-button">-</button>
                                <input type="number" class="number-input" id="number{{ $ppoducto->id }}" value="0">
                                <button class="increment-button">+</button>
                            </div> -->
                            <!-- Botón "Añadir" -->
                            <div class="d-flex justify-content-center mt-3">
                                <a href="{{ route('agregaralcarritoCuidado', $ppoducto->id)}}" class="btn btn-outline-danger">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
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
    @endsection

    <button id="btn-back-to-top" class="btn btn-primary rounded-circle"><i class="bi bi-arrow-up"></i></button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z8vwu/LOiQE8hXjBfNfGapnB+X8gakI5lZ2tUX" crossorigin="anonymous"></script>

</body>
</html>
