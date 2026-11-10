/**
 * Script principal para la Plataforma Académica de Enfermería (TPA11)
 */

document.addEventListener("DOMContentLoaded", function () {
    console.log("Plataforma Académica de Enfermería - JS Inicializado correctamente.");

    // 1. Confirmación de cierre de sesión
    const logoutBtn = document.querySelector('a.text-danger');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function (e) {
            const confirmar = confirm("¿Estás seguro de que deseas cerrar sesión?");
            if (!confirmar) {
                e.preventDefault(); // Cancela la acción si el usuario se arrepiente
            }
        });
    }

    // 2. Efecto simple para resaltar filas en las tablas al pasar el cursor
    const tableRows = document.querySelectorAll('.table-hover tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function () {
            this.style.cursor = 'pointer';
        });
    });
});