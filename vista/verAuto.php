<?php
include_once '../configuracion.php';

// Instancia de los controladores
$autoController = new AutoController();
$personaController = new PersonaController();

// Obtener todos los autos a través del controlador
$resultadoAutos = $autoController->obtenerAutos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="/PHPMYSQL/vista/js/navegacion.js"></script>
</head>
<body>
<?php include 'estructura/header.php'; ?>
 <div id="navbar"></div>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Listado de Autos</h1>

        <?php
        if ($resultadoAutos['success']) {
            $autos = $resultadoAutos['data'];

            if (empty($autos)) {
                echo "<div class='alert alert-warning text-center'>No hay autos disponibles.</div>";
            } else {
                echo "<table class='table table-bordered table-hover'>";
                echo "<thead class='thead-dark'>";
                echo "<tr><th>Patente</th><th>Marca</th><th>Modelo</th><th>Dueño</th></tr>";
                echo "</thead>";
                echo "<tbody>";

                // Mostrar los autos y sus dueños
                foreach ($autos as $auto) {
                    $resultadoPersona = $personaController->obtenerPersonaPorDni($auto['DniDuenio']);
                    
                    if ($resultadoPersona['success']) {
                        $persona = $resultadoPersona['data'];
                        echo "<tr>";
                        echo "<td>{$auto['Patente']}</td>";
                        echo "<td>{$auto['Marca']}</td>";
                        echo "<td>{$auto['Modelo']}</td>";
                        echo "<td>{$persona['Nombre']} {$persona['Apellido']}</td>";
                        echo "</tr>";
                    } else {
                        echo "<tr><td colspan='4' class='text-danger text-center'>Error al obtener el dueño del auto.</td></tr>";
                    }
                }

                echo "</tbody>";
                echo "</table>";
            }
        } else {
            echo "<div class='alert alert-danger text-center'>Error al obtener los autos: " . $resultadoAutos['message'] . "</div>";
        }
        ?>
    </div>

    <div class="container text-center mt-4">
        <a href="../menu.php" class="btn btn-secondary">Volver al Menú</a>
    </div>
    <?php include 'estructura/footer.php'; ?>
</body>
</html>
