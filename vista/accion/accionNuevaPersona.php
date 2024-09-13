<?php
include_once '../../control/PersonaController.php';
include_once '../../control/utils.php'; 

$datos = darDatosSubmitted();

if (isset($datos['dni']) && isset($datos['nombre']) && isset($datos['apellido']) && isset($datos['telefono']) && isset($datos['domicilio'])) {
    $personaController = new PersonaController();

    // Insertar persona a través del controlador
    $resultado = $personaController->insertarPersona(datos: [
        'NroDni' => $datos['dni'],
        'Nombre' => $datos['nombre'],
        'Apellido' => $datos['apellido'],
        'Telefono' => $datos['telefono'],
        'Domicilio' => $datos['domicilio']
    ]);

    if ($resultado['success']) {
        echo "<p>La persona ha sido registrada exitosamente.</p>";
    } else {
        echo "<p>Hubo un error: " . $resultado['message'] . "</p>";
    }
} else {
    echo "<p>Por favor, complete todos los campos.</p>";
}
?>
<a href="../NuevaPersona.php" class="btn btn-primary mt-3">Volver al formulario</a>
