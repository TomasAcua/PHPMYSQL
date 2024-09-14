<?php
include_once '../../configuracion.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Datos de Persona</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Actualizar Datos de Persona</h1>
        
        <div class="alert alert-info text-center">
            <?php
            try {
                if (isset($_POST['dni']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) && isset($_POST['domicilio'])) {
                    $dni = $_POST['dni'];
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $telefono = $_POST['telefono'];
                    $domicilio = $_POST['domicilio'];

                    // Instanciar el controlador de persona
                    $personaController = new PersonaController();

                    // Actualizar los datos de la persona
                    $resultado = $personaController->actualizarPersona([
                        'NroDni' => $dni,
                        'Nombre' => $nombre,
                        'Apellido' => $apellido,
                        'Telefono' => $telefono,
                        'Domicilio' => $domicilio
                    ]);

                    if ($resultado) {
                        echo "<p class='text-success'>Los datos de la persona con DNI $dni han sido actualizados correctamente.</p>";
                    } else {
                        echo "<p class='text-danger'>Hubo un error al actualizar los datos.</p>";
                    }
                } else {
                    echo "<p class='text-warning'>Por favor complete todos los campos.</p>";
                }
            } catch (Exception $e) {
                echo "<p class='text-danger'>Error al actualizar los datos: " . $e->getMessage() . "</p>";
            }
            ?>
        </div>

        <div class="text-center">
            <a href="../buscarPersona.html" class="btn btn-primary mt-3">Volver a buscar otra persona</a>
            <a href="../../menu.php" class="btn btn-secondary mt-3">Volver al Menú</a>
        </div>
    </div>
</body>
</html>
