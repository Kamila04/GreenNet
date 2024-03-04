<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/view/css/login.css">
    <link rel="shortcut icon" type="image/x-icon" href="/view/img/logo_mission_vision.png">
    <title>GREENNET - Login</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h2><b>GreenNet</b></h2>
                <br><b><i>Voces silenciosas que gritan alto</i></b><br>
                <h1>Crear una cuenta</h1>
                <input type="text" placeholder="Nombre">
                <input type="email" placeholder="Correo">
                <input type="password" placeholder="Contraseña">
                <button>Registrarse</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h2><b>GreenNet</b></h2>
                <br><b><i>Voces silenciosas que gritan alto</i></b><br>
                <h1>Iniciar sesión</h1>
                <input type="email" placeholder="Correo">
                <input type="password" placeholder="Contraseña">
                <button><a href="/view/">Iniciar sesión</a></button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <img width="40%" src="/view/img/logo_ODS.png" title="RedNet" alt="logo de RedNet">
                    <h1>¡Bienvenido de nuevo!</h1>
                    <p>Inicia sesión para utilizar todas las funciones del sitio</p>
                    <button class="hidden" id="login">Iniciar sesión</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <img width="40%" src="/view/img/logo_ODS.png" title="RedNet" alt="logo de RedNet">
                    <h1>¡Hola, amigo!</h1>
                    <p>Regístrate con tus datos personales para utilizar todas las funciones del sitio</p>
                    <button class="hidden" id="register">Registrarse</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/view/js/login_script.js"></script>
</body>
</html>