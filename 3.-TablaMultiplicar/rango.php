<?php
if(!isset($_POST['tablas'])){
    header('Location: http://localhost:8000');
}
$valores = $_POST['rango'];
$arrayValores = explode(',', $valores);
$numeros = array();
foreach ($arrayValores as $key => $value) {
    if(!is_numeric($value)){
        $val = explode('-', $value);
        $rango = range($val[0],$val[1]); 
        $numeros = array_merge($numeros,$rango);
    }else{
        array_push($numeros, $value);
    }   
}
$numeros = array_unique($numeros);
sort($numeros);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php      
        foreach ($numeros as $key => $value) { 
            echo "<table border='1'>";
            for($multi = 1;$multi<=9;$multi++){
                echo "<tr>";
                echo "<td>".$value."</td>";
                echo "<td> X </td>";
                echo "<td>".$multi."</td>";
                echo "<td> = </td>";
                echo "<td>".$multi*$value."</td>";
                echo "<tr>";
            }
            echo "<table>";
            echo "<br>";
        }        
        ?>
    </body>
</html>
