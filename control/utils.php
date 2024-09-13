<?php
// Función para encapsular el envío por POST o GET
function darDatosSubmitted() {
    return $_SERVER["REQUEST_METHOD"] === "POST" ? $_POST : $_GET;
}
?>
