<?php
require_once("autoload.php");
require_once("config.php");
require_once("controller/conexionController.php");

if (isset($_GET['m'])) {
    if(method_exists("conexionController", $_GET['m']))
        conexionController::{$_GET['m']}();
    else
        conexionController::index();
} else
    conexionController::index();
?>