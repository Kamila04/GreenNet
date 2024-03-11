<?php
    function login_header(){
    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    if(isset($_SESSION['name'])){
        header("location:/");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href=<?php echo(urlsite. "/view/css/login.css");?>>
    <link rel="shortcut icon" type="image/x-icon" href=<?php echo (urlsite."/view/img/logo_mission_vision.png"); ?>>
    <title>GREENNET - Login</title>
</head>
<?php }?>