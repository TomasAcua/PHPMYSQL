<?php
include_once '../../control/AutoController.php';
include_once '../../control/PersonaController.php';

if (isset($_GET['dni']) && !empty($_GET['dni'])) {
    $dni = $_GET['dni'];

    // Instanciar los controladores
    $autoController = new AutoController();
    $personaController = new PersonaController();

    // Obtener la persona por DNI
    $persona = $personaController->obtenerPersonaPorDni($dni);

    if ($persona) {
        // Obtener autos de la persona
        $autos = $autoController->obtenerAutosPorDni($dni);
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
    <title>Autos de <?php echo $persona['Nombre'] . " " . $persona['Apellido']; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Autos de <?php echo $persona['Nombre'] . " " . $persona['Apellido']; ?></h1>
        <?php if (!empty($autos)) { ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Patente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($autos as $auto) { ?>
                    <tr>
                        <td><?php echo $auto['Patente']; ?></td>
                        <td><?php echo $auto['Marca']; ?></td>
                        <td><?php echo $auto['Modelo']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No se encontraron autos para esta persona.</p>
        <?php } ?>
        <a href="listaPersonas.php" class="btn btn-primary">Volver a la lista de personas</a>
    </div>
</body>
</html>
