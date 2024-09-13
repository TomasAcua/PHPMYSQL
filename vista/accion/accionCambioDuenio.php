<?php
include_once '../../control/AutoController.php';
include_once '../../control/PersonaController.php';
include_once '../../control/utils.php';

$datos = darDatosSubmitted();

if (isset($datos['patente']) && isset($datos['dni'])) {
    $patente = $datos['patente'];
    $nuevoDni = $datos['dni'];

    // Instanciar los controladores
    $autoController = new AutoController();
    $personaController = new PersonaController();

    // Verificar si el nuevo dueño existe
    $resultadoPersona = $personaController->obtenerPersonaPorDni($nuevoDni);

    if ($resultadoPersona['success'] && $resultadoPersona['data']) {
        $persona = $resultadoPersona['data'];

        // Obtener el auto por la patente
        $resultadoAuto = $autoController->obtenerAutoPorPatente($patente);

        if ($resultadoAuto['success'] && $resultadoAuto['data']) {
            // Actualizar el dueño del auto
            $autoController->actualizarDueño($patente, $nuevoDni);
            echo "<p>El dueño del auto con patente {$patente} ha sido actualizado a {$persona['Nombre']} {$persona['Apellido']}.</p>";
        } else {
            echo "<p>No se encontró un auto con la patente {$patente}.</p>";
        }
    } else {
        echo "<p>No se encontró una persona con el DNI {$nuevoDni}.</p>";
    }
} else {
    echo "<p>Por favor complete ambos campos.</p>";
}
?>
<a href="CambioDuenio.php" class="btn btn-primary mt-3">Volver al formulario</a>
