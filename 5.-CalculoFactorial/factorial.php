<?php
if(!isset($_POST['calcular'])){
    header('Location: http://localhost:8000');
}
$numero = $_POST['numero'];
$factor = $numero;
?>

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
        $res=$numero;
        for($multi=$numero-1;$multi>0;$multi--){
            $res = $res*$multi;            
            if($multi == 1){
                echo $multi." = ";                  
            }else{
                if($multi+1==$numero){
                    echo $numero." X ".$multi." X ";
                }else{
                    echo $multi;
                    echo " X ";
                }               
            }
        }
        echo $res;
        ?>
    </body>
</html>
