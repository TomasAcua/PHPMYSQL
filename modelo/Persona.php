<?php
class Persona {
    private $conn;
    public $table_name = "persona";

    public $NroDni;
    public $Apellido;
    public $Nombre;
    public $fechaNac;
    public $Telefono;
    public $Domicilio;

    // Constructor para inicializar la conexión a la base de datos
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para insertar una nueva persona
    public function insertar() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET NroDni=:NroDni, Apellido=:Apellido, Nombre=:Nombre, fechaNac=:fechaNac, Telefono=:Telefono, Domicilio=:Domicilio";

        $stmt = $this->conn->prepare($query);

        // Vincular los parámetros
        $stmt->bindParam(":NroDni", $this->NroDni);
        $stmt->bindParam(":Apellido", $this->Apellido);
        $stmt->bindParam(":Nombre", $this->Nombre);
        $stmt->bindParam(":fechaNac", $this->fechaNac);
        $stmt->bindParam(":Telefono", $this->Telefono);
        $stmt->bindParam(":Domicilio", $this->Domicilio);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para obtener todas las personas
    public function obtenerPersonas() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Método para actualizar una persona
    public function actualizar() {
        $query = "UPDATE " . $this->table_name . " 
                  SET Apellido=:Apellido, Nombre=:Nombre, fechaNac=:fechaNac, Telefono=:Telefono, Domicilio=:Domicilio 
                  WHERE NroDni=:NroDni";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":NroDni", $this->NroDni);
        $stmt->bindParam(":Apellido", $this->Apellido);
        $stmt->bindParam(":Nombre", $this->Nombre);
        $stmt->bindParam(":fechaNac", $this->fechaNac);
        $stmt->bindParam(":Telefono", $this->Telefono);
        $stmt->bindParam(":Domicilio", $this->Domicilio);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para eliminar una persona
    public function eliminar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE NroDni=:NroDni";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":NroDni", $this->NroDni);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
