<?php
include_once '../../control/PersonaController.php';

try {
    if (isset($_POST['dni']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) && isset($_POST['domicilio'])) {
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $domicilio = $_POST['domicilio'];

        // Instanciar el controlador de persona
        $personaController = new PersonaController();

        // Insertar nueva persona
        $resultado = $personaController->insertarPersona([
            'NroDni' => $dni,
            'Nombre' => $nombre,
            'Apellido' => $apellido,
            'Telefono' => $telefono,
            'Domicilio' => $domicilio
        ]);

        if ($resultado) {
            echo "<p>La persona ha sido registrada exitosamente.</p>";
        } else {
            echo "<p>Hubo un error al registrar la persona.</p>";
        }
    } else {
        echo "<p>Por favor complete todos los campos del formulario.</p>";
    }
} catch (Exception $e) {
    echo "Error procesando el formulario: " . $e->getMessage();
}
?>
<a href="NuevaPersona.php" class="btn btn-primary mt-3">Volver al formulario</a>
