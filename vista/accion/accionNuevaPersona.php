<?php
include_once '../../configuracion.php';

$datos = darDatosSubmitted();

if (isset($datos['dni'], $datos['nombre'], $datos['apellido'], $datos['telefono'], $datos['domicilio'], $datos['fechaNac'])) {
    $personaController = new PersonaController();


    $resultado = $personaController->insertarPersona(datos: [
        'NroDni' => $datos['dni'],
        'Nombre' => $datos['nombre'],
        'Apellido' => $datos['apellido'],
        'Telefono' => $datos['telefono'],
        'Domicilio' => $datos['domicilio'],
        'fechaNac' => $datos['fechaNac'] 
    ]);

    // Verificamos si la operación fue exitosa
    if ($resultado['success']) {
        echo "<p>La persona ha sido registrada exitosamente.</p>";
    } else {
        echo "<p>Hubo un error: " . $resultado['message'] . "</p>";
    }
} else {
    // Si falta algún campo
    echo "<p>Por favor, complete todos los campos.</p>";
}
?>
<a href="../NuevaPersona.php" class="btn btn-primary mt-3">Volver al formulario</a>
