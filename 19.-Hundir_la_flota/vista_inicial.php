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
        echo "<table border='1'cellpadding='1'>" ;      
        for($x=0;$x<10;$x++){
            echo "<tr>";
            for($y=0;$y<10;$y++){             
                echo "<td width='30' height='30'>";
                if(isset($tableroBarcos[$x][$y])){
                    echo "<input type='hidden' value='".$tableroBarcos[$x][$y]."' name='barcos[$x][$y]'>";
                }
                echo "<input size=1 type='text' name='tableroDisparo[$x][$y]'>"; 
                echo "<input type='hidden' value='' name='tableroJuego[$x][$y]'>";
                echo "</td>";             
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
