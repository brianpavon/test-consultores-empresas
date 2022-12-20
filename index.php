<?php

class Helper{

    public $arrayUni = [];

    //PUNTO 1
    public function Multiplicar($num,$multiplicador){
        $resultado = 0;
        for ($i=0; $i < $multiplicador; $i++) { 
            //echo $resultado.PHP_EOL;
           $resultado += $num;
        }
        return $resultado;
    }

    //PUNTO 2
    public function MayorEnArray($array){
        $mayor = 0;
        
        for ($i=0; $i < count($array); $i++) { 
            
            if($mayor < $array[$i]){
                $mayor = $array[$i];                
            }
        }

        return $mayor;
    }

    //PUNTO 3
    public function EliminarVacios($array){
        
        $nuevoArray = [];
        for ($i=0; $i < count($array); $i++) {

            if($array[$i]){
                array_push($nuevoArray,$array[$i]);
            }
        }
        
        return $nuevoArray;
    }

    //PUNTO 4
    public function UnaDimension($array){
        
        for ($i=0; $i < count($array); $i++) { 
            
            if(gettype($array[$i]) != "array"){
                array_push($this->arrayUni,$array[$i]);
            }
            else{
                $this->UnaDimension($array[$i]);
            }
        }
        
        return $this->arrayUni;
    }

    //PUNTO 5
    public function PalabraMasRepetida($oracion){
        $palabraRepetida = [];
        $mayor = 0;
        
        $oracion = $this->QuitarCaracteresEspeciales($oracion);
        
        
        $objOracionAux = explode(" ",$oracion);
        $arrayOracion = [];
        
      
        foreach ($objOracionAux as $palabra) {
            $arrayOracion[$palabra] = 0;
        }

        foreach ($arrayOracion as $key => $value) {
            $contador = 0;
            foreach ($objOracionAux as $palabra) {
                if($key == $palabra){                    
                    $contador++;
                }
            }
            if($mayor < $contador){
                $mayor = $contador;
                $palabraRepetida = [];
                $palabraRepetida[$key] = $mayor;
            }
        }
        return $palabraRepetida;
    }

    public function QuitarCaracteresEspeciales($string) {        

        return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string);
    }


    //PUNTO 6
    public function EsPalindromo($string){
        $retorno = "No es Palindromo";
        
        if (strrev(strtoupper($string)) == strtoupper($string)){
            $retorno = "Es Palindromo";
        }
        return $retorno;
    } 

    //PUNTO 7
    public function NumeroMayor($num1,$num2,$num3,...$num4){
        return max($num1,$num2,$num3,...$num4);
    }


}

$helper = new Helper;
//PUNTO 1
$resultMult = $helper->Multiplicar(4,3);
//var_dump("Multiplicacion: ".$resultMult);

//PUNTO 2
$arrayNumeros = [1,30,45,10,2];
$mayorArray = $helper->MayorEnArray($arrayNumeros);
//var_dump("El mayor es: ".$mayorArray);

//PUNTO 3
$arrayNulos = [1,null,"null","test",0,12,false,"false"];
$arraySinNulos = $helper->EliminarVacios($arrayNulos);
//var_dump($arraySinNulos);

//PUNTO 4
$arrayMultidimensional = [1, [2, [3, 4]], "hola", [1, "buenos dias"]];
$arrayUnaDimension = $helper->UnaDimension($arrayMultidimensional);
//var_dump($arrayUnaDimension);

//PUNTO 5
$oracion = "Este es un string, el cual es un string donde se repite muchas veces la palabra es";
$palabraRepetida = $helper->PalabraMasRepetida($oracion);
//var_dump($palabraRepetida);

//PUNTO 6
//var_dump($helper->EsPalindromo("mama"));
//var_dump($helper->EsPalindromo("neuquen"));

//PUNTO 7
$mayor = $helper->NumeroMayor(3,1,8,9,15,2);
//var_dump($mayor);

?>