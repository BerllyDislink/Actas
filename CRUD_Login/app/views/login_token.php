<!DOCTYPE html>
<html lang="en">

<?php
include_once 'header.php'
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../public/css/login.css">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<?php
include_once "../../app/helpers/sesion_helper.php";
?>

<body class="log">
<div class="container">
        <h1>Login</h1>
        <form id="loginForm" method="post" action="../controllers/controllerSesion.php">
            <?php flash('login'); ?>
            <input type="hidden" name="type" value="token">
            <label for="token">Token:</label>
            <input type="text" id="token" name="token" placeholder="Ingrese su token" required>
            <button type="submit">Ingresar con Token</button>
            <a href="./register.php"><button type="button">Registrar</button></a>
            <a href="./token.php"><button type="button">Obtener Token</button></a>
        </form>
    </div>
    <script>
    $(document).ready(function () {
        $('#loginForm').on('submit', function (e) {
            e.preventDefault();
            var formData = {
                token: $('#token').val(),
                type: 'token'
            };
            $.ajax({
                url: '../controllers/controllerSesion.php',
                type: 'POST',
                data: formData,
                success: function (response) {
                    try {
                        var result = JSON.parse(response);
                        if (result.valid) {
                            // Redirigir al usuario a la página de inicio si el token es válido
                            window.location.href = 'index.php';
                        } else {
                            // Mostrar mensaje de error si el token es inválido
                            alert(result.error);
                        }
                    } catch (e) {
                        console.error('Error al procesar la respuesta JSON:', e);
                        console.log('Respuesta del servidor:', response);
                        // Mostrar mensaje de error si hay un error al procesar la respuesta del servidor
                        alert('Error al procesar la respuesta del servidor');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                    console.log('Respuesta del servidor:', xhr.responseText);
                    // Mostrar mensaje de error si hay un error en la solicitud AJAX
                    alert('Error al realizar la solicitud');
                }
            });
        });
    });
</script>

</body>

</html>
