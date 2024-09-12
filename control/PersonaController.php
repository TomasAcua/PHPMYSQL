<?php
 
 include_once __DIR__ . '/../modelo/db.php';
include_once __DIR__ . '/../modelo/Persona.php';

class PersonaController {
    private $db;
    private $persona;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->persona = new Persona($this->db);
    }

    // Obtener todas las personas
    public function obtenerPersonas() {
        $stmt = $this->persona->obtenerPersonas();
        $personas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $personas;
    }

 // Insertar una nueva persona
public function insertarPersona($datos) {
    try{
    $query = "INSERT INTO " . $this->persona->table_name . " (NroDni, Nombre, Apellido, Telefono, Domicilio) 
              VALUES (:NroDni, :Nombre, :Apellido, :Telefono, :Domicilio)";

    $stmt = $this->db->prepare($query);

    $stmt->bindParam(':NroDni', $datos['NroDni']);
    $stmt->bindParam(':Nombre', $datos['Nombre']);
    $stmt->bindParam(':Apellido', $datos['Apellido']);
    $stmt->bindParam(':Telefono', $datos['Telefono']);
    $stmt->bindParam(':Domicilio', $datos['Domicilio']);

    return $stmt->execute();
} catch (PDOException $e) {
    echo "Error al insertar la persona: " . $e->getMessage();
    return false;
}
}


    // Actualizar los datos de una persona
public function actualizarPersona($datos) {
    try{
    $query = "UPDATE " . $this->persona->table_name . " 
              SET Nombre=:Nombre, Apellido=:Apellido, Telefono=:Telefono, Domicilio=:Domicilio 
              WHERE NroDni=:NroDni";

    $stmt = $this->db->prepare($query);

    $stmt->bindParam(':NroDni', $datos['NroDni']);
    $stmt->bindParam(':Nombre', $datos['Nombre']);
    $stmt->bindParam(':Apellido', $datos['Apellido']);
    $stmt->bindParam(':Telefono', $datos['Telefono']);
    $stmt->bindParam(':Domicilio', $datos['Domicilio']);

    return $stmt->execute();
} catch (PDOException $e) {
    echo "Error al insertar la persona: " . $e->getMessage();
    return false;
}
}


    // Eliminar una persona
    public function eliminarPersona($NroDni) {
        $this->persona->NroDni = $NroDni;
        if ($this->persona->eliminar()) {
            return "Persona eliminada correctamente.";
        } else {
            return "Error al eliminar persona.";
        }
    }


// Obtener una persona por DNI
  public function obtenerPersonaPorDni($Dni) {
    try{
    $query = "SELECT * FROM " . $this->persona->table_name . " WHERE NroDni = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(1, $Dni);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al insertar la persona: " . $e->getMessage();
    return false;
}
}

}
