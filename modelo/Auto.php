<?php
class Auto {
    private $conn;
    public $table_name = "auto";

    public $Patente;
    public $Marca;
    public $Modelo;
    public $DniDuenio;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para insertar un auto
    public function insertar() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET Patente=:Patente, Marca=:Marca, Modelo=:Modelo, DniDuenio=:DniDuenio";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":Patente", $this->Patente);
        $stmt->bindParam(":Marca", $this->Marca);
        $stmt->bindParam(":Modelo", $this->Modelo);
        $stmt->bindParam(":DniDuenio", $this->DniDuenio);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para obtener todos los autos
    public function obtenerAutos() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Método para actualizar un auto
    public function actualizar() {
        $query = "UPDATE " . $this->table_name . " 
                  SET Marca=:Marca, Modelo=:Modelo, DniDuenio=:DniDuenio 
                  WHERE Patente=:Patente";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":Patente", $this->Patente);
        $stmt->bindParam(":Marca", $this->Marca);
        $stmt->bindParam(":Modelo", $this->Modelo);
        $stmt->bindParam(":DniDuenio", $this->DniDuenio);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para eliminar un auto
    public function eliminar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE Patente=:Patente";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":Patente", $this->Patente);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
