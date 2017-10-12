<?php
if(!filter_input(INPUT_POST, 'confirmar')){
    header('Location: http://localhost:8000');
}

$anio = $_POST['anio'];
$anioBisiesto;
$diferencia;
$contador=1;
/*
if($anio%4==0 || $anio%400==0 && !$anio%100==0){//Un año es bisiesto si es divisible entre 4, excepto aquellos divisibles entre 100 pero no entre 400.
    $anioBisiesto = true;
}
 * 
 */

if(date('L', $fechaFormato = strtotime($anio))){//Dar formato de fecha para funcion date().Devuelve TRUE si el año es bisiesto.
    $anioBisiesto = true;
}
else{
    $anioBisiesto = false;
    for($x=0; $x<4; $x++){   
        if(date('L', strtotime($anio+$contador))){            
            $diferencia=$contador;
        }
        $contador+=1;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comprueba años bisiesto</title>
    </head>
    <body>
        <?php 
         if($anioBisiesto){
            echo"<p>El año $anio es bisiesto</p>";
         }else{
            echo"<p>El año $anio no es bisiesto</p>";
            echo"<p>Faltan $diferencia años hasta el siguiente año bisiesto</p>";
         }
             
        ?>
        <form name = "FormularioAnio" action="index.php" method="POST">
            <input type="submit" value="Volver" name="volver"/>
        </form>
    </body>
</html>


