<?php
function generaCruces($array_equipos){
    foreach ($array_equipos as $local){
        foreach ($array_equipos as $visitante) {
            if($local !== $visitante){
                $array_partidos[] = ['local' => $local, 'gl', 'visitante' => $visitante, 'gv' ];          
            }
        }
    }
    return $array_partidos;
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
        if(empty($_POST) || isset($_POST['volver'])){
            include 'vista_formulario.php';
        }elseif(isset($_POST['generar'])){
            $equipos = $_POST['equipos'];
            $array_equipos = explode(',', $equipos);
            $partidos = generaCruces($array_equipos);
            include 'vista_resultados.php';
        }elseif(isset($_POST['buscar'])){
            $partidos = $_POST['partidos'];
            $max_goles = max(array_column($partidos, 'gl'));
            include 'vista_final.php';
        }
        ?>
        
    </body>
</html>
