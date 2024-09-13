<?php
include_once '../control/PersonaController.php';

// Instanciar el controlador de persona
$personaController = new PersonaController();
$resultadoPersonas = $personaController->obtenerPersonas();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Personas</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultadoPersonas['success'] && !empty($resultadoPersonas['data'])) {
                    foreach ($resultadoPersonas['data'] as $persona) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($persona['NroDni']); ?></td>
                        <td><?php echo htmlspecialchars($persona['Nombre']); ?></td>
                        <td><?php echo htmlspecialchars($persona['Apellido']); ?></td>
                        <td>
                            <a href="accion/autosPersona.php?dni=<?php echo htmlspecialchars($persona['NroDni']); ?>" class="btn btn-info">Ver Autos</a>
                        </td>
                    </tr>
                <?php }
                } else { ?>
                    <tr>
                        <td colspan="4">No hay personas registradas.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <a href="../menu.php" class="btn btn-secondary mt-3">Volver al Menú</a>

</body>
</html>
