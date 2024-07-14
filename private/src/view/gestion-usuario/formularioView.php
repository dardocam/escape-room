<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once(dirname(__FILE__, 5) . '/private/config/config.php') ?>
</head>

<body>
    <form action="<?= APP_ROOT . 'index.php?controller=formulario&activity=gestion' ?>" method="post">
        <input type="text" name="nombre" id="">
        <input type="date" name="fecha_nacimiento" id="">

        <input type="submit" value="Enviar">
    </form>
</body>

</html>