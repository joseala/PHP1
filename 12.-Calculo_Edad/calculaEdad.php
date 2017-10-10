<?php
/*
function comprobarAño($anio){
    $anioBisiesto = false;
    if($anio%4==0 || $anio%400==0 && !$anio%100==0){//Un año es bisiesto si es divisible entre 4, excepto aquellos divisibles entre 100 pero no entre 400.
        $anioBisiesto = true;
    }
    return anioBisiesto;
}
function validarFecha($dia,$mes,$anio){
    switch ($mes){
        case 01:
        case 03:
        case 05:
        case 07:
        case 08:
        case 10:
        case 12:
            if($dia <=31 && $dia >=1){
                $valida = true; 
            }else{
                $valida = false; 
            }       
            break;
        case 04:
        case 06:
        case 09:
        case 11:
            if($dia <=30 && $dia >=1){
               $valida = true;  
            }else{
                $valida = false; 
            } 
            break;
        case 02:
            if($dia <=29 && $dia >=1){
                if($dia==29){
                    if(combrobarAnio($anio)){//Un año es bisiesto si es divisible entre 4, excepto aquellos divisibles entre 100 pero no entre 400.
                       $valida = true; 
                    }else{
                       $valida = false; 
                    }                   
                }else{
                    if(combrobarAnio($anio)){//Un año es bisiesto si es divisible entre 4, excepto aquellos divisibles entre 100 pero no entre 400.
                       $valida = false; 
                    }else{
                       $valida = true; 
                    }                                  
                } 
            }else{
                $valida = false; 
            } 

            break;
        default:
            $valida = false;
            break;                            
    }
    return $valida;
}*/
function CalculaEdad($fecha) {
    list($d,$m,$Y) = explode("/",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}
if(!isset($_POST['enviar'])){
    header('Location: http://localhost:8000');
}
$fecha=$_POST['fecha'];
echo "<p>Tu edad es  de </p>";echo CalculaEdad($fecha);echo"<p> años</p>";
/*
$arrayFechaNacimiento = explode("/", $fecha);
$dia = $arrayFechaNacimiento[0];
$mes = $arrayFechaNacimiento[1];
$anio = $arrayFechaNacimiento[2];
$fechaActual = date('d/m/Y');
$arrayFechaActual = explode("/",$fechaActual);
$validada = validarFecha($dia,$mes,$anio);
if($validada){
    if ($arrayFechaActual[0]>=$dia){
        $dias = $arrayFechaActual[0]-$dia;
    }else{
        $dias = $dia-$arrayFechaActual[0];   
    }
    if($arrayFechaActual[1]>=$mes){
        $meses = $arrayFechaActual[1]-$mes;
    }else{
        $meses = $arrayFechaActual[1];
        
        $anio+=1;
    }
    $anios = $arrayFechaActual[2]-$anio;
    echo "<p>La edad es de $anios años,$meses meses y $dias dias. </p>";
}else{
    echo "<p>La fecha no es correcta. </p>";
}*/

?>

