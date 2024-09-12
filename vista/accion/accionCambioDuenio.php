<?php
include_once '../../control/AutoController.php';
include_once '../../control/PersonaController.php';

if (isset($_POST['patente']) && isset($_POST['dni'])) {
    $patente = $_POST['patente'];
    $nuevoDni = $_POST['dni'];

    // Instanciar los controladores
    $autoController = new AutoController();
    $personaController = new PersonaController();

    // Verificar si el nuevo dueño existe
    $persona = $personaController->obtenerPersonaPorDni($nuevoDni);

    if ($persona) {
        // Actualizar el dueño del auto
        $auto = $autoController->obtenerAutoPorPatente($patente);
        
        if ($auto) {
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
