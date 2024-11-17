<?php
    $contrasena_actual = $_REQUEST["txtContrasenaActual"];
    $contrasena_nueva = $_REQUEST["txtContrasenaNueva"];
    $confirmacion_nueva = $_REQUEST["txtConfirmacionNueva"];
    $correo = $_REQUEST["txtCorreoCambio"];

    if ($contrasena_actual == "") {
        echo "La contraseña actual es obligatoria.";
        echo "<button onclick='history.back()'>Regresar</button>";
        die();
    }
    if ($contrasena_nueva == "") {
        echo "La contraseña nueva es obligatoria.";
        echo "<button onclick='history.back()'>Regresar</button>";
        die();
    }
    if ($confirmacion_nueva == "") {
        echo "La confirmación es obligatoria.";
        echo "<button onclick='history.back()'>Regresar</button>";
        die();
    }

    if ($contrasena_nueva !== $confirmacion_nueva) {
        echo "La nueva contraseña y la confirmación no coinciden.";
        echo "<button onclick='history.back()'>Regresar</button>";
        die();
    }

    include("conexion.php");
    $conexion = mysqli_connect(SERVIDOR, USUARIO, CONTRASENA, BD, PUERTO);

    if (mysqli_connect_errno()){
        echo "Ocurrio un error " . mysqli_connect_error();
        die("<button onclick='history.back()'>Regresar</button>");
    }

    $sql = "SELECT * FROM tbl_usuario WHERE usu_correo = '$correo'";
    $resultado = mysqli_query($conexion, $sql);

    if ($registro = mysqli_fetch_assoc($resultado)) {
        $correo_usuario = $registro['usu_correo'];

        if (password_verify($contrasena_actual, $registro["usu_contrasena"])) {
            $nueva_contrasena_hash = password_hash($contrasena_nueva, PASSWORD_DEFAULT);
            $sql_update = "UPDATE tbl_usuario SET usu_contrasena = '$nueva_contrasena_hash' WHERE usu_correo = $correo";
        
            if (mysqli_query($conexion, $sql_update)) {
                echo "Contraseña actualizada exitosamente";
                exit();
            } else {
                echo "Error al actualizar la contraseña. Intente nuevamente.";
                echo "<button onclick='history.back()'>Regresar</button>";
                die();
            }
        } else {
            echo "La contraseña actual es incorrecta.";
            echo "<button onclick='history.back()'>Regresar</button>";
            die();
        }
    } else {
        echo "Usuario no encontrado.";
        echo "<button onclick='history.back()'>Regresar</button>";
    }

?>