<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    <?php
        require("modelo/Paginacion.php");
        require("modelo/insertar.php");
    ?>
    
    <form action="modelo/Insertar.php" method="post" enctype="multipart/form-data">
        <table >
            <tr>
            <!--Columnas principales-->
                <td class="primera_fila">Id</td>
                <td class="primera_fila">Identificacion</td>
                <td class="primera_fila">Nombre</td>
                <td class="primera_fila">Apellido</td>
                <td class="primera_fila">Direccion</td>
                <td class="primera_fila">Edad</td>
                <td class="primera_fila">Foto</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
            </tr>
                
                <?php
                    foreach($matrizPersonas as $persona):
                ?>
            
            <!--Columnas de registros-->
            <tr>    
                <td class='subtitulo'> <?php echo $persona["id_persona"]?></td>
                <td class='subtitulo'> <?php echo $persona["Identificacion"]?></td>
                <td class='subtitulo'> <?php echo $persona["Nombre"]?></td>
                <td class='subtitulo'> <?php echo $persona["Apellido"]?></td>
                <td class='subtitulo'> <?php echo $persona["Direccion"]?></td>
                <td class='subtitulo'> <?php echo $persona["FechaNac"]?></td>
                
                <td></td>

            
            <!--Botones Borrar y Editar-->
                <td class="subtitulo"> <a href="modelo/Borrar.php?Id=<?php echo $persona["id_persona"]   ?>"> <input type="button" name="del" id="del" value="Borrar">   </a> </td>               
                <td class="subtitulo"> <a href="modelo/Editar.php?Id=<?php echo $persona["id_persona"]   ?>   & ide=<?php echo $persona["Identificacion"] ?>
                                                                                                        & nom=<?php echo $persona["Nombre"] ?> 
                                                                                                        & ape=<?php echo $persona["Apellido"] ?> 
                                                                                                        & dir=<?php echo $persona["Direccion"] ?>
                                                                                                        & fec=<?php echo $persona["FechaNac"] ?>"> 
                                                                                                        <input type="button" name="up" id="up" value="Editar">  </a> </td>
            </tr>
            
          
            <?php
                endforeach; 
            ?>
            
            <!--Casillas para insertar-->
            <tr>
            <td></td>
            |   <td class="subtitulo"> <input type="number" name="Ide" size="10" class="centrado" required></td>
                <td class="subtitulo"> <input type="text" name="Nom" size="10" class="centrado" required></td>
                <td class="subtitulo"> <input type="text" name="Ape" size="10" class="centrado" required></td>
                <td class="subtitulo"> <input type="email" name="Dir" size="10" class="centrado" required></td>
                <td class="subtitulo"> <input type="date" name="Fec" size="10" class="centrado" required></td>
                <td class="subtitulo"> <input type="file" name="Fot" size="10" class="centrado" required></td>
                <td class="subtitulo"> <input type='submit' name='cr' id='cr' value='Insertar' required></td>
            </tr>
            
            <!--Paginacion-->
            <?php 
                for ($i=1; $i<=$total_pagina; $i++) {
                    echo "<a href='?pagina=" . $i . "'>" . $i . "</a>";
                }
            ?>

        </table>
    </form>
               
    <div>
                <p><h2>Imagenes</h2></p>
                    
                <?php echo "<img src='data:image/jpg; base64,".base64_encode($persona["Foto"])."'>"; ?>       
                </div>

</body>
</html>