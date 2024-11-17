<?php
include("conexion.php");

$conexion = mysqli_connect(SERVIDOR, USUARIO, CONTRASENA, BD, PUERTO);

if (mysqli_connect_errno()) {
    echo "Ocurrió un error " . mysqli_connect_error();
    die("<button onclick='history.back()'>Regresar</button>");
}

$sql_ingreso = "DELETE FROM tbl_ingreso";
$resultado_ingreso = mysqli_query($conexion, $sql_ingreso);

$sql_gasto = "DELETE FROM tbl_gasto";
$resultado_gasto = mysqli_query($conexion, $sql_gasto);

if ($resultado_ingreso === false || $resultado_gasto === false) {
    echo "<span style='color: red; font-size: 14px'>No se puede ejecutar</span>";
} else {
    echo "<span style='color: green; font-size: 14px'>Depuración realizada</span>";
}

echo "<button onclick='history.back()'>Regresar</button>";
mysqli_close($conexion);
?>