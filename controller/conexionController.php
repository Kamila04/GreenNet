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
        // Obtener las publicaciones
        $conn = new conexion();
        $publicaciones = $conn->select("publication");
    
        // Cargar la vista con las publicaciones
        require_once("view/index.php");
    }

    static function login($error = null) {
        $url = $_SERVER['REQUEST_URI'];
        $partes = explode('?', $url);
        if((count($partes) > 1 || $_GET['m'] !== "login") && !isset($_GET['error'])){
            header("Location: ./login?error=$error");
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
                conexionController::login("Error: Este Email ya ha sido usado");
            }
        } else {
            conexionController::login("Error: No se pudo crear la cuenta");
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
                    $_SESSION["key"] = $verificar[0]["ID_user"];
                    $_SESSION["email"] = $verificar[0]['Email'];
                    $_SESSION["pass"] = $verificar[0]['Password'];
                    $_SESSION["role"] = $verificar[0]['ID_Role'];
                    header("Location: /");
                    return;
                } else {
                    conexionController::login("No se pudo iniciar sesión, intente de nuevo");
                    return;
                }
            } else {
                conexionController::login("No se pudo iniciar sesión");
                return;
            }
        } else {
            conexionController::login("Sin datos de sesion");
            return;
        }
        conexionController::login("Error");
        return;
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
            if(session_status() != PHP_SESSION_ACTIVE) session_start();
            $titulo = $_POST['titulo'];
            $contenido = $_POST['contenido'];
            $fecha = date("Y-m-d");
            $key = $_SESSION["key"];
            $conn = new conexion();
            $inserted = $conn->insert("publication", ["Title"=>$titulo, "Content"=>$contenido, "Date"=>$fecha, "ID_user"=>$key]);
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

    static function Myaccount(){
        if(session_status() !== PHP_SESSION_ACTIVE) session_start();
        if(!empty($_SESSION)){
            $url = $_SERVER['REQUEST_URI'];
            // Separar la parte antes y después del signo ?
            $partes = explode('?', $url);
            if(count($partes) > 1){
                // Redirigir al usuario a la misma página sin los parámetros
                header("Location: ./Myaccount");
            }
            $ID_user = $_SESSION["key"];
            $conn = new conexion();
            $publis = $conn->select("publication", condiciones: ["ID_user" => $ID_user]);
            require_once("view/perfil.php");
        }else{
            header("Location: ./error404");
        }
    }

    static function deletePubli(){
        if(isset($_POST["deleB"])){
            $publi = $_POST["deleB"];
            $conn = new conexion;
            $delete = $conn->delete("publication", condiciones:["ID_publication" => $publi]);
            if($delete){
                header("Location: ./Myaccount");
            } 
        }
    }
}
?>
