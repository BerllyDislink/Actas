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
        <form method="post" action="../controllers/controllerSesion.php">
            <?php flash('login');
            ?>
            <input type="hidden" name="type" value="login">

            <label for="correo">Correo:</label>
            <input type="text" id="correo" name="correo" placeholder="Ingrese su correo" autocomplete="email" required>

            <label for="emailInst">Institucion:</label>
            <select class="form-select" name="emailInst" id="emailInst" required>
                <option disabled selected value> @Selecciona tu correo institucional </option>
                <option value="@correo.unicordoba.edu.co">@correo.unicordoba.edu.co</option>
            </select><br>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Ingrese su contraseña"
                autocomplete="current-password" required>
            <button type="submit">Ingresar</button>
            <a href="./register.php"><button type="button">Registrarse</button></a>
            <a href="./token.php"><button type="button">Token</button></a>
        </form>
    </div>
    <script></script>
</body>

</html>