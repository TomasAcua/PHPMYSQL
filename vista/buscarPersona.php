<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Persona</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="/PHPMYSQL/vista/js/navegacion.js"></script>
</head>
<body>
<?php include 'estructura/header.php'; ?>
<div id="navbar"></div>
    <div class="container mt-5">
        <h1>Buscar Persona</h1>
        <form action="accion/accionBuscarPersona.php" method="GET">
            <div class="mb-3">
                <label for="dni" class="form-label">Número de Documento</label>
                <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese el número de documento" required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
    
    <a href="../menu.php" class="btn btn-secondary mt-3">Volver al Menú</a>
    <?php include 'estructura/footer.php'; ?>

</body>
</html>
