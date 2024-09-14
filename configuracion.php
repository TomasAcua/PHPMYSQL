<?php
// Encabezados de configuración
header('Content-Type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate");

// Configuración del proyecto
$PROYECTO = 'PHPMYSQL';

// Definir la raíz del proyecto
$ROOT = $_SERVER['DOCUMENT_ROOT'] . "/$PROYECTO/";

// Incluye el archivo de utilidades que contiene el autoloader y funciones comunes
include_once($ROOT . 'control/utils.php');

// Definir la página de inicio de sesión
$INICIO = "Location:http://" . $_SERVER['HTTP_HOST'] . "/$PROYECTO/vista/login/login.php";

// Definir la página principal del proyecto (menú principal)
$PRINCIPAL = "Location:http://" . $_SERVER['HTTP_HOST'] . "/$PROYECTO/principal.php";

// Almacenar la raíz del proyecto en la sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si no ha sido iniciada
}
$_SESSION['ROOT'] = $ROOT;
?>
