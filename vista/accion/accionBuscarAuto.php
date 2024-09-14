<?php
include_once '../../configuracion.php';

// Instanciar los controladores
$autoController = new AutoController();
$personaController = new PersonaController();

// Obtener la patente desde el formulario
$patente = $_GET['patente'] ?? null;

if ($patente) {
    // Obtener el auto por la patente
    $resultadoAuto = $autoController->obtenerAutoPorPatente($patente);

    // Si el auto fue encontrado
    if ($resultadoAuto['success'] && $resultadoAuto['data']) {
        $autoEncontrado = $resultadoAuto['data'];
        $resultadoPersona = $personaController->obtenerPersonaPorDni($autoEncontrado['DniDuenio']);

        if ($resultadoPersona['success']) {
            $persona = $resultadoPersona['data'];
        } else {
            $persona = ['Nombre' => 'Desconocido', 'Apellido' => 'Desconocido'];
        }
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Resultado de la Búsqueda</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        </head>
        <body>
            <div class="container mt-5">
                <h1>Detalles del Auto</h1>
                <table class="table table-bordered">
                    <tr>
                        <th>Patente</th>
                        <td><?php echo htmlspecialchars($autoEncontrado['Patente']); ?></td>
                    </tr>
                    <tr>
                        <th>Marca</th>
                        <td><?php echo htmlspecialchars($autoEncontrado['Marca']); ?></td>
                    </tr>
                    <tr>
                        <th>Modelo</th>
                        <td><?php echo htmlspecialchars($autoEncontrado['Modelo']); ?></td>
                    </tr>
                    <tr>
                        <th>Dueño</th>
                        <td><?php echo htmlspecialchars($persona['Nombre'] . " " . $persona['Apellido']); ?></td>
                    </tr>
                </table>
                <a href="../buscarAuto.php" class="btn btn-primary mt-3">Volver a la búsqueda</a>
            </div>
        </body>
        </html>
        <?php
    } else {
        // Si no se encuentra el auto
        echo "<p>No se encontró un auto con la patente " . htmlspecialchars($patente) . ".</p>";
        echo "<a href='../buscarAuto.php' class='btn btn-primary'>Volver a la búsqueda</a>";
    }
} else {
    echo "<p>Por favor ingrese una patente válida.</p>";
    echo "<a href='../buscarAuto.php' class='btn btn-primary'>Volver a la búsqueda</a>";
}
?>
