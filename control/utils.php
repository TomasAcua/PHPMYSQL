<?php
// Función para encapsular el envío por POST o GET
function darDatosSubmitted() {
    return $_SERVER["REQUEST_METHOD"] === "POST" ? $_POST : $_GET;
}

// Función para mostrar estructuras de datos de manera legible
function verEstructura($e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
}

// Autoloading de clases
spl_autoload_register(function ($class_name) {
    // Directorios donde buscar las clases
    $directories = array(
        $_SESSION['ROOT'] . 'modelo/',    // Carpeta modelo
        $_SESSION['ROOT'] . 'control/',   // Carpeta control
    );

    // Recorrer los directorios y buscar la clase
    foreach ($directories as $directory) {
        $file = $directory . $class_name . '.php';
        if (file_exists($file)) {
            require_once($file);
            return;
        }
    }
});
?>
