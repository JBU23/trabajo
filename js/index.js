function mostrar_opcion(opcion) {
    document.getElementById("divIngresos").style.display = "none";
    document.getElementById("divGastos").style.display = "none";
    document.getElementById("divlistaIngresos").style.display = "none";
    document.getElementById("divlistaGastos").style.display = "none";
    document.getElementById("divCambioContrasena").style.display = "none";

    document.getElementById(opcion).style.display = "block";
}

function depuracion() {
    if (confirm("¿Estas seguro de borrar toda la informacion?")) {
        window.location.href = "php/depuracion.php";
    }
}