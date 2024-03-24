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