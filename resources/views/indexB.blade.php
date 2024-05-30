<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos ADMINISTRADOR</title>
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
                            <a class="nav-link active" aria-current="page" href="{{route('productos')}}">Productos Frescos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('pcoductos')}}">Productos Congelados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('ppoductos')}}">Cuidado Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('phoductos')}}">Cuidado Hogar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('pmoductos')}}">Mascotas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('pbebidas')}}">Bebidas</a>
                        </li>
                    </ul>
                </div>
                <!-- Nuevo div para el carrito -->
                
            </div>
        </nav>
    </header>
    


    <main>
        
        <section class= "sec2 d-flex justify-content-center align-items-center">
            <h1 class= "Separadores"> Menu Administrador</h1>
        </section>

        <section class="sec2 d-flex justify-content-center align-items-center">
            <a href="{{route('pbebidas.create')}}" class="btn btn-primary">Añadir Bebidas</a>
        </section>

        <section class="sec2 d-flex justify-content-center align-items-center">
        <div class="container mt-4">
            <div class="table-responsive">
                <table class="table caption-top">
                    <caption>Lista de Productos</caption>
                    <thead>
                        <tr>
                        <th scope="col" style="display: none;">ID</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pbebidas as $pbebida)
                        <tr>
                        <th scope="row" style="display: none;">{{$pbebida->id}}</th>
                        <td>{{$pbebida->nombre}}</td>
                        <td>{{$pbebida->descripcion}}</td>
                        <td>
                            <img src="/images/{{$pbebida->imagen}}" style="max-width: 150px; height: auto;" alt="Imagen del producto">
                        </td>
                        <td>{{$pbebida->precio}}</td>
                        <td>
                            <div class="btn-group">
                            <a href="{{route('pbebidas.edit', $pbebida->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{route('pbebidas.destroy', $pbebida->id) }}" method="POST" class="formEliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="margin-left: 5px;">Borrar</button>
                            </form>
                            </div>
                        </td>
                        </tr>
                        @endforeach    
                    </tbody>
                </table>
            </div>
            <div>
                {!! $pbebidas->links() !!}
            </div>
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
                </div>
                <div class="card-footer text-body-secondary border-0" id="footer-date">
                </div>
            </div>
        </section>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.formEliminar')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault()
                event.stopPropagation()
                Swal.fire({
                            title: "Confirma la eliminacion del registro?",
                            icon: "info",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Confirmar"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                this.submit();
                                Swal.fire('Eliminado','Se elimino con exito', ' Exito');
                            }
                        });
            }, false)
            })
        })()
    </script>
</body>
</html>
