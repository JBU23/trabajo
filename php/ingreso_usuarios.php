<?php
    $correo = $_REQUEST["txtIngresoCorreo"];
    $contrasena = $_REQUEST["txtIngresoContrasena"];

    if ($correo == ""){
        echo "El correo es obligatorio";
        echo "<button onclick='history.back()'>Regresar</button>";
        die();
    }
    if ($contrasena == ""){
        echo "La contraseña es obligatoria";
        echo "<button onclick='history.back()'>Regresar</button>";
        die();
    }

    include("conexion.php");
$conexion = mysqli_connect(SERVIDOR, USUARIO, CONTRASENA, BD, PUERTO);

if (mysqli_connect_errno()){
    echo "Ocurrio un error " . mysqli_connect_error();
    die("<button onclick='history.back()'>Regresar</button>");
}

$sql = "Select * From tbl_usuario Where usu_correo = '$correo'";


if ($resultado = mysqli_query($conexion, $sql)){
    if($registro = mysqli_fetch_assoc($resultado)){
        if (password_verify($contrasena, $registro["usu_contrasena"])){
            header("Location: ../principal.php?nombre=" . $registro["usu_nombre"] . "&correo=" . $registro["usu_correo"]);
        }
        else{
            echo "La contraseña es incorrecta";
            echo "<button onclick='history.back()'>Regresar</button>";
            die();
        }
    }
}
else{
    echo "Ocurrio un error al consultar";
    echo "<button onclick='history.back()'>Regresar</button>";
    die();
}
    
?>