<?php
$descripcionga = $_REQUEST["txtDescripcionGa"];
$cantidadga = $_REQUEST["txtCantidadGa"];
$clasificacion = $_REQUEST["cmbClasificacion"];

if ($descripcionga == "") {
    echo "La descripción es obligatoria";
    die("<button onclick='history.back()'>Regresar</button>");
}

include("conexion.php");

$conexion = mysqli_connect(SERVIDOR, USUARIO, CONTRASENA, BD, PUERTO);

if (mysqli_connect_errno()) {
    echo "Ocurrió un error: " . mysqli_connect_error();
    die("<button onclick='history.back()'>Regresar</button>");
}

$sql = "INSERT INTO tbl_gasto (gas_descripcion, gas_clasificacion, gas_cantidad, gas_fecha)
        VALUES ('$descripcionga', '$clasificacion', $cantidadga, NOW())";

$resultado = mysqli_query($conexion, $sql);

if ($resultado == false) {
    echo "<span style='color: red; size: 14px'>No se puede ejecutar: </span>" . mysqli_error($conexion);
} else {
    echo "<span style='color: green; size: 14px'>Gasto registrado exitosamente</span>";
}

mysqli_close($conexion);

echo "<button onclick='history.back()'>Regresar</button>";
?>