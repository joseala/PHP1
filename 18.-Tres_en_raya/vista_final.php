<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if($resultado ==1){
            echo "Has Ganado";
        }else{
            echo "Has Perdido";
        }
        echo "<form action='index.php' method='post'>";
        echo "<table border='1'>" ;      
        foreach ($tableroJuego as $x => $fila) {   
            echo "<tr>";
            foreach ($fila as $y => $valor) {             
                echo "<td>";           
                echo "<input type='text' value='$valor' readonly name='tableroJuego[$x][$y]'>";               
                echo "<td>";             
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
        echo "<input type='submit' value='Volver a jugar ' name='volver'>";
        echo "</form>";
        ?>
    </body>
</html>
