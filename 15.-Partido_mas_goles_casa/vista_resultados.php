<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "<form action='index.php' method='POST'>";
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>Equipo local</td>";
            echo "<td>Goles local</td>";
            echo "<td>Equipo visitante</td>";
            echo "<td>Goles visitante</td>";
            echo "</tr>";
            foreach ($partidos as $key => $valor) {
                $gl=rand(0,5);
                $gv=rand(0,4);
                echo "<tr>";
                    echo "<td><input type='text' readonly value='$valor[local]' name='partidos[$key][local]'></td>";
                    echo "<td><input type='text'  value='$gl' name='partidos[$key][gl]'></td>";
                    echo "<td><input type='text' readonly value='$valor[visitante]' name='partidos[$key][visitante]'></td>";
                    echo "<td><input type='text'  value='$gv' name='partidos[$key][gv]'></td>";
                echo "</tr>";         
            }      
            echo "</table>";
            echo "<br>";
            echo "<input type='submit' value='Buscar' name='buscar'>";
            echo "</form>";
        ?>
    </body>
</html>
