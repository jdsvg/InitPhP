<?php
    require_once('Conectar.php');
    $base = Conectar::conexion();
    $Id = $_GET['Id'];
    $base->query("DELETE FROM datos WHERE id_persona = '$Id'");
    header("Location: ../index.php");
?>