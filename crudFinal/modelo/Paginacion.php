<?php
    require_once("Conectar.php");
    $base = Conectar::conexion();
    $tamano_pagina = 50;

    if(isset($_GET['pagina'])){
        if($_GET['pagina']== 1){
            header("Location:index.php");
        }else{
            $pagina = $_GET['pagina'];
        }
    }else{
        $pagina = 1;
    }
    $empezar_desde = ($pagina - 1) * $tamano_pagina;
    $sql_total = "SELECT * FROM datos";
    $resultado = $base->prepare($sql_total);
    $resultado->execute(array());
    $num_filas = $resultado->rowCount();//Obtiene el numero de registros de la consulta
    $total_pagina = ceil($num_filas / $tamano_pagina);//Redondea hacia el valor mas alto positivo. ceil(-3.19) = -3
?>