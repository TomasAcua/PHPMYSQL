<?php
class PersonaController {
    private $db;
    private $persona;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->persona = new Persona($this->db);
    }

    // Llamar al modelo para insertar una persona
    public function insertarPersona($datos) {
        return $this->persona->insertar($datos);
    }

    // Llamar al modelo para obtener una persona por DNI
    public function obtenerPersonaPorDni($dni) {
        return $this->persona->obtenerPorDni($dni);
    }

    // Llamar al modelo para actualizar una persona
    public function actualizarPersona($datos) {
        return $this->persona->actualizar($datos);
    }
    public function obtenerPersonas() {
        return $this->persona->obtenerTodas();
    }
    
}
?>
