<?php
$correo = $_REQUEST["txtRegistroCorreo"];
$nombre = $_REQUEST["txtRegistroNombre"];
$contrasena = $_REQUEST["txtRegistroContrasena"];
$confirmacion = $_REQUEST["txtRegistroConfirmacion"];

if ($correo == ""){
    echo "El correo es obligatorio";
    echo "<button onclick='history.back()'>Regresar</button>";
    die();
}
if ($nombre == ""){
    echo "El nombre es obligatorio";
    echo "<button onclick='history.back()'>Regresar</button>";
    die();
}
if ($contrasena == ""){
    echo "La contraseña es obligatoria";
    echo "<button onclick='history.back()'>Regresar</button>";
    die();
}
if ($confirmacion == ""){
    echo "Confirmar Contraseña es obligatoria";
    echo "<button onclick='history.back()'>Regresar</button>";
    die();
}
if ($contrasena !== $confirmacion){
    echo "La contraseña no coincide";
    echo "<button onclick='history.back()'>Regresar</button>";
    die();
}

include("conexion.php");
$conexion = mysqli_connect(SERVIDOR, USUARIO, CONTRASENA, BD, PUERTO);

if (mysqli_connect_errno()){
    echo "Ocurrio un error " . mysqli_connect_error();
    die("<button onclick='history.back()'>Regresar</button>");
}

$cifrado = password_hash($contrasena, PASSWORD_DEFAULT);

$sql = "INSERT INTO tbl_usuario(usu_correo, usu_nombre, usu_contrasena)VALUES('$correo', '$nombre', '$cifrado')";

$resultado = mysqli_query($conexion, $sql);

if ($resultado == false){
    echo "<span style='color: red; size: 14px'>Ocurri un error inesperado</span>";
    mysqli_close($conexion);
}
else {
echo "<span style='color: green; size: 14px'>Usuario registrado existosamente</span>";
mysqli_close($conexion);
}
echo "<button onclick='history.back()'>Regresar</button>";
?>