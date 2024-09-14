<?php
include_once '../../configuracion.php';


// Verificar si se proporcionó un DNI válido
$dni = $_GET['dni'] ?? null;

if ($dni) {
    // Instanciar los controladores
    $autoController = new AutoController();
    $personaController = new PersonaController();

    // Obtener la persona por DNI
    $resultadoPersona = $personaController->obtenerPersonaPorDni($dni);

    if ($resultadoPersona['success'] && $resultadoPersona['data']) {
        $persona = $resultadoPersona['data'];

        // Obtener autos de la persona
        $resultadoAutos = $autoController->obtenerAutosPorDni($dni);
    } else {
        echo "Persona no encontrada.";
        exit;
    }
} else {
    echo "No se ha proporcionado un DNI válido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autos de <?php echo htmlspecialchars($persona['Nombre'] . " " . $persona['Apellido']); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Autos de <?php echo htmlspecialchars($persona['Nombre'] . " " . $persona['Apellido']); ?></h1>
        <?php if ($resultadoAutos['success'] && !empty($resultadoAutos['data'])) { ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Patente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultadoAutos['data'] as $auto) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($auto['Patente']); ?></td>
                        <td><?php echo htmlspecialchars($auto['Marca']); ?></td>
                        <td><?php echo htmlspecialchars($auto['Modelo']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No se encontraron autos para esta persona.</p>
        <?php } ?>
        <a href="../listaPersonas.php" class="btn btn-primary">Volver a la lista de personas</a>
    </div>
</body>
</html>
