<?php
include_once __DIR__ . '/../control/AutoController.php';
include_once __DIR__ . '/../control/PersonaController.php';
include_once __DIR__ . '/../control/utils.php';

// Instancia de los controladores
$autoController = new AutoController();
$personaController = new PersonaController();

// Obtener todos los autos a través del controlador
$resultadoAutos = $autoController->obtenerAutos();

if ($resultadoAutos['success']) {
    $autos = $resultadoAutos['data'];

    if (empty($autos)) {
        echo "<p>No hay autos disponibles.</p>";
    } else {
        echo "<table class='table table-bordered'>";
        echo "<tr><th>Patente</th><th>Marca</th><th>Modelo</th><th>Dueño</th></tr>";

        // Mostrar los autos y sus dueños
        foreach ($autos as $auto) {
            $resultadoPersona = $personaController->obtenerPersonaPorDni($auto['DniDuenio']);
            
            if ($resultadoPersona['success']) {
                $persona = $resultadoPersona['data'];
                echo "<tr>";
                echo "<td>{$auto['Patente']}</td>";
                echo "<td>{$auto['Marca']}</td>";
                echo "<td>{$auto['Modelo']}</td>";
                echo "<td>{$persona['Nombre']} {$persona['Apellido']}</td>";
                echo "</tr>";
            } else {
                echo "<tr><td colspan='4'>Error al obtener el dueño del auto.</td></tr>";
            }
        }

        echo "</table>";
    }
} else {
    echo "<p>Error al obtener los autos: " . $resultadoAutos['message'] . "</p>";
}
?>
