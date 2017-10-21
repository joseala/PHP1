<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "<h2>Patidos con mas goles en casa</h2>";
        echo "<table border='1'>";
        echo "<tr>";
            echo "<td>Equipo local</td>";
            echo "<td>Goles local</td>";
            echo "<td>Equipo visitante</td>";
            echo "<td>Goles visitante</td>";
        echo "</tr>";
        foreach ($partidos as $key => $valor) {
            if($valor['gl'] == $max_goles){
                echo "<tr>";
                    echo "<td>".$partidos[$key]['local']."</td>";
                    echo "<td>".$partidos[$key]['gl']."</td>";
                    echo "<td>".$partidos[$key]['visitante']."</td>";
                    echo "<td>".$partidos[$key]['gv']."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        echo "<form action='index.php' method='POST'>";
        echo "<input type='submit' value='Volver' name='volver'>";
        echo "</form>";
        ?>
    </body>
</html>
