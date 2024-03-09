<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(isset($_SESSION['name'])){
    $datos_usuario = $_SESSION['name'];
    $logout = "<li><a href='./?m=logout'>Cerrar Sesión</a></li>";
} else {
    $datos_usuario = '<a class="unirsebtn" href="./?m=login">Registrate!</a>';
    $logout = "";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GREENNET</title>
    <link rel="stylesheet" href="view/css/fonts.css">
    <link rel="stylesheet" href="view/css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="view/mg/logo_mission_vision.png">
</head>
<body>
    <header>
        <div class="logo">
            <img src="view/img/logo_mission_vision.png" alt="Logo de mi foro" class="img-logo">
            <h1 class="nombre-logo">GreenNet</h1>
        </div>
        <div class="perfil">
            <p class="nombre-perfil"><?php echo $datos_usuario ?></p>
            <img src="view/img/perfil.jpg" alt="Foto de perfil" class="img-perfil" id="perfil_Icono">
        </div>
    </header>
    <div class="app">
    <div id="detailsDiv">
        <span>GreenNet</span>
        <p class="nombre-perfil"><?php echo $datos_usuario ?></p>
        <p class="email-perfil"><?php echo $datos_usuario ?></p>
        <ul>
            <li><a href="#">Configuración</a></li>
            <li><a href="#">Cambiar de Cuenta</a></li>
            <?php echo $logout; ?>
        </ul>
    </div>
        <aside class="navegacion">
            <div class="temas">
                <h2>Temas</h2>
                <div class="temasopciones">
                <ul>
                    <li>HAMBRE CERO</li>
                    <li>VIDA MARINA</li>
                    <li>BASURA EN EL MEDIO AMBIENTE</li>
                    <li>BASURA EN EL MEDIO AMBIENTE</li>
                    <li>BASURA EN EL MEDIO AMBIENTE</li>
                </ul>
                </div>
            </div>
            <div class="busqueda">
                <h2>¿Buscas algo?</h2>
                <input type="search" class="search-bar" name="search" id="search" placeholder="Escribe aquí...">
                <div class="populares">
                <h2>Popular</h2>
                <ul>
                    <li>¿3ra guerra mundial 2024?</li>
                    <li>La destrucción de la tierra</li>
                    <li>MrBeast construye 100 pozos en África</li>
                </ul>
                </div>
            </div>
            <span class="copyright">Copyright 2024© GreenNet</span>
        </aside>
        <main class="publicaciones">
        <div class="mi-perfil">
            <div class="image-container">
                <span>Crear Post</span>
                <img src="view/img/perfil_img.jpg" alt="Imagen">
                <button>Enviar</button>
            </div>
            <div class="input-container">
                <input type="text" placeholder="Título">
                <textarea placeholder="Escribe tu ídea..."></textarea>
            </div>
        </div>
            <section class="feed">

            </section>
        </main>
        <section class="comentarios">

        </section>
        
    </div>
    <script src="view/js/fun_script.js"></script>
</body>
</html>