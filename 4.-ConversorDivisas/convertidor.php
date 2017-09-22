<?php
    if (!isset($_POST['calcula'])) {/*Forzamos a acceder primero al formulario*/
        header('Location: http://localhost:8000');
    }
    
    $cantidad = $_POST['cantidad'];
    $divisas = $_POST['divisa'];
    $divisaOrigen = $divisas['monedaOrigen'];
    $divisaDestino = $divisas['monedaDestino'];
    $euro=1;
    $dolar=1.122;
    $libra=0.865;
    $yuan=7.485;
    
    switch ($divisaOrigen) {
    case "Euro":
        switch ($divisaDestino) {
            case "Dolar":
                $resultado = $cantidad*$dolar;
                    break;
            case "Libra":
                $resultado = $cantidad*$libra;
                    break;
            case "Yuan":
                $resultado = $cantidad*$yuan;
                    break;    
            default:
                $resultado = $cantidad;
                break;        
        }
        break;
    case "Dolar":
        switch ($divisaDestino) {
            case "Euro":
                $resultado = (1/$dolar)*$cantidad;
                    break;
            case "Libra":
                $resultado = ((1/$dolar)*$libra)*$cantidad;
                    break;
            case "Yuan":
                $resultado = ((1/$dolar)*$yuan)*$cantidad;
                    break;    
            default:
                $resultado = $cantidad;
                break;
            
        }
        break;
    case "Libra":
        switch ($divisaDestino) {
            case "Euro":
                 $resultado = (1/$libra)*$cantidad;
                    break;
            case "Dolar":
                $resultado = ((1/$libra)*$dolar)*$cantidad;
                    break;
            case "Yuan":
                $resultado = ((1/$libra)*$yuan)*$cantidad;
                    break;    
            default:
                $resultado = $cantidad;
                break;
        }
        break;
    case "Yuan":
        switch ($divisaDestino) {
            case "Euro":
                $resultado = (1/$yuan)*$cantidad;
                    break;
            case "Libra":
                $resultado = ((1/$yuan)*$libra)*$cantidad;
                    break;
            case "Dolar":
                $resultado = ((1/$yuan)*$dolar)*$cantidad;
                    break;    
            default:
                $resultado = $cantidad;
                break;
        }
        break;
    default:
        $resultado = $cantidad;
        break;
    }

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
        echo "<td>Cantidad</td>";
        echo "<td>Divisa Origen</td>";
        echo "<td>Divisa Destino</td>";
        echo "<td>Cantidad</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>".$cantidad."</td>";
        echo "<td>".$divisaOrigen."</td>";
        echo "<td>".$divisaDestino."</td>";
        echo "<td>".$resultado."</td>";
        echo "</tr>";        
        echo "</table>";    
        ?>
    </body>
</html>
