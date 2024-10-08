<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Auto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/PHPMYSQL/vista/js/navegacion.js"></script>
</head>
<body>
<?php include 'estructura/header.php'; ?>
<div id="navbar"></div>
    <div class="container mt-5">
        <h1>Registrar Nuevo Auto</h1>
        <form id="formularioAuto" action="accion/accionNuevoAuto.php" method="POST">
            <div class="mb-3">
                <label for="patente" class="form-label">Patente</label>
                <input type="text" class="form-control" id="patente" name="patente" placeholder="Ingrese la patente" required>
            </div>
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" placeholder="Ingrese la marca" required>
            </div>
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="number" class="form-control" id="modelo" name="modelo" placeholder="Ingrese el año del modelo" required>
            </div>
            <div class="mb-3">
                <label for="dniDuenio" class="form-label">DNI del Dueño</label>
                <input type="text" class="form-control" id="dniDuenio" name="dniDuenio" placeholder="Ingrese el DNI del dueño" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Auto</button>
        </form>
    </div>
    <a href="../menu.php" class="btn btn-secondary mt-3">Volver al Menú</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/PHPMYSQL/vista/js/validaciones.js"></script>
    <?php include 'estructura/footer.php'; ?>
</body>
</html>
