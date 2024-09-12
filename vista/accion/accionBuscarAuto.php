<?php
include_once __DIR__ . '/../../control/AutoController.php';
include_once __DIR__ . '/../../control/PersonaController.php';

// Instanciar los controladores
$autoController = new AutoController();
$personaController = new PersonaController();

if (isset($_GET['patente']) && !empty($_GET['patente'])) {
    $patente = $_GET['patente'];

    // Obtener el auto por la patente
    $autos = $autoController->obtenerAutos();

    $autoEncontrado = null;
    foreach ($autos as $auto) {
        if (strtolower($auto['Patente']) == strtolower($patente)) {
            $autoEncontrado = $auto;
            break;
        }
    }

    // Si el auto fue encontrado
    if ($autoEncontrado) {
        $persona = $personaController->obtenerPersonaPorDni($autoEncontrado['DniDuenio']); // Obtener datos del dueño
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
                        <td><?php echo $autoEncontrado['Patente']; ?></td>
                    </tr>
                    <tr>
                        <th>Marca</th>
                        <td><?php echo $autoEncontrado['Marca']; ?></td>
                    </tr>
                    <tr>
                        <th>Modelo</th>
                        <td><?php echo $autoEncontrado['Modelo']; ?></td>
                    </tr>
                    <tr>
                        <th>Dueño</th>
                        <td><?php echo $persona['Nombre'] . " " . $persona['Apellido']; ?></td>
                    </tr>
                </table>
                <a href="buscarAuto.php" class="btn btn-primary mt-3">Volver a la búsqueda</a>
            </div>
        </body>
        </html>
        <?php
    } else {
        // Si no se encuentra el auto
        echo "<p>No se encontró un auto con la patente $patente.</p>";
        echo "<a href='buscarAuto.php' class='btn btn-primary'>Volver a la búsqueda</a>";
    }
} else {
    echo "<p>Por favor ingrese una patente.</p>";
    echo "<a href='buscarAuto.php' class='btn btn-primary'>Volver a la búsqueda</a>";
}
?>
