<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hilda's | Compra en linea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <link href="./css/inicio.css" rel="stylesheet">
</head>
<body>
    @extends('headerGeneral')
    @section('content')
    
    <main>
    <section class="sec2 d-flex justify-content-center align-items-center">
        <h1 class="Separadores">Tu lista de productos:</h1>
    </section>
    <section class="sec2 d-flex justify-content-center align-items-center">
        <h2>{{ Auth::user()->name }}</h2>
    </section>
    <section class="sec2 d-flex justify-content-center align-items-center">
        <div style="max-width: 800px;">
            <!-- Define el ancho máximo de la tabla -->
            <table id="carrito" class="table table-bordered table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if (session('carrito'))
                        @php $total = 0; @endphp
                        @foreach (session('carrito') as $id => $producto)
                            @php $subtotal = $producto['precio'] * $producto['quantity']; @endphp
                            <tr rowId="{{ $id }}">
                                <td data-th="producto">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img src="{{ asset('images')}}/{{ $producto['imagen'] }}" class="card-img-top">
                                        </div>
                                        <div class="col-sm-10">
                                            <h4 class="mb-0">{{ $producto['nombre'] }}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="precio">${{ $producto['precio'] }}</td>
                                <td data-th="quantity" class="text-center">{{ $producto['quantity'] }}</td>
                                <td data-th="Subtotal" class="text-center">${{ $subtotal }}</td>
                                <td class="actions text-center">
                                    <a href="{{ URL::to('deleteCartItem/'.$id) }}" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </td>
                            </tr>
                            @php $total += $subtotal; @endphp
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-right"><strong>Precio Final</strong></td>
                            <td class="text-center"><strong>${{ $total }}</strong></td>
                            <td></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>

    <section class="sec2 d-flex justify-content-center align-items-center">
        <a href="{{ URL::to('emptyCart') }}" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres vaciar el carrito?')">
            <i class="bi bi-trash-fill"></i> Limpiar carrito
        </a>
        <a href="{{ route('generatePDF') }}" class="btn btn-success">
            Generar Factura
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
    @endsection

    <button id="btn-back-to-top" class="btn btn-primary rounded-circle"><i class="bi bi-arrow-up"></i></button>
    <script>
        function agregarProducto(id, nombre, descripcion, precio) {
            // Obtener la tabla donde se mostrarán los productos seleccionados
            var tablaProductos = document.getElementById("productos-seleccionados");

            // Crear una nueva fila para el producto seleccionado
            var fila = tablaProductos.insertRow();

            // Insertar celdas en la fila para nombre, descripción y precio
            var celdaNombre = fila.insertCell(0);
            var celdaDescripcion = fila.insertCell(1);
            var celdaPrecio = fila.insertCell(2);

            // Agregar el nombre, descripción y precio del producto a las celdas
            celdaNombre.innerHTML = nombre;
            celdaDescripcion.innerHTML = descripcion;
            celdaPrecio.innerHTML = "$" + precio;

            // Opcionalmente, puedes agregar un botón para eliminar el producto de la tabla si lo deseas
            var celdaEliminar = fila.insertCell(3);
            celdaEliminar.innerHTML = '<button class="btn btn-danger btn-sm" onclick="eliminarProducto(this)">Eliminar</button>';
        }

        function eliminarProducto(botonEliminar) {
            // Obtener la fila a la que pertenece el botón de eliminar
            var fila = botonEliminar.parentNode.parentNode;

            // Eliminar la fila de la tabla
            fila.remove();
        }
    </script>
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

</body>
</html>
