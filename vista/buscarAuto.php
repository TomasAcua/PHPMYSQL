
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Auto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Buscar Auto por Patente</h1>
        <form action="accionBuscarAuto.php" method="GET">
            <div class="mb-3">
                <label for="patente" class="form-label">Patente del Auto</label>
                <input type="text" class="form-control" id="patente" name="patente" placeholder="Ingrese la patente" required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
    <a href="../../menu.php" class="btn btn-secondary mt-3">Volver al Menú</a>

</body>
</html>
