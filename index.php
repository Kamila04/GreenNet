<?php
require_once("autoload.php");
require_once("config.php");
require_once("controller/conexionController.php");

if (isset($_REQUEST['m'])) {
    if(method_exists("conexionController", $_REQUEST['m']))
        conexionController::{$_REQUEST['m']}();
    else
        conexionController::index();
} else
    conexionController::index();
?>