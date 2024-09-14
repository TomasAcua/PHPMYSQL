// Código para cargar la barra de navegación dinámica
document.addEventListener("DOMContentLoaded", function () {
    const navbar = `
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/PHPMYSQL/menu.php">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/PHPMYSQL/vista/BuscarPersona.html">Buscar Persona</a></li>
                    <li class="nav-item"><a class="nav-link" href="/PHPMYSQL/vista/NuevaPersona.php">Agregar Persona</a></li>
                    <li class="nav-item"><a class="nav-link" href="/PHPMYSQL/vista/BuscarAuto.php">Buscar Auto</a></li>
                    <li class="nav-item"><a class="nav-link" href="/PHPMYSQL/vista/NuevoAuto.php">Agregar Auto</a></li>
                </ul>
            </div>
        </nav>
    `;
    document.getElementById("navbar").innerHTML = navbar;
});
