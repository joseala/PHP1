<?php
function validaFecha($dia, $mes ,$anio){
    $valida = true;

    switch ($mes){ 
        case 01:
        case 03:
        case 05:
        case 07:
        case 08:
        case 10:
        case 12:
            if($dia >31 || $dia <1){
                $valida = false; 
            }       
            break;
        case 04:
        case 06:
        case 09:
        case 11:
            if($dia >30 || $dia <1){
               $valida = false;  
            } 
            break;
        case 02:
            if($anio%4==0 || $anio%400==0 && !$anio%100==0){
                if($dia > 29 || $dia < 1){
                    $valida = false;    
                }           
            }else{
                if($dia > 28 || $dia < 1){
                    $valida = false;    
                }
            } 
            break;
        default:
            $valida = false;
            break;                            
    }
    return $valida;
}
function CalculaEdad($d,$m,$Y) {    
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}

if(!isset($_POST['enviar'])){
    header('Location: http://localhost:8000');
}

$fecha=$_POST['fecha'];
list($d,$m,$Y) = explode("/",$fecha);

if(validaFecha($d, $m, $Y)){
    echo "<p>Tu edad es  de </p>";echo CalculaEdad($d,$m,$Y);echo"<p> años</p>";
}else{
    echo "<p>La fecha no es valida</p>";
}
?>

