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
        echo "<form action='index.php' method='post'>";
        echo "<table border='1'>" ;      
        for($x=0;$x<3;$x++){
            echo "<tr>";
            for($y=0;$y<3;$y++){             
                echo "<td>";
                echo "<input type='text' name='tableroLimpio[$x][$y]'>";
                echo "<input type='hidden' name='tableroJuego[$x][$y]'>";
                echo "<td>";             
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
        echo "<input type='submit' value='Jugar' name='jugar'>";
        echo "</form>";
        ?>
    </body>
</html>
