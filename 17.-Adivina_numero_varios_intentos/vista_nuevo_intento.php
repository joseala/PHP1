<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "Has fallado";
        echo "<br>";
        echo "Tu numero es ";
        if($resultado == 2){
            echo "mayor"; 
        }else{
            echo "menor";
        }
        echo " que el numero secreto.";
        echo "<br>";
        echo "Prueba otra vez";
        echo "<br>";
        echo "<form action='index.php' method='post'>";
        echo "<input type='number' name='numero'>";
        echo "<input type='hidden' value='$aleatorio' name='aleatorio'>";
        echo "<input type='submit' name='nIntento' value='Nuevo Intento'>";
        echo "</form>";
        ?>
    </body>
</html>
