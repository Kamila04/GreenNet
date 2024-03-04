<?php
namespace model;
use PDO, PDOException;
class conexion extends PDO{ 
    private $servername= "localhost";
    private $username= "root";
    private $password= "";
    private $dbname= "prueba";

    public function __construct()
    {
        try{
            parent::__construct("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function select($table, $campos = ['*'], $condiciones=[]) {
        $campos = implode(', ' , $campos);
        $sql = "SELECT $campos FROM $table";
        if($condiciones)
            $sql .= " WHERE " . implode(' AND ', array_map(fn($key) => "$key = :$key", array_keys($condiciones)));
        $stmt = $this->prepare($sql);
        if($condiciones)
            foreach ($condiciones as $key => $value)
                $stmt->bindValue(":$key", $value);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insert($table, $valores) {
        $keys = implode(', ', array_fill(0, count($valores), '?'));
        $columnas = implode(', ', array_keys($valores));            
        $query = "INSERT INTO $table ($columnas) VALUES ($keys)"; 
        $stmt = $this->prepare($query);
        return $stmt->execute(array_values($valores));  
    }

    public function delete($table, $condiciones) {
        $sql = "DELETE FROM $table WHERE " . implode(' AND ', array_map(fn($key) => "$key = :$key", array_keys($condiciones)));
        $stmt = $this->prepare($sql);
        foreach ($condiciones as $key => $value)
            $stmt->bindValue(":$key", $value);
        return $stmt->execute();
    }

    public function update($table, $valores, $condiciones){
        $sql = "UPDATE $table SET " . implode(', ', array_map(fn($key) => "$key = :$key", array_keys($valores))) . 
        ' WHERE ' . implode(' AND ', array_map(fn($key) => "$key = :$key", array_keys($condiciones)));
        $stmt = $this->prepare($sql);
        foreach ($valores as $key => $value)
            $stmt->bindValue(":$key", $value);
        foreach ($condiciones as $key => $value)
            $stmt->bindValue(":$key", $value);
        return $stmt->execute();
    }
}
?>