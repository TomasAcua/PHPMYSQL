<?php
include_once '../../control/AutoController.php';
include_once  '../../control/PersonaController.php';

// Instancia de los controladores
$autoController = new AutoController();
$personaController = new PersonaController();

// Obtener todos los autos
$autos = $autoController->obtenerAutos();

// Verificación si hay autos
if (empty($autos)) {
    echo "No hay autos disponibles.";
} else {
    echo "<table class='table table-bordered'>";
    echo "<tr><th>Patente</th><th>Marca</th><th>Modelo</th><th>Dueño</th></tr>";

    // Mostrar los autos y sus dueños
    foreach ($autos as $auto) {
        $persona = $personaController->obtenerPersonaPorDni($auto['DniDuenio']); // Obtener la persona asociada
        echo "<tr>";
        echo "<td>{$auto['Patente']}</td>";
        echo "<td>{$auto['Marca']}</td>";
        echo "<td>{$auto['Modelo']}</td>";
        echo "<td>{$persona['Nombre']} {$persona['Apellido']}</td>";
        echo "</tr>";
    }

    echo "</table>";
}

?>
