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
        <style type="text/css">
            .bg1 { background-color:#BDC3C7;}
            .bg2 { background-color:#FFFFFF;}
        </style>
    </head>
    <body>
        <?php      
        foreach ($numeros as $key => $value) { 
            echo "<table border='1'>";
            for($multi = 1;$multi<=9;$multi++){
                echo "<tr>";
                echo "<td class=bg1>".$value."</td>";
                echo "<td class=bg2> X </td>";
                echo "<td class=bg1>".$multi."</td>";
                echo "<td class=bg2> = </td>";
                echo "<td class=bg1>".$multi*$value."</td>";
                echo "<tr>";
            }
            echo "<table>";
            echo "<br>";
        }        
        ?>
    </body>
</html>
