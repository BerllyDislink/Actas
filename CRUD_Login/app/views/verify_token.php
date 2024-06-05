<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Token</title>
    <link rel="stylesheet" href="../../public/css/verify_token.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="log">
    <div class="container">
        <div class="content_area">
        <h1>Verificar Token</h1>
        <form id="verifyTokenForm" method="post">
            
            <input type="text" id="token" name="token" placeholder="Ingrese su token" required>
            <button type="submit" class="verify-button">Verificar Token</button>
        </form>
        <div id="verificationResult" style="margin-top: 20px;"></div>
        <!-- Agregar un botón para redireccionar a una nueva página -->
        <a href="./login_token.php"><button id="redirectButton" class="redi-button" style="display: none; margin-top: 10px;">Redireccionar</button></a>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#verifyTokenForm').on('submit', function (e) {
                e.preventDefault();
                var formData = {
                    token: $('#token').val(),
                    type: 'verifytoken'
                };
                $.ajax({
                    url: '../controllers/controllerSesion.php',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        try {
                            var result = JSON.parse(response);
                            if (result.valid) {
                                $('#verificationResult').html('<p>Token válido</p>');
                                // Mostrar el botón de redireccionamiento
                                $('#redirectButton').show();
                            } else {
                                $('#verificationResult').html('<p>' + result.error + '</p>');
                                // Ocultar el botón de redireccionamiento si el token es inválido
                                $('#redirectButton').hide();
                            }
                        } catch (e) {
                            console.error('Error al procesar la respuesta JSON:', e);
                            console.log('Respuesta del servidor:', response);
                            $('#verificationResult').html('<p>Token Invalido</p>');
                            // Ocultar el botón de redireccionamiento si hay un error
                            $('#redirectButton').hide();
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                        console.log('Respuesta del servidor:', xhr.responseText);
                        $('#verificationResult').html('<p>Error al realizar la solicitud</p>');
                        // Ocultar el botón de redireccionamiento si hay un error
                        $('#redirectButton').hide();
                    }
                });
            });

            // Manejar el clic en el botón de redireccionamiento
            $('#redirectButton').on('click', function () {
                // Redirigir a la nueva página
                window.location.href = 'login_token.php';
            });
        });
    </script>
</body>
</html>
