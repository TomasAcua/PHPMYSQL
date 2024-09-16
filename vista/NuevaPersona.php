<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Persona</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="/PHPMYSQL/vista/js/navegacion.js"></script>
</head>
<body>
<?php include 'estructura/header.php'; ?>
<div id="navbar"></div>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Agregar Persona</h1>
        <form id="formularioPersona" action="accion/accionNuevaPersona.php" method="POST">
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese el DNI" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese el apellido" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el teléfono" required>
            </div>
            <div class="mb-3">
                <label for="domicilio" class="form-label">Domicilio</label>
                <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Ingrese el domicilio" required>
            </div>
            <div class="mb-3">
                <label for="fechaNac" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fechaNac" name="fechaNac" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Persona</button>
        </form>
    </div>
    <a href="../menu.php" class="btn btn-secondary mt-3 " >Volver al Menú</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/PHPMYSQL/vista/js/validaciones.js"></script>
    <?php include 'estructura/footer.php'; ?>
</body>
</html>
