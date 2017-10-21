<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            .bg1 { background-color:#BDC3C7;}
            .bg2 { background-color:#00FF00;}
        </style>
    </head>
    <body>
        <?php
        echo "<form action='index.php' method='post'>";
        echo "<table border='1'>" ;      
        foreach ($tableroJuego as $x => $fila) {   
            echo "<tr>";
            foreach ($fila as $y => $valor) {             
                echo "<td>";
                if($valor != ""){
                    if($valor == "x"){
                        echo "<input class='bg1' type='text' value='$valor' readonly name='tableroJuego[$x][$y]'>";
                    }else{
                    echo "<input class='bg2' type='text' value='$valor' readonly name='tableroJuego[$x][$y]'>";    
                    }
                    echo "<input type='hidden' value='' name='tableroLimpio[$x][$y]'>";
                }else{
                    echo "<input type='hidden' value='$valor' name='tableroJuego[$x][$y]'>";
                    echo "<input type='text' name='tableroLimpio[$x][$y]'>";
                }
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
