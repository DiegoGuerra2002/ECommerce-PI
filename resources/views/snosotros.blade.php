<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="./css/inicio.css" rel="stylesheet">
    <style>
        /* Estilos para el contenedor del mapa */
        #map {
            height: 400px; /* Altura del mapa */
            width: 100%; /* Ancho del mapa */
        }
    </style>
</head>
<body>
    @extends('headerGeneral')
    @section('content')
    
    <main>    
        <section class="bannerS d-flex justify-content-center align-items-center">
            <div class="card mb-3 border-0" style="max-width: 800px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <!-- Modificamos la clase 'img-fluid' para hacer la imagen completamente responsiva -->
                        <img src="/images/personalMarket.jpg" class="img-fluid rounded-start h-100" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title">Un poco sobre nuestra historia.</h2>
                            <p class="card-text">
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                
                            </p>
                            <p class="card-text"><small class="text-body-secondary">Desde 1989 bajo la cobertura de Dios</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sec2 d-flex justify-content-center align-items-center">
            <h1 class="Separadores2">¿Donde estamos ubicados?</h1>
        </section>

        <section class="txtubi d-flex justify-content-center align-items-center">
            <h5>Estamos ubicados en San Antonio Pajonal, El Salvador · Las Piletas, El Salvador <i class="bi bi-geo-fill"></i></h5>
        </section>

        <!-- Sección para el mapa -->
        <section class="ubicacion">
            <div id="map"></div>
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
                </div>
                <div class="card-footer text-body-secondary border-0" id="footer-date">
                </div>
            </div>
        </section>
    </footer>
    @endsection

    <button id="btn-back-to-top" class="btn btn-primary rounded-circle"><i class="bi bi-arrow-up"></i></button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Script para cargar el mapa -->
    <script>
        // Función para inicializar el mapa
        function initMap() {
            // Coordenadas del lugar
            var ubicacion = { lat: 14.1970875, lng: -89.5815907 }; // Coordenadas de San Antonio Pajonal, El Salvador

            // Opciones del mapa
            var mapOptions = {
                center: ubicacion, // Centrar el mapa en las coordenadas especificadas
                zoom: 15, // Nivel de zoom
            };

            // Crear un nuevo mapa en el elemento con id "map" y aplicar las opciones
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);

            // Crear un marcador en el mapa en las coordenadas especificadas
            var marker = new google.maps.Marker({
                position: ubicacion,
                map: map,
                title: 'Mini-Super Hilda\'s S.A de C.V'
            });
        }
    </script>

    <!-- Incluir la API de Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiEb0whWgVJj0skoMywuqjgIL49vYamXA&callback=initMap" async defer></script>

    <!-- Script para mostrar la fecha en el footer -->
    <script>
        // Esperar a que el DOM esté completamente cargado
        $(document).ready(function() {
            // Obtener el elemento del footer donde se mostrará la fecha
            var footerDateElement = $("#footer-date");

            // Crear un objeto de fecha para obtener la fecha actual
            var currentDate = new Date();

            // Formatear la fecha como "día/mes/año"
            var formattedDate = currentDate.getDate() + "/" + (currentDate.getMonth() + 1) + "/" + currentDate.getFullYear();

            // Insertar la fecha formateada en el HTML del footer
           

            // Insertar la fecha formateada en el HTML del footer
            footerDateElement.text("El día de hoy es: " + formattedDate);
        });
    </script>
</body>
</html>