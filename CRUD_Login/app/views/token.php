<!DOCTYPE html>
<html lang="es">

<?php
include_once 'header.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obtener Token</title>
    <link rel="stylesheet" href="../../public/css/login.css">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #tokenInput {
            width: 100%;
            overflow-x: auto;
        }
    </style>
</head>

<?php
include_once "../../app/helpers/sesion_helper.php";
?>

<body class="log">
    <div class="container">
        <h1>Obtener Token</h1>
        <form id="tokenForm">
            <?php flash('token'); ?>
            <input type="hidden" name="type" value="logintoken">

            <label for="correo">Correo:</label>
            <input type="text" id="correo" name="correo" placeholder="Ingrese su correo" autocomplete="email" required>

            <label for="emailInst">Institucion:</label>
            <select class="form-select" name="emailInst" id="emailInst" required>
                <option disabled selected value> @Selecciona tu correo institucional </option>
                <option value="@correo.unicordoba.edu.co">@correo.unicordoba.edu.co</option>
            </select><br>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" autocomplete="current-password" required>

            <button type="submit">Obtener Token</button>
            <a href="./verify_token.php"><button type="button">Ingresar por token</button></a>
        </form>

        <div id="tokenResult" style="margin-top:20px; text-align: left;">
            <input type="text" id="tokenInput" readonly>
            <button id="copyButton" class="btn btn-primary" style="display: none;">Copiar Token</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#tokenForm').on('submit', function(e) {
                e.preventDefault();

                var formData = {
                    correo: $('#correo').val(),
                    emailInst: $('#emailInst').val(),
                    password: $('#password').val(),
                    type: 'logintoken'
                };

                $.ajax({
                    url: '../controllers/controllerSesion.php',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.token) {
                            $('#tokenInput').val(result.token + ' '); // Mostrar el token en el input con espacio adicional
                            $('#copyButton').show(); // Mostrar el botón "Copiar Token"
                        } else {
                            $('#tokenInput').val('Error: ' + result.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#tokenInput').val('Ocurrió un error: ' + error);
                    }
                });
            });

            // Obtener el botón y el texto del token
            var copyButton = document.getElementById('copyButton');
            var tokenInput = document.getElementById('tokenInput');

            // Agregar un manejador de eventos al botón
            copyButton.addEventListener('click', function() {
                // Seleccionar el contenido del texto del token
                tokenInput.select();

                // Copiar el texto seleccionado al portapapeles
                document.execCommand('copy');

                // Mostrar un mensaje de éxito
                alert('El token se ha copiado al portapapeles.');
            });
        });
    </script>
</body>

</html>
