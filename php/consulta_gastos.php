<?php
    require_once("conexion.php");

    $conexion = mysqli_connect(SERVIDOR, USUARIO, CONTRASENA, BD, PUERTO);

    if(mysqli_connect_errno()){
        echo "Ocurrio un error" . mysqli_connect_error();
        die();
    }

    $sql = "SELECT * FROM tbl_gasto";

    if ($resultado = mysqli_query($conexion, $sql)){
        $total = 0;
        echo "<table style='width: 100%; border: solid;'>";
        echo "<tr style='color: yellow; background-color: blue;'>";
        echo "<td>Id</td>";
        echo "<td>Descripcion</td>";
        echo "<td>Clasificacion</td>";
        echo "<td>Cantidad</td>";
        echo "<td>Fecha</td>";
        echo "<tr>";
        while ($registro = mysqli_fetch_assoc($resultado)){
            echo "<tr>";
            echo "<td style='width: 10%;'>" . $registro["gas_id"] . "</td>";
            echo "<td style='width: 40%;'>" . $registro["gas_descripcion"] . "</td>";
            echo "<td style='width: 15%;'>" . $registro["gas_clasificacion"] . "</td>";
            echo "<td style='width: 25%; text-align: right;'>" . number_format($registro["gas_cantidad"],2) . "</td>";
            echo "<td style='width: 25%;'>" . $registro["gas_fecha"] . "</td>";
            echo "</tr>";
            $total += $registro["gas_cantidad"];
        }
        echo "<tr>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td class='total_listado'>Total</td>";
        echo "<td class='total_listado' style='width: 25%; text-align: right;'>". number_format($total,2) ."</td>";
        echo "<td></td>";
        echo "</tr>";
        echo "</table>";
    }
    else {
        echo "<span style='color: red; size: 14px;'>No se puede ejecutar</span>";
    }
    mysqli_close($conexion);
?>