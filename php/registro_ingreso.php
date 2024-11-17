<?php
    $descripcionin = $_REQUEST["txtDescripcionIn"];
    $cantidadin = $_REQUEST["txtCantidadIn"];

    if ($descripcionin == ""){
        echo "La descripcion es obligatoria";
        die("<button onclick='history.back()'>Regresar</button>");
    }
    if ($cantidadin == ""){
        echo "La cantidad es obligatoria";
        die("<button onclick='history.back()'>Regresar</button>");
    }
    include("conexion.php");

    $conexion = mysqli_connect(SERVIDOR, USUARIO, CONTRASENA, BD, PUERTO);

    if (mysqli_connect_errno()){
        echo "Ocurrio un error " . mysqli_connect_error();
        die("<button onclick='history.back()'>Regresar</button>");
    }

    $sql = "INSERT INTO tbl_ingreso(ing_descripcion, ing_cantidad, ing_fecha)
            VALUES('$descripcionin', $cantidadin, NOW())";
    
   $resultado = mysqli_query($conexion, $sql);

   if ($resultado == false){
        echo "<span style='color: red; size: 14px'>No se puede ejecutar</span>";
        mysqli_close($conexion);
   }
   else {
    echo "<span style='color: green; size: 14px'>Ingreso registrado existosamente</span>";
    mysqli_close($conexion);
   }

   echo "<button onclick='history.back()'>Regresar</button>";

?>