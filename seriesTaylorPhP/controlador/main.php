<?php
include("../modelo/php/SeriesTaylor.php");
//include($_SERVER['DOCUMENT_ROOT']."/config.php");

$valor = new  SeriesTaylor();
$valor->setFin($_POST['fin']);
$valor->setRadianes($_POST['radianes']);
$fin = $valor->getFin();
$radianes = $valor->getRadianes();
$factorial = $valor->factorial(5);
echo "<h1>El seno es:   </h1>"."<h2>".$valor->senoTaylor($fin,$radianes)."</h2>"."<br/><br/>";
echo "Usando la funcion <strong>sin(deg2rad($radianes)</strong> de PhP ".sin(deg2rad($radianes))."<br/>";
echo "Usando la funcion <strong>sin($radianes)</strong> de PhP ".sin($radianes)."<br/>";
echo "<h1>El coseno es: </h1>"."<h2>".$valor->cosenoTaylor($fin,$radianes)."</h2>"."<br/><br/>";
echo "Usando la funcion <strong>cos(deg2rad($radianes)</strong> de PhP ".cos(deg2rad($radianes))."<br/>";
echo "Usando la funcion <strong>cos($radianes)</strong> de PhP ".cos($radianes)."<br/>";
?>