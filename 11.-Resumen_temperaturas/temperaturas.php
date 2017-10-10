<?php
if(!filter_input(INPUT_POST, "calcular")){
    header('Location: http://localhost:8000');
}
$temperaturas = $_POST['temperaturas'];

foreach ($temperaturas as $ciudad => $value) {
    $t_max = max(array_column($value, 'tmax')) ; 
    $t_min = min(array_column($value, 'tmin')) ;
    $t_media = (($t_max-$t_min)/2)+$t_min;
    $array_resumen_temp[] = ['ciudad' => $ciudad, 'tmax' => $t_max, 'tmed' => $t_media, 'tmin' => $t_min];          
}
$array_tmax = array_column($array_resumen_temp, 'tmax');
$array_tmin = array_column($array_resumen_temp, 'tmin');
$array_tmed = array_column($array_resumen_temp, 'tmed');
array_multisort($array_tmax,SORT_NUMERIC,$array_tmed,SORT_NUMERIC,$array_tmin,SORT_NUMERIC,$array_resumen_temp);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "<table border='1'>";
        echo "<tr>";
            echo "<td>Ciudad</td>";
            echo "<td>TempMAX</td>";
            echo "<td>TempMEDIA</td>";
            echo "<td>TempMIN</td>";
        echo "</tr>";
        foreach ($array_resumen_temp as $key => $value) {
            echo "<tr>";
            echo "<td>".$value['ciudad']."</td>";
            echo "<td>".$value['tmax']."</td>";
            echo "<td>".$value['tmed']."</td>";
            echo "<td>".$value['tmin']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </body>
</html>
