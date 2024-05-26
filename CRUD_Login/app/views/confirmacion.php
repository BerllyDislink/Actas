<!DOCTYPE html>
<html lang="en">

<?php
include_once 'header.php'
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar correo</title>
    <link rel="stylesheet" href="../../public/css/login.css">
</head>

<?php
include_once "../../app/helpers/sesion_helper.php";
?>

<body class="inicio">
    <div class="container">
        <label for="Codigo">Ingrese el codigo de verificación que fue enviado a su correo</label>
        <form method="post" action="../controllers/ControllerSesion.php">
            <?php flash('confirmar'); ?>
            <input type="hidden" name="type" value="confirmar">
            <input type="text" class="form-control form-input" id="codigo" name="codigo" placeholder="Ingresar codigo de verificación">
            <button type="submit">Ingresar</buform>
        </form>
    </div>
    <script></script>
</body>

</html>