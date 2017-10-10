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
        if(!filter_input(INPUT_POST, 'aniadir')){
            echo "<form action='index.php' method='post'>";
            echo "<label>Introduce ciudades</label>";
            echo "<input type='text' name='ciudades'>";
            echo "<input type='submit' value='añadir' name='aniadir'>";
            echo "</form>";     
        }else{       
            $ciudades = $_POST['ciudades'];
            $array_ciudades = explode(",", $ciudades);
            $array_meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
            echo "<form action='temperaturas.php' method='post'>";
            foreach ($array_ciudades as $ciudad) { 
                echo "<table border='1'>";
                echo "<tr>";
                echo "<td>".$ciudad."</td>";
                echo "<td>TempMAX</td>";
                echo "<td>TempMIN</td>";
                echo "</tr>";              
                foreach ($array_meses as $mes) {
                    $t_max = rand(10, 25);
                    $t_min = rand(-5, 9);
                    echo "<tr>";
                    echo "<td>".$mes."</td>";
                    echo "<td><input type='text' readonly value='$t_max' name='temperaturas[$ciudad][$mes][tmax]' ></td>";
                    echo "<td><input type='text' readonly value='$t_min' name='temperaturas[$ciudad][$mes][tmin]' ></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            echo "<input type='submit' value='Calcular' name='calcular'>";
            echo "</form>";
        }
        ?>
    </body>
</html>
