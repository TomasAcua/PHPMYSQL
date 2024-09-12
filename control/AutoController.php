<?php

include_once __DIR__ . '/../modelo/db.php';
include_once __DIR__ . '/../modelo/Auto.php';

class AutoController
{
    private $db;
    private $auto;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->auto = new Auto($this->db);
    }

    // Obtener todos los autos
    public function obtenerAutos()
    {
        $stmt = $this->auto->obtenerAutos();
        $autos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $autos;
    }

    // Insertar un nuevo auto
    public function insertarAuto($datos)
    {
        try {
            $query = "INSERT INTO " . $this->auto->table_name . " (Patente, Marca, Modelo, DniDuenio) 
              VALUES (:Patente, :Marca, :Modelo, :DniDuenio)";

            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':Patente', $datos['Patente']);
            $stmt->bindParam(':Marca', $datos['Marca']);
            $stmt->bindParam(':Modelo', $datos['Modelo']);
            $stmt->bindParam(':DniDuenio', $datos['DniDuenio']);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al insertar la persona: " . $e->getMessage();
            return false;
        }
    }


    // Actualizar un auto
    public function actualizarAuto($datos)
    {
        $this->auto->Patente = $datos['Patente'];
        $this->auto->Marca = $datos['Marca'];
        $this->auto->Modelo = $datos['Modelo'];
        $this->auto->DniDuenio = $datos['DniDuenio'];

        if ($this->auto->actualizar()) {
            return "Auto actualizado correctamente.";
        } else {
            return "Error al actualizar auto.";
        }
    }

    // Eliminar un auto
    public function eliminarAuto($Patente)
    {
        $this->auto->Patente = $Patente;
        if ($this->auto->eliminar()) {
            return "Auto eliminado correctamente.";
        } else {
            return "Error al eliminar auto.";
        }
    }

    // Obtener un auto por patente
    public function obtenerAutoPorPatente($patente)
    {
        try {
            $query = "SELECT * FROM " . $this->auto->table_name . " WHERE Patente = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $patente);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al insertar la persona: " . $e->getMessage();
            return false;
        }
    }

    // Obtener autos por DNI del dueño
    public function obtenerAutosPorDni($dni)
    {
        try {
            $query = "SELECT * FROM " . $this->auto->table_name . " WHERE DniDuenio = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $dni);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al insertar la persona: " . $e->getMessage();
            return false;
        }
    }

    // Actualizar el dueño del auto
    public function actualizarDueño($patente, $nuevoDni)
    {
        try {
            $query = "UPDATE " . $this->auto->table_name . " 
              SET DniDuenio = ? WHERE Patente = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $nuevoDni);
            $stmt->bindParam(2, $patente);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar el dueño del auto: " . $e->getMessage();
            return false;
        }
    }
}
