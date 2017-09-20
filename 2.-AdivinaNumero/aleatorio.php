<?php
if (!isset($_POST['generar'])) {/*Forzamos a acceder primero al formulario*/
    header('Location: http://localhost:8000');
}
$numeros = $_POST['numeros'];//Recibimos el array 
$limiteSuperior=$numeros[0];
$limiteInferior=$numeros[1];
$numeroRango=$numeros[2];
$numeroAleatorio=rand($limiteInferior,$limiteSuperior);//Generamos numero aleatorio con la funcion rand()
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Numero Aleatorio</title>
    </head>
    <body>
        <?php
        if($numeroAleatorio==$numeroRango){ // Comparamos los numeros,si son iguales entra por aqui
        ?>      
            <h1>Has acertado</h1>
            <h1>Tu numero es : <?php echo $numeroRango ?> </h1>
            <h1>El numero aleatorio es : <?php echo $numeroAleatorio ?> </h1>
        <?php } 
        else{ // Si no son iguale entra por aqui
        ?>
            <h1>No has acertado</h1>
            <h1>Tu numero es : <?php echo $numeroRango ?> </h1>
            <h1>El numero aleatorio es : <?php echo $numeroAleatorio ?> </h1>
            <?php
            if($numeroAleatorio>$numeroRango){// Comprobamos cual es mayor ?> 
                <h1> El numero aleatorio es mayor </h1>
                <br>
            <?php }
            else{ ?>
                <h1> El numero aleatorio es menor </h1>
                <br>
            <?php }?>                
        <?php } ?>        
        <form name="Formulario" action="index.php" method="POST"><!--Para repetir formulario-->   
            <input type="submit" value="Volver a intentarlo" name="volver">  
        </form>
    </body>
</html>
