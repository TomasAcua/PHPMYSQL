<?php
include_once '../../configuracion.php';

$datos = darDatosSubmitted();

if (isset($datos['patente']) && isset($datos['marca']) && isset($datos['modelo']) && isset($datos['dniDuenio'])) {
    $autoController = new AutoController();

    // Insertar auto a través del controlador
    $resultado = $autoController->insertarAuto(datos: [
        'Patente' => $datos['patente'],
        'Marca' => $datos['marca'],
        'Modelo' => $datos['modelo'],
        'DniDuenio' => $datos['dniDuenio']
    ]);

    if ($resultado['success']) {
        echo "<p>El auto ha sido registrado exitosamente.</p>";
    } else {
        echo "<p>Hubo un error: " . $resultado['message'] . "</p>";
    }
} else {
    echo "<p>Por favor, complete todos los campos.</p>";
}
?>
<a href="../NuevoAuto.php" class="btn btn-primary mt-3">Volver al formulario</a>
