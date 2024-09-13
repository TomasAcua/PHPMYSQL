<?php
include_once '../modelo/db.php';
class AutoController {
    private $db;
    private $auto;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->auto = new Auto($this->db);
    }

    // Llamar al modelo para insertar un auto
    public function insertarAuto($datos) {
        return $this->auto->insertar($datos);
    }

    // Llamar al modelo para obtener un auto por patente
    public function obtenerAutoPorPatente($patente) {
        return $this->auto->obtenerPorPatente($patente);
    }
    

    // Llamar al modelo para actualizar el dueño del auto
    public function actualizarDueño($patente, $nuevoDni) {
        return $this->auto->actualizarDueño($patente, $nuevoDni);
    }
    public function obtenerAutos() {
        return $this->auto->obtenerTodos();
    }
    public function obtenerAutosPorDni($dni) {
        return $this->auto->obtenerPorDni($dni);
    }
    
    
}
?>
