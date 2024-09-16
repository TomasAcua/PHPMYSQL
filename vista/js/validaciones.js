$(document).ready(function() {
    // Validación del formulario de Persona
    $('#formularioPersona').on('submit', function(event) {
        let isValid = true;

        // Validación del campo DNI
        const dni = $('#dni').val();
        if (dni.length < 7 || dni.length > 10) {
            alert("El DNI debe tener entre 7 y 10 dígitos.");
            isValid = false;
        }

        // Validación de los campos de nombre y apellido
        const nombre = $('#nombre').val();
        const apellido = $('#apellido').val();
        if (!nombre || !apellido) {
            alert("El nombre y apellido son obligatorios.");
            isValid = false;
        }

        // Si la validación falla, evitar que el formulario se envíe
        if (!isValid) {
            event.preventDefault();
        }
    });

    // Validación del formulario de Auto
    $('#formularioAuto').on('submit', function(event) {
        let isValid = true;

        // Validación de la patente
        const patente = $('#patente').val();
        if (patente.length === 0) {
            alert("La patente es obligatoria.");
            isValid = false;
        }

        // Validación del modelo (debe ser un número positivo)
        const modelo = $('#modelo').val();
        if (isNaN(modelo) || modelo <= 0) {
            alert("El modelo debe ser un número positivo.");
            isValid = false;
        }

        // Validación del campo DNI del dueño
        const dniDuenio = $('#dniDuenio').val();
        if (dniDuenio.length < 7 || dniDuenio.length > 10) {
            alert("El DNI del dueño debe tener entre 7 y 10 dígitos.");
            isValid = false;
        }

        // Si la validación falla, evitar que el formulario se envíe
        if (!isValid) {
            event.preventDefault();
        }
    });
});
