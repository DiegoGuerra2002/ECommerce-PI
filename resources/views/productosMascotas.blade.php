<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuidado de Mascotas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="./css/inicio.css" rel="stylesheet">
</head>
<body>
    @extends('headerGeneral')
    @section('content')
    
    <main>
        
        <section class= "sec2 d-flex justify-content-center align-items-center">
            <h1 class= "Separadores">  Mascotas </h1>
        </section>

        <section class="sec2 d-flex justify-content-center align-items-center">
            @foreach ($pmoductos as $pmoducto)
            <div class="card justify-content-between mt-3 text-dark bg-fe9b32" style="width: 15rem;">
                <div class="card-body">
                    <img src="{{ asset('images/' . $pmoducto->imagen) }}" class="card-img-top" alt="{{ $pmoducto->nombre }}">
                    <h6 class="card-text d-flex justify-content-center align-items-center">{{ $pmoducto->nombre }}</h6>
                    <p class="d-flex justify-content-center align-items-center">{{ $pmoducto->descripcion }}</p>
                    <p class="d-flex justify-content-center align-items-center">${{ $pmoducto->precio }}</p>
                    <!-- Input para la cantidad -->
                    <!--<div class="input-container justify-content-center">
                        <button class="decrement-button">-</button>
                        <input type="number" class="number-input" id="number{{ $pmoducto->id }}" value="0">
                        <button class="increment-button">+</button>
                    </div> -->
                    <!-- Botón "Añadir" -->
                    <!--<div class="d-flex justify-content-center mt-3">
                        <button type="button" class="btn btn-danger btn-lg" onclick="agregarProducto('{{ $pmoducto->id }}', '{{ $pmoducto->nombre }}', '{{ $pmoducto->precio }}')">Añadir</button>
                    </div> -->
                </div>
            </div>
            @endforeach
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
