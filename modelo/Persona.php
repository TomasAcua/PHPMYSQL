<?php
class Persona {
    private $conn;
    public $table_name = "persona";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para insertar una persona
    public function insertar($datos) {
        try {
            $query = "INSERT INTO " . $this->table_name . " (NroDni, Nombre, Apellido, Telefono, Domicilio) 
                      VALUES (:NroDni, :Nombre, :Apellido, :Telefono, :Domicilio)";
    
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':NroDni', $datos['NroDni']);
            $stmt->bindParam(':Nombre', $datos['Nombre']);
            $stmt->bindParam(':Apellido', $datos['Apellido']);
            $stmt->bindParam(':Telefono', $datos['Telefono']);
            $stmt->bindParam(':Domicilio', $datos['Domicilio']);

            if ($stmt->execute()) {
                return ['success' => true];
            } else {
                return ['success' => false, 'message' => 'Error al insertar la persona en la base de datos.'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
        }
    }

    public function obtenerPorDni($dni) {
        try {
            $query = "SELECT * FROM " . $this->table_name . " WHERE NroDni = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $dni);
            $stmt->execute();
            $persona = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $persona];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
        }
    }
    

    // Método para actualizar una persona
    public function actualizar($datos) {
        try {
            $query = "UPDATE " . $this->table_name . " 
                      SET Nombre=:Nombre, Apellido=:Apellido, Telefono=:Telefono, Domicilio=:Domicilio 
                      WHERE NroDni=:NroDni";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':NroDni', $datos['NroDni']);
            $stmt->bindParam(':Nombre', $datos['Nombre']);
            $stmt->bindParam(':Apellido', $datos['Apellido']);
            $stmt->bindParam(':Telefono', $datos['Telefono']);
            $stmt->bindParam(':Domicilio', $datos['Domicilio']);

            return $stmt->execute();
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
        }
    }
    public function obtenerTodas() {
        try {
            $query = "SELECT * FROM " . $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $personas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $personas];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
        }
    }
    
}
?>
