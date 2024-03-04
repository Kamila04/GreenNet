<?php
use model\conexion;
class conexionController{
    private $conexion;
    public function __construct()
    {
        $this->conexion = new conexion();
    }

    static function index() {
        require_once("view/index.php");
    }

    static function login() {
        require_once("view/login.php");
    }
}
?>