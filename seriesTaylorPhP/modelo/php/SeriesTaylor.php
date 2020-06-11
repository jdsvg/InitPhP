<?php
class SeriesTaylor{

    private $_fin; 
    private $_radianes;

    function _constructor($fin, $radianes){ 
        $this->$_fin=$fin; 
        $this->$_radianes=$radianes;
    }

    function _destruct($fin, $radianes){
        //unset($this->$ini=$ini); 
        //unset($this->$fin=$fin);
        //unset($this->$radianes=$radianes);
    }


    public function getFin(){
        return $this->_fin;
    }

    public function setFin($fin){
        $this->_fin = $fin;
    }

    public function getRadianes(){
        return $this->_radianes;
    }


    public function setRadianes($radianes){
        $this->_radianes = $radianes;
    }

    


    public function factorial($num){
        $factorial = 1;
        $contador = 1;
        while($contador <= $num){
            $factorial*=$contador;
            $contador++;
        }
        return $factorial;
    }//Fin de factorial

    public function cosenoTaylor($fin, $radianes){
        //Donde se inicializan(?)
        $coseno         = 0.0;
        $numerador;
        $denominador;  
        $signo;
        $grados = ($radianes*3.14159265358979323846264338327950288419)/180;  
        for($i = 0; $i <= $fin; $i++){      
            $numerador      =   pow($grados,(2*$i));
            $denominador    =   self::factorial(2*$i);
            if($i%2==0){
                $signo = 1;
            }else{
                $signo = -1;
            }    
            $coseno         += ($numerador/$denominador)*$signo;
        }
        return $coseno;
    }//Fin cosenoTaylor

    public function senoTaylor($fin, $radianes){
        $seno         = 0.0;
        $numerador;
        $denominador;
        $signo;
        $grados = ($radianes*3.14159265358979323846264338327950288419)/180;
        for($i = 0; $i <= $fin; $i++){      
            $numerador      =   pow($grados,(2*$i+1));
            $denominador    =   self::factorial(2*$i+1);
            if($i%2==0){
                $signo = 1;
            }else{
                $signo = -1;
            }   
            $seno           += ($numerador/$denominador)*$signo;
        }
        return $seno;
    }//Fin senoTaylor
}//seriesTaylor

?>