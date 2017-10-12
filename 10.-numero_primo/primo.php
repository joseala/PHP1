<?php

if(!filter_input(INPUT_POST, 'confirmar')){
    header('Location: http://localhost:8000');
}

$numero=$_POST['numero'];
function is_primo($numero){ 
    $primo = true;
    $divisor = round($numero/2, 0, PHP_ROUND_HALF_UP);//Divido entre dos y redondeo hacia arriba.
    while($primo && $divisor>1){
        if(!($numero%$divisor)){//Si algun divisisor al dividir da cero en el resto.
           $primo=false; //El numero no es primo.
        }
        $divisor--;
    }
    return $primo;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comprobar Numero</title>
    </head>
    <body>
        <?php 
         if(is_primo($numero)){
            echo"<p>El numero $numero si es primo</p>";
         }else{
             echo"El numero $numero no es primo</p>";
         }
             
        ?>
        <form name = "FormularioNumeroPrimo" action="index.php" method="POST">
            <input type="submit" value="Volver" name="volver"/>
        </form>
    </body>
</html>

