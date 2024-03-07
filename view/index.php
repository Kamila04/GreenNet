<?php
session_start();
if(isset($_SESSION['name'])){
    $datos_usuario = $_SESSION['name'];
} else {
    $datos_usuario = '<a href="./index.php?m=login">Login/Sing up</a>';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GREENNET</title>
    <link rel="stylesheet" href="/view/css/fonts.css">
    <link rel="stylesheet" href="/view/css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="/view/img/logo_mission_vision.png">
</head>
<body>
    <header>
        <div class="logo">
            <img src="/view/img/logo_mission_vision.png" alt="Logo de mi foro" class="img-logo">
            <h1 class="nombre-logo">GreenNet</h1>
        </div>
        <div class="perfil">
            <p class="nombre-perfil"><?php echo $datos_usuario ?></p>
            <img src="/view/img/perfil.jpg" alt="Foto de perfil" class="img-perfil">
        </div>
    </header>
    <div class="app">
        <aside class="navegacion">
            <div class="temas">
                <h2>Temas</h2>
                <ul>
                    <li>HAMBRE CERO</li>
                    <li>VIDA MARINA</li>
                </ul>
            </div>
            <div class="busqueda">
                <h2>¿Buscas algo?</h2>
                <input type="search" class="search-bar" name="search" id="search" placeholder="Escribe aquí...">
                <h2>Lo mas popular</h2>
                <ul>
                    <li>¿3ra guerra mundial 2024?</li>
                    <li>hackers furry</li>
                    <li>MrBeast construye 100 pozos en África</li>
                </ul>
            </div>
            <footer><p>Copyright 2024© GreenNet</p></footer>
        </aside>
        <main class="publicaciones">
            <section class="mi-perfil">
                <img src="/view/img/perfil_img.jpg" alt="Mi imagen">
                <div>
                    <h3>MiPerfil</h3>
                    <p>Crear Publicación</p>
                </div>
            </section>
            <section class="feed">

            </section>
        </main>
        <section class="comentarios">

        </section>
        
    </div>
</body>
</html>