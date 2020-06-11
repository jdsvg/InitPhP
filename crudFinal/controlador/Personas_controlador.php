<?php
     require_once("modelo/Personas_modelo.php");
     $persona = new Personas_modelo();
     $matrizPersonas = $persona->get_personas();
     require_once("vista/Personas_view.php")
?>