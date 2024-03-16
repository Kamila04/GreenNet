<?php 
    include_once("./view/layout/login_header.php");
    include_once("./view/layout/login_footer.php");
    login_header();
?>
<body>
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
                <h2><b>GreenNet</b></h2>
                <br><b><i>Voces silenciosas que gritan alto</i></b><br>
                <h1>Crear una cuenta</h1>
                <input type="text" placeholder="Nombre" name="name" required>
                <input type="email" placeholder="Correo" name="email" required>
                <input type="password" placeholder="Contraseña" name="pass" required minlength="6">
                <input type="hidden" name="m" value="createAccount">
                <button type="submit">Registrarse</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="index.php" method="post">
                <h2><b>GreenNet</b></h2>
                <br><b><i>Voces silenciosas que gritan alto</i></b><br>
                <h1>Iniciar sesión</h1>
                <input type="email" placeholder="Correo" name="email" required>
                <input type="password" placeholder="Contraseña" name="pass" required minlength="6">
                <input type="hidden" name="m" value="initAccount">
                <button type="submit">Iniciar sesión</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <img width="40%" src= <?php echo( urlsite ."/view/img/logo_ODS.png"); ?> title="RedNet" alt="logo de RedNet">
                    <h1>¡Bienvenido de nuevo!</h1>
                    <p>Inicia sesión para utilizar todas las funciones del sitio</p>
                    <button class="hidden" id="login">Iniciar sesión</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <img width="40%" src=<?php echo(urlsite. "/view/img/logo_ODS.png") ?> title="RedNet" alt="logo de RedNet">
                    <h1>¡Hola, amigo!</h1>
                    <p>Regístrate con tus datos personales para utilizar todas las funciones del sitio</p>
                    <button class="hidden" id="register">Registrarse</button>
                </div>
            </div>
        </div>
    </div>
</body>
<?php 
    login_footer();
?>
</html>