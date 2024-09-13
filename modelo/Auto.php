<?php
class Auto {
    private $conn;
    public $table_name = "auto";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para insertar un auto
    public function insertar($datos) {
        try {
            $query = "INSERT INTO " . $this->table_name . " (Patente, Marca, Modelo, DniDuenio) 
                      VALUES (:Patente, :Marca, :Modelo, :DniDuenio)";
    
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':Patente', $datos['Patente']);
            $stmt->bindParam(':Marca', $datos['Marca']);
            $stmt->bindParam(':Modelo', $datos['Modelo']);
            $stmt->bindParam(':DniDuenio', $datos['DniDuenio']);

            if ($stmt->execute()) {
                return ['success' => true];
            } else {
                return ['success' => false, 'message' => 'Error al insertar el auto en la base de datos.'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
        }
    }

    public function obtenerPorPatente($patente) {
        try {
            $query = "SELECT * FROM " . $this->table_name . " WHERE Patente = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $patente);
            $stmt->execute();
            $auto = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $auto];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
        }
    }
    
    public function obtenerTodos() {
        try {
            $query = "SELECT * FROM " . $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $autos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $autos];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
        }
    }
    public function obtenerPorDni($dniDuenio) {
        try {
            $query = "SELECT * FROM " . $this->table_name . " WHERE DniDuenio = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $dniDuenio);
            $stmt->execute();
            $autos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $autos];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
        }
    }
    public function actualizarDueño($patente, $nuevoDni) {
        try {
            $query = "UPDATE " . $this->table_name . " SET DniDuenio = ? WHERE Patente = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $nuevoDni);
            $stmt->bindParam(2, $patente);
    
            return ['success' => $stmt->execute()];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
        }
    }
    
    
    
}

?>
