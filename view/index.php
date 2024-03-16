<?php
    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    if(isset($_SESSION['name'])){
        $account = "<li><a href=". urlsite."/Myaccount". ">Mi cuenta</a></li>";
        $datos_usuario = $_SESSION['name'];
        $logout = "<li><a href='". urlsite. "/logout'>Cerrar Sesión</a></li>";
    } else {
        $datos_usuario = '<a class="unirsebtn" href="' .urlsite . '/login">Registrate!</a>';
        $logout = "";
        $account = "";
    }     
    include("./view/layout/main_header.php");
    include("./view/layout/main_footer.php");
    main_header($datos_usuario);
?>
    <div class="app">
    <div id="detailsDiv">
        <span>GreenNet</span>
        <p class="nombre-perfil"><?php echo $datos_usuario ?></p>
        <p class="email-perfil"><?php echo $datos_usuario ?></p>
        <ul>
            <?php echo $account;?>
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
            <div class="publicacion-crear">
        <form action="index.php?m=enviarPublicacion" method="post">
            <div class="mi-perfil">
                <div class="image-container">
                    <span>Crear Post</span>
                    <img src="<?php echo urlsite; ?>./view/img/perfil_img.jpg" alt="Imagen">
                    <button type="submit">Enviar</button> 
                </div>
                <div class="input-container">
                    <input type="text" name="titulo" placeholder="Título"> 
                    <textarea name="contenido" placeholder="Escribe tu idea..."></textarea> 
                </div>
            </div>
        </form>
        <section class="feed">
        <?php for ($i = count($publicaciones) - 1; $i >= 0; $i--): ?>
            <?php $publicacion = $publicaciones[$i]; ?>
            <div class="publicacion">
                <h2><?php echo $publicacion['Title']; ?></h2>
                <h><?php echo $publicacion['Date']; ?></h>
                <p><?php echo $publicacion['Content']; ?></p>
            </div>
            <br>
        <?php endfor; ?>
    </section>
</main>
        <section class="comentarios">

        </section>
        
    </div>
</body>
<?php main_footer();?>
</html>
<?php 
?>