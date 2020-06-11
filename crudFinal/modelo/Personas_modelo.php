<?php
    class Personas_modelo{
        private $db;
        private $personas;
        public function __construct(){
            require_once("modelo/Conectar.php");
            $this->db=Conectar::conexion();
            $this->personas = array();
        }
        public function get_personas(){
            require_once("modelo/Paginacion.php");
            $consulta = $this->db->query("SELECT * FROM datos LIMIT $empezar_desde, $tamano_pagina");// 
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){//Guarda en file la conslta por medio de un recorrido con 'fetch'
                $this->personas[]=$filas;
            }
            return $this->personas;
        }
    }
?>