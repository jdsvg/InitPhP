<?php
    require_once("Conectar.php");
    $base = Conectar::conexion();
    require_once("Insertar.php");
    $edad = new Edad();
    $foto = new Imagen();
    if(isset($_POST['crEdit'])){
        $Id         = $_GET['Id'];
        $identificacion = $_POST['IdeEdit'];
        $nombre    = $_POST['NomEdit'];
        $apellido   = $_POST['ApeEdit'];
        $direccion  = $_POST['DirEdit'];
        $fechaNac = $_POST['FecEdit'];
        //
        $nombre_imagen  = $_FILES['Fot']['name'];
        $tipo_imagen    = $_FILES['Fot']['type'];
        $tamaño_imagen  = $_FILES['Fot']['size'];
        //
        $caperta_destino = $_SERVER['DOCUMENT_ROOT'].'/crudFinal/imagenes/';
        $contenido = $foto->manipularImagen($caperta_destino,$tamaño_imagen,$tipo_imagen,$nombre_imagen);
        //
        $edadNum = $edad->calculaedad($fechaNac);
        //
        $base->query("UPDATE datos SET id_persona='$Id', Identificacion = '$identificacion', Nombre='$nombre', Apellido = '$apellido', Direccion ='$direccion', fechaNac = '$edadNum' WHERE id_persona = '$Id'");
        header("Location: ../index.php");
    }

    

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos</title>
</head>
<body>
    <form method="post">
    <label for="IdeEdit">Identificacion</label>
        <input type="number" name='IdeEdit' size='50' class='centrado'>
        <br>
        <br>
        <br>
        <label for="NomEdit">Nombre</label>
        <input type="text" name='NomEdit' size='50' class='centrado'>    
        <br>
        <br>
        <br>
        <label for="ApeEdit">Apellido</label>
        <input type="text" name='ApeEdit' size='50' class='centrado'>
        <br>
        <br>
        <br>
        <label for="DirEdit">Direccion</label>
        <input type="email" name='DirEdit' size='50' class='centrado'>
        <br>
        <br>
        <br>
        <label for="FecEdit">Fecha</label>
        <input type="date" name='FecEdit' size='50' class='centrado'>
        <br>
        <br>
        <br>
        <label for="Fot">Foto</label>
        <input type="file" name='Fot' size='50' class='centrado'>
        <br>
        <br>
        <br>
        <button class='bot'> <input type="submit" name='crEdit' id='crEdit' value="Editar   "> </button>
    </form>
</body>
</html>