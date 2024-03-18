<?php 
    include_once("./view/layout/login_header.php");
    include_once("./view/layout/login_footer.php");
    login_header();
?>
<body>
    <img class="fondo-login" src="view/img/fondo2.avif">
    <div class="flecha">
        <a href="./index.php"><img src="view/img/flecha.png" title="Regresar" width="130px" height=""><a>    
    </div>
    <?php 
    if(isset($_GET['error'])) {
    ?>
    <div class="error-panel inactive">
        <h2 class="message-error">
            <?php echo $_GET['error'] ?>
        </h2>
    </div>
    <?php } ?>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="index.php" method="post">
                <h1><b>GreenNet</b></h1>
                <br><b><h3><i>Gritos silenciosos</i></h3></b><br>
                <h1>Crear una cuenta</h1>
                <input type="text" placeholder="Nombre" name="name" required>
                <input type="email" placeholder="Correo" name="email" required>
                <input type="password" placeholder="Contraseña" name="pass" required minlength="6">
                <input type="hidden" name="m" value="createAccount">
                <button type="submit" title="Registrarse">Registrarse</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="index.php" method="post">
                <h1><b>GreenNet</b></h1>
                <br><b><h3><i>Gritos silenciosos</i></h3></b><br>
                <h1>Iniciar sesión</h1>
                <input type="email" placeholder="Correo" name="email" required>
                <input type="password" placeholder="Contraseña" name="pass" required minlength="6">
                <input type="hidden" name="m" value="initAccount">
                <button type="submit" title="Entrar">Iniciar sesión</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <img width="40%" src= <?php echo( urlsite ."/view/img/logo_ODS.png"); ?> title="RedNet" alt="logo de RedNet">
                    <h1>¡Bienvenido de nuevo!</h1>
                    <p>Inicia sesión para utilizar todas las funciones del sitio</p>
                    <button class="hidden" id="login" title="Entrar">Iniciar sesión</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <img width="40%" src=<?php echo(urlsite. "/view/img/logo_ODS.png") ?> title="RedNet" alt="logo de RedNet">
                    <h1>¡Hola amigo!</h1>
                    <p>Regístrate con tu correo para utilizar todas las funciones del sitio</p>
                    <button class="hidden" id="register" title="Registrarse">Registrarse</button>
                </div>
            </div>
        </div>
    </div>
</body>
<?php 
    login_footer();
?>
</html>