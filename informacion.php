<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        session_start();

        echo('Nombre de usuario: ' . $_SESSION['usuario'] . '<br>');
        echo('Email de usuario: ' . $_SESSION['email'] . '<br>');
        echo('Edad de usuario: ' . $_SESSION['edad'] . '<br>');
        echo('Pais de usuario: ' . $_SESSION['pais'] . '<br>');
    ?>
    <a href="formulario.php">Volver al formulario</a>
</body>
</html>