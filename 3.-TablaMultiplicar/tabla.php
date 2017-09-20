<?php
    if (!isset($_POST['multiplica'])) {/*Forzamos a acceder primero al formulario*/
        header('Location: http://localhost:8000');
    }
    $numero = $_POST['numero'];
    function comprobarNumero($numero){
        return (is_numeric($numero)) && ($numero<=9 && $numero>0);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php if(!comprobarNumero($numero)){?>
            <h1>Introduce un valor numerico entre 1 y 9</h1>
            <form name="Formulario" action="index.php" method="POST">  
                <input type="submit" value="Volver" name="volver">  
            </form>
    <?php } else {?>
            <h1>Tabla del <?php echo $numero?></h1>
            <table border="1">
          <?php for($multiplicador=1;$multiplicador<=9;$multiplicador++){
                echo "<tr>";
                    echo "<td> $numero </td>"; 
                    echo "<td> X </td>";
                    echo "<td>$multiplicador </td>";
                    echo "<td> = </td>";
                    $resultado=$numero*$multiplicador;           
                    echo "<td>$resultado</td>";
                echo "</tr>";
           } ?>
            </table>
            <form name="Formulario" action="index.php" method="POST">  
                <input type="submit" value="Volver" name="volver">  
            </form>
    <?php } ?>
        
    </body>
</html>
