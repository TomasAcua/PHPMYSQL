// Validación de campos de formularios
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("formularioPersona");
    if (form) {
        form.addEventListener("submit", function (event) {
            let isValid = true;

            // Validación del campo DNI
            const dni = document.getElementById("dni");
            if (!dni.value || dni.value.length < 7 || dni.value.length > 10) {
                isValid = false;
                alert("El DNI debe tener entre 7 y 10 dígitos.");
            }

            // Validación del nombre y apellido
            const nombre = document.getElementById("nombre");
            const apellido = document.getElementById("apellido");
            if (!nombre.value || !apellido.value) {
                isValid = false;
                alert("El nombre y apellido son obligatorios.");
            }

            if (!isValid) {
                event.preventDefault(); // Evitar el envío del formulario si hay errores
            }
        });
    }
});
