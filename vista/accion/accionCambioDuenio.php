<?php
include_once '../../control/AutoController.php';
include_once '../../control/PersonaController.php';
include_once '../../control/utils.php';

$datos = darDatosSubmitted();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de Dueño</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Resultado del Cambio de Dueño</h1>

        <div class="alert alert-info text-center">
            <?php
            if (isset($datos['patente']) && isset($datos['dni'])) {
                $patente = $datos['patente'];
                $nuevoDni = $datos['dni'];

                // Instanciar los controladores
                $autoController = new AutoController();
                $personaController = new PersonaController();

                // Verificar si el nuevo dueño existe
                $resultadoPersona = $personaController->obtenerPersonaPorDni($nuevoDni);

                if ($resultadoPersona['success'] && $resultadoPersona['data']) {
                    $persona = $resultadoPersona['data'];

                    // Obtener el auto por la patente
                    $resultadoAuto = $autoController->obtenerAutoPorPatente($patente);

                    if ($resultadoAuto['success'] && $resultadoAuto['data']) {
                        // Actualizar el dueño del auto
                        $autoController->actualizarDueño($patente, $nuevoDni);
                        echo "<p class='text-success'>El dueño del auto con patente {$patente} ha sido actualizado a {$persona['Nombre']} {$persona['Apellido']}.</p>";
                    } else {
                        echo "<p class='text-danger'>No se encontró un auto con la patente {$patente}.</p>";
                    }
                } else {
                    echo "<p class='text-danger'>No se encontró una persona con el DNI {$nuevoDni}.</p>";
                }
            } else {
                echo "<p class='text-warning'>Por favor complete ambos campos.</p>";
            }
            ?>
        </div>

        <div class="text-center">
            <a href="../cambioDuenio.php" class="btn btn-primary mt-3">Volver al formulario</a>
            <a href="../../menu.php" class="btn btn-secondary mt-3">Volver al Menú</a>
        </div>
    </div>
</body>
</html>
