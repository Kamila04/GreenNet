<?php
function perfil_header($datos_usuario = null){

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GREENNET</title>
    <link rel="stylesheet" href=<?php echo urlsite ."/view/css/fonts.css"; ?>>
    <link rel="stylesheet" href= <?php echo urlsite ."/view/css/perfil.css"; ?>>
    <link rel="shortcut icon" type="image/x-icon" href= <?php echo urlsite ."/view/img/logo_mission_vision.png"; ?> >
</head>
<body>
    <header>
        <div class="logo">
            <img src= <?php echo urlsite ."/view/img/logo_mission_vision.png"; ?> alt="Logo de mi foro" class="img-logo">
            <h1 class="nombre-logo">GreenNet</h1>
        </div>
        <div class="perfil">
            <p class="nombre-perfil"><?php echo $datos_usuario ?></p>
            <img src= <?php echo urlsite ."/view/img/perfil.jpg"; ?> alt="Foto de perfil" class="img-perfil" id="perfil_Icono">
        </div>
    </header>
<?php }?>