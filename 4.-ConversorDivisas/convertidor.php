<?php
    if (!isset($_POST['calcula'])) {/*Forzamos a acceder primero al formulario*/
        header('Location: http://localhost:8000');
    }
    
    $cantidad = $_POST['cantidad'];
    $divisas = $_POST['divisa'];
    $divisaOrigen = $divisas['divisaOrigen'];
    $divisaDestino = $divisas['divisaDestino'];
    $euro=1;
    $dolar=1.122;
    $libra=0.865;
    $yuan=7.485;
    
    switch ($divisaOrigen) {
    case 'E':
        switch ($divisaDestino) {
            case 'D':
                $resultado = $cantidad*$dolar;
                    break;
            case 'L':
                $resultado = $cantidad*$libra;
                    break;
            case 'Y':
                $resultado = $cantidad*$yuan;
                    break;    
            default:
                $resultado = $cantidad;
                break;
            break;
    case 'D':
        switch ($divisaDestino) {
            case 'E':
                $resultado = (1/$dolar)*$cantidad;
                    break;
            case 'L':
                $resultado = ((1/$dolar)*$libra)*$cantidad;
                    break;
            case 'Y':
                $resultado = ((1/$dolar)*$yuan)*$cantidad;
                    break;    
            default:
                break;
            break;
    case 'L':
        switch ($divisaDestino) {
            case 'E':
                 $resultado = (1/$libra)*$cantidad;
                    break;
            case 'D':
                    break;
            case 'Y':
                    break;    
            default:
                break;
            break;
    case 'Y':
        switch ($divisaDestino) {
            case 'E':
                $resultado = (1/$yuan)*$cantidad;
                    break;
            case 'L':
                    break;
            case 'D':
                    break;    
            default:
                break;
            break;    
    default:
        break;
    }
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
        
        ?>
    </body>
</html>
