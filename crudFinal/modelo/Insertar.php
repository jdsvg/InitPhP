<?php
    require_once("Conectar.php");
    $base = Conectar::conexion();
   
    if(isset($_POST['cr'])){
       $identificacion = $_POST['Ide'];
        $nombre    = $_POST['Nom'];
        $apellido   = $_POST['Ape'];
        $direccion  = $_POST['Dir'];
        $fechaNac = $_POST['Fec'];
        //
        $nombre_imagen  = $_FILES['Fot']['name'];
        $tipo_imagen    = $_FILES['Fot']['type'];
        $tamaño_imagen  = $_FILES['Fot']['size'];
        //     
        $caperta_destino = $_SERVER['DOCUMENT_ROOT'].'/crudFinal/imagenes/';
        $foto = new Imagen();
        $contenido = $foto->manipularImagen($caperta_destino,$tamaño_imagen,$tipo_imagen,$nombre_imagen);
         //
        $edad = new Edad();
        $edadNum = $edad->calculaedad($fechaNac);
        //
        $base->query("INSERT INTO datos (Identificacion, Nombre, Apellido, Direccion, FechaNac, Foto) VALUES('$identificacion','$nombre','$apellido','$direccion', '$edadNum','$contenido')");
    }

class Edad{
    function calculaedad($fechanacimiento){
        list($ano,$mes,$dia) = explode("-",$fechanacimiento);//Separa los datos
        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0)
          $ano_diferencia--;
        return $ano_diferencia+1;
      }
}
    
class Imagen{
    function manipularImagen($caperta_destino ,$tamaño_imagen,$tipo_imagen,$nombre_imagen){
        if($tamaño_imagen <= 2000000){
             if($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png"){
                     move_uploaded_file($_FILES['Fot']['tmp_name'], $caperta_destino . $nombre_imagen);
                     echo "<h1>Imagen movida</h1><br>";
                }else{
                    echo "<h1>Formato invalido</h1><br>";
                }
            }else{
                echo "<h1>Tamaño invalido</h1><br>";
            }
        //Manipulando imagen 
         $archivo_objetivo=fopen($caperta_destino.$nombre_imagen,'r');
         $contenido = fread($archivo_objetivo,$tamaño_imagen);
         $contenido = addslashes($contenido);
         fclose($archivo_objetivo);
         return $contenido;
    }
}

    //header("Location: ../index.php");
?>