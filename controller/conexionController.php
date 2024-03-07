<?php
use model\conexion;
class conexionController{
    private $conexion;
    public function __construct()
    {
        $this->conexion = new conexion();
    }

    static function index() {
        // Obtener la URL actual
        $url = $_SERVER['REQUEST_URI'];
        // Separar la parte antes y después del signo ?
        $partes = explode('?', $url);
        if(count($partes) > 1){
            // Redirigir al usuario a la misma página sin los parámetros
            header("Location: /");
        }
        require_once("view/index.php");
    }

    static function login() {
        $url = $_SERVER['REQUEST_URI'];
        $partes = explode('?', $url);
        if(count($partes) > 1){
            if($_GET['m'] !== "login")
                header("Location: /?m=login");
        }
        require_once("view/login.php");
    }

    static function createAccount() {
        if(isset($_GET['name']) && isset($_POST['email']) && isset($_POST['pass'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $conn = new conexion();
            $verificar_email = $conn->select("user", condiciones: ["Email"=>$email]);
            if(!(count($verificar_email) > 0)){
                $hashed_password = password_hash($pass, PASSWORD_BCRYPT);
                $conn->insert("user", ["Username"=>$name, "Email"=>$email, "Password"=>$hashed_password, "ID_Role"=>2]);
                conexionController::initAccount();
            } else {
                header("Location: /?m=login");
            }
        } else {
            header("Location: /?m=login");
        }
    }

    static function initAccount() {
        if(isset($_POST['email']) && isset($_POST['pass'])){
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $conn = new conexion();
            $verificar = $conn->select("user", condiciones: ["Email"=>$email]);
            if((count($verificar) == 1)){
                if(password_verify($pass, $verificar[0]['Password'])){
                    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
                    $_SESSION["name"] = $verificar[0]['Username'];
                    header("Location: /");
                    return;
                }
            }
        }
        header("Location: /?m=login");
    }

    static function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: /");
    }
}
?>