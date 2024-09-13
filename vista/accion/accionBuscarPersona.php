<?php
include_once '../../control/PersonaController.php';
include_once '../../control/utils.php';

$datos = darDatosSubmitted();

if (isset($datos['dni']) && !empty($datos['dni'])) {
    $dni = $datos['dni'];

    // Instanciar el controlador de persona
    $personaController = new PersonaController();
    $resultadoPersona = $personaController->obtenerPersonaPorDni($dni);

    if ($resultadoPersona['success'] && $resultadoPersona['data']) {
        $persona = $resultadoPersona['data'];
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Actualizar Persona</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        </head>
        <body>
            <div class="container mt-5">
                <h1>Actualizar Datos de Persona</h1>
                <form action="ActualizarDatosPersona.php" method="POST">
                    <input type="hidden" name="dni" value="<?php echo htmlspecialchars($persona['NroDni']); ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($persona['Nombre']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo htmlspecialchars($persona['Apellido']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo htmlspecialchars($persona['Telefono']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="domicilio" class="form-label">Domicilio</label>
                        <input type="text" class="form-control" id="domicilio" name="domicilio" value="<?php echo htmlspecialchars($persona['Domicilio']); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">Actualizar Datos</button>
                </form>
            </div>
            <a href="../../menu.php" class="btn btn-secondary mt-3">Volver al Menú</a>
        </body>
        </html>
        <?php
    } else {
        echo "<p>No se encontró una persona con el DNI " . htmlspecialchars($dni) . ".</p>";
        echo "<a href='BuscarPersona.html' class='btn btn-primary'>Volver a buscar</a>";
    }
} else {
    echo "<p>Por favor ingrese un DNI válido.</p>";
    echo "<a href='BuscarPersona.html' class='btn btn-primary'>Volver a buscar</a>";
}
?>
