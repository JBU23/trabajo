<?php
    if ($_REQUEST["nombre"] == ""){
        header("Location: index.php");
    }
    $nombre = $_REQUEST["nombre"];
    $correo = $_REQUEST["correo"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de gastos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div id="divBienvenida">Bienvenido(a) <?php echo $nombre; ?></div>
    <h1>Control de Gastos</h1>
    <div id="divConfiguracion">
        <table id="tblConfiguracion" style="width: 100%">
            <tr>
                <td class="opcion-configuracion" onclick="depuracion()">Depuración</td>
                <td class="opcion-configuracion" onclick="mostrar_opcion('divCambioContrasena')">Cambiar contraseña</td>
            </tr>
        </table>
    </div>
    <div id="divMenu">
        <table id="tblMenu" style="width: 100%;">
            <tr>
                <td class="opcion-menu" onclick="mostrar_opcion('divIngresos')">Ingresos</td>
                <td class="opcion-menu" onclick="mostrar_opcion('divGastos')">Gastos</td>
                <td class="opcion-menu" onclick="mostrar_opcion('divlistaIngresos')">Listado Ingresos</td>
                <td class="opcion-menu" onclick="mostrar_opcion('divlistaGastos')">Listado Gastos</td>
            </tr>
        </table>
    </div>
    <div id="divIngresos" style="display: none;">
        <h2>Ingresos</h2>
        <form action="php/registro_ingreso.php" method="post">
            <label for="txtDescripcionIngresos">Descripción</label>
            <input id="txtDescripcionIngresos" name="txtDescripcionIn" type="text" placeholder="Ej. Salario">
            <br>
            <label for="txtCantidadIngreso">Cantidad</label>
            <input type="number" name="txtCantidadIn" placeholder="Ej. 10000" id="txtCantidadIngreso">
            <br>
            <button id="btnAgregarIngreso">Agregar ingreso</button>
        </form>
    </div>

    <div id="divGastos" style="display: none;">
        <h2>Gastos</h2>
        <form action="php/registro_gasto.php" method="post">
            <label for="txtDescripcionGasto">Descripción</label>
            <input id="txtDescripcionGasto" name="txtDescripcionGa" type="text" placeholder="Ej. Renta">
            <br>
         Clasificación
            <select id="cmbClasificacionGasto" name="cmbClasificacion">
                <option value="0">Seleccione clasificación</option>
                <option value="1">Casa</option>
                <option value="2">Comida</option>
                <option value="3">Transporte</option>
                <option value="4">Entretenimiento</option>
                <option value="5">Otros</option>
        </select>
        <br>
        <label for="txtCantidadGasto">Cantidad</label>
        <input id="txtCantidadGasto" name="txtCantidadGa" type="number" placeholder="Ej. 50000">
        <br>
        <button id="btnAgregarGasto">Agregar Gasto</button>
        </form>
    </div>

    <div id="divlistaIngresos" style="display: none;">
        <h2>Listado de ingresos</h2>
            <?php
                 include("php/consulta_ingresos.php");
            ?>
    </div>

    <div id="divlistaGastos" style="display: none;">
        <h2>Listado de Gastos</h2>
        <?php
            include("php/consulta_gastos.php");
        ?>
    </div>

    <div id="divCambioContrasena" style="display: none;">
        <form action="php/cambiar_contrasena.php" method="post">
            Contraseña actual
            <input type="password" id="txtContrasenaActual" name="txtContrasenaActual">
            <br>
            Nueva Contraseña
            <input type="password" id="txtContrasenaNueva" name="txtContrasenaNueva">
            <br>
            Confirmacion nueva contraseña
            <input type="password" id="txtConfirmacionNueva" name="txtConfirmacionNueva">
            <br>
            <input type="hidden" id="txtCorreoCambio" name="txtCorreoCambio" value="<?php echo $correo; ?>">
            <button type="submit">Cambiar</button>
        </form>
    </div>
    <script src="js/index.js"></script>
</body>
</html>