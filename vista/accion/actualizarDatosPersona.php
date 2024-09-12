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

        // Actualizar los datos de la persona
        $resultado = $personaController->actualizarPersona([
            'NroDni' => $dni,
            'Nombre' => $nombre,
            'Apellido' => $apellido,
            'Telefono' => $telefono,
            'Domicilio' => $domicilio
        ]);

        if ($resultado) {
            echo "<p>Los datos de la persona con DNI $dni han sido actualizados correctamente.</p>";
        } else {
            echo "<p>Hubo un error al actualizar los datos.</p>";
        }
    } else {
        echo "<p>Por favor complete todos los campos.</p>";
    }
} catch (Exception $e) {
    echo "Error al actualizar los datos: " . $e->getMessage();
}
?>
<a href="BuscarPersona.html" class="btn btn-primary">Volver a buscar otra persona</a>
<a href="../../menu.php" class="btn btn-secondary mt-3">Volver al Menú</a>
