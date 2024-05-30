<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura - {{ $date }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="./css/inicio.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            position: relative;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table, .table th, .table td {
            border: 1px solid black;
        }
        .table th, .table td {
            padding: 8px;
            text-align: left;
        }
        .table thead {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .logo {
            position: absolute;
            top: 0;
            left: 0;
            margin: 20px;
        }
    </style>
</head>
<body>
    <section class="separadorlogo">
        <a class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" width="100" height="100">
        </a>
    </section>
    <h1 class="text-center">Tu lista de productos</h1>
    <h2 class="text-center">{{ $user->name }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carrito as $id => $producto)
                <tr>
                    <td>{{ $producto['nombre'] }}</td>
                    <td>${{ $producto['precio'] }}</td>
                    <td class="text-center">{{ $producto['quantity'] }}</td>
                    <td class="text-center">${{ $producto['precio'] * $producto['quantity'] }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-right"><strong>Precio Final</strong></td>
                <td class="text-center"><strong>${{ $total }}</strong></td>
            </tr>
        </tbody>
    </table>
    <section class="sec2 d-flex justify-content-center align-items-center">
        <h4 class="firma">Firma y sello de entregado:   _________________________.</h4>
    </section>
</body>
</html>
