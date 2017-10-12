<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "<h2>Clasificacion</h2>";
        echo "<table border='1'>";
        echo "<tr>";
            echo "<td>Posicion</td>";
            echo "<td>Equipo</td>";
            echo "<td>Goles a favor</td>";
            echo "<td>Goles en contra</td>";
            echo "<td>Goles Average</td>";
            echo "<td>Puntos</td>";
        echo "</tr>";
        $posicion = 1;
        foreach ($clasificacion as $key => $equipo) {     
                echo "<tr>";
                    echo "<td>".$posicion."</td>";
                    echo "<td>".$equipo['equipo']."</td>";
                    echo "<td>".$equipo['gFavor']."</td>";
                    echo "<td>".$equipo['gContra']."</td>";
                    echo "<td>".$equipo['gAverage']."</td>";
                    echo "<td>".$equipo['puntos']."</td>";
                echo "</tr>";
                $posicion++;
        }
        echo "</table>";
        echo "<form action='index.php' method='POST'>";
        echo "<input type='submit' value='Volver' name='volver'>";
        echo "</form>";
        ?>
    </body>
</html>

