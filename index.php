<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Gastos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<h2>Ingreso de Usuarios</h2>
<div id="divIngresoUsuarios">
    <form action="php/ingreso_usuarios.php" method="post">
    Correo
    <input type="email" id="txtIngresoCorreo" name="txtIngresoCorreo">
    <br>
    Contraseña
    <input type="password" id="txtIngresoContrasena" name="txtIngresoContrasena">
    <br>
    <button id="btnIngresoUsuario" type="submit">Ingresar</button>
    </form>
</div>

<h2>Registro Usuarios</h2>
<div id="divregistroUsuario">
    <form action="php/registro_usuarios.php" method="post">
    Correo
    <input type="email" id="txtRegistroCorreo" name="txtRegistroCorreo">
    <br>
    Nombre
    <input type="text" id="txtRegistroNombre" name="txtRegistroNombre">
    <br>
    Contraseña
    <input type="password" id="txtRegistroContrasena" name="txtRegistroContrasena">
    <br>
    Confirmacion
    <input type="password" id="txtRegistroConfirmacion" name="txtRegistroConfirmacion">
    <br>
    <button id="btnRegistroUsuario" type="submit">Registrar</button>
    </form>
</div>
<div id="divPrincipal" style="display: none;">
    
</div> <!--Cierra divPrincipal-->
    <script src="js/index.js"></script>
</body>
</html>