<?php
include_once '../../control/AutoController.php';
include_once '../../control/PersonaController.php';

try {
    if (isset($_POST['patente']) && isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['dniDuenio'])) {
        $patente = $_POST['patente'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $dniDuenio = $_POST['dniDuenio'];

        // Instanciar los controladores
        $autoController = new AutoController();
        $personaController = new PersonaController();

        // Verificar si el dueño existe en la base de datos
        $persona = $personaController->obtenerPersonaPorDni($dniDuenio);

        if ($persona) {
            // Registrar el auto si el dueño existe
            $resultado = $autoController->insertarAuto([
                'Patente' => $patente,
                'Marca' => $marca,
                'Modelo' => $modelo,
                'DniDuenio' => $dniDuenio
            ]);

            if ($resultado) {
                echo "<p>El auto ha sido registrado exitosamente.</p>";
            } else {
                echo "<p>Hubo un error al registrar el auto.</p>";
            }
        } else {
            // Si el dueño no existe, mostrar el mensaje y el enlace para registrar una nueva persona
            echo "<p>No se encontró una persona con el DNI $dniDuenio. <a href='NuevaPersona.php'>Registrar una nueva persona</a>.</p>";
        }
    } else {
        echo "<p>Por favor complete todos los campos del formulario.</p>";
    }
} catch (Exception $e) {
    echo "Error procesando el formulario: " . $e->getMessage();
}
?>
<a href="NuevoAuto.php" class="btn btn-primary mt-3">Volver al formulario</a>
