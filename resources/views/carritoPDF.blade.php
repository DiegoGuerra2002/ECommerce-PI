<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura - {{ $date }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
    </style>
</head>
<body>
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
</body>
</html>
