// Manejo de botones y funciones de los formularios
document.addEventListener("DOMContentLoaded", function () {
    // Función para limpiar los formularios
    const btnReset = document.getElementById("btnReset");
    if (btnReset) {
        btnReset.addEventListener("click", function () {
            document.getElementById("formularioPersona").reset();
        });
    }

});
