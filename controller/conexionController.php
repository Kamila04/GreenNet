<?php
use model\conexion;
class conexionController{
    private $conexion;
    public function __construct()
    {
        $this->conexion = new conexion();
    }

    static function index() {
        // Obtener las publicaciones
        $conn = new conexion();
        $publicaciones = $conn->select("publication");
    
        // Cargar la vista con las publicaciones
        require_once("view/index.php");
    }

    static function login() {
        $url = $_SERVER['REQUEST_URI'];
        $partes = explode('?', $url);
        if(count($partes) > 1){
            if($_GET['m'] !== "login")
                header("Location: ./login");
        }
        require_once("view/login.php");
    }

    static function createAccount() {
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass'])){
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
                header("Location: ./login");
            }
        } else {
            header("Location: ./login");
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
        header("Location: ./login");
    }

    static function logout() {
        session_start();
        if(!empty($_SESSION)){
            session_unset();
            session_destroy();
            header("Location: /");
        }    
        else{
            header("Location: ./error404");
        }        
    }

    static function error404(){
        require_once("view/error404.php");
    }

    static function enviarPublicacion() {
        if(isset($_POST['titulo']) && isset($_POST['contenido'])){
            $titulo = $_POST['titulo'];
            $contenido = $_POST['contenido'];
            $fecha = date("Y-m-d");
            $conn = new conexion();
            $inserted = $conn->insert("publication", ["Title"=>$titulo, "Content"=>$contenido, "Date"=>$fecha]);
            if($inserted) {
                header("Location: /");
                return;
            } else {
                // Manejar el error de inserción según sea necesario
                header("Location: ./error404");
                return;
            }
        } else {
            header("Location: /");
            return;
        }
    }
}
?>
