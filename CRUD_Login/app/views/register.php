<!DOCTYPE html>
<html lang="en">

<?php
include_once 'header.php'
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../../public/css/login.css">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<?php
include_once "../../app/helpers/sesion_helper.php";
?>

<body>
    <div class="container">
        <h1>Registro</h1>
        <?php flash('register'); ?>
        <form id="register-form" method="post" action="../controllers/ControllerSesion.php">
            <input type="hidden" name="type" value="register">

            <label for="correo"> Correo:</label>
            <input type="text" id="correo" name="correo" placeholder="Ingrese su correo" autocomplete="email" required>

            <label for="emailInst">Intitucion:</label>
            <select class="form-select" name="emailInst" id="emailInst" required>
                <option disabled selected value> @Selecciona tu correo institucional </option>
                <option value="@correo.unicordoba.edu.co">@correo.unicordoba.edu.co</option>
            </select><br>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" autocomplete="new-password" required>

            <label for="password">Confirmacion de contraseña:</label>
            <input type="password" id="repeatPassword" name="repeatPassword" placeholder="Ingrese su contraseña nuevamente" autocomplete="new-password" required>

            <label for="nombres">Nombres</label>
            <input type="text" id="nombres" name="nombres" placeholder="Nombres" autofocus required />

            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" autofocus required />

            <label for="facultad">Facultad</label>
            <input type="text" id="facultad" name="facultad" placeholder="Facultad" autofocus required />

            <label for="carrera">Carrera</label>
            <input type="text" id="carrera" name="carrera" placeholder="Carrera" autofocus required />

            <button type="submit">Registrarse</button>
        </form>
    </div>
    <script></script>
</body>

</html>