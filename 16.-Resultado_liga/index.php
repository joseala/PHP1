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
function creaClasificacion($equipos) {
    foreach ( $equipos as $key => $equipo) {
        $clasificacion[$equipo]=['equipo' => $equipo, 'gFavor' => 0, 'gContra' => 0, 'gAverage' => 0, 'puntos' => 0];
    }
    return $clasificacion;
}
function actualizaClasificacion($partidos, $clasificacion){
    
    foreach ($partidos as $key => $partido) {
        if($partido['gl'] > $partido['gv']){
            $clasificacion[$partido['local']]['puntos'] += 3;
            
        }elseif($partido['gl'] < $partido['gv']){
            $clasificacion[$partido['visitante']]['puntos'] += 3;           
        }else{
            $clasificacion[$partido['local']]['puntos'] += 1;
            $clasificacion[$partido['visitante']]['puntos'] += 3; 
        }
        $clasificacion[$partido['local']]['gFavor'] += $partido['gl'];
        $clasificacion[$partido['local']]['gContra'] += $partido['gv'];
        $clasificacion[$partido['visitante']]['gFavor'] += $partido['gv'];
        $clasificacion[$partido['visitante']]['gContra'] += $partido['gl'];
        $clasificacion[$partido['local']]['gAverage']=$clasificacion[$partido['local']]['gFavor']-$clasificacion[$partido['local']]['gContra'];
        $clasificacion[$partido['visitante']]['gAverage']=$clasificacion[$partido['visitante']]['gFavor']-$clasificacion[$partido['visitante']]['gContra'];
    }
    $columna_gAverage = array_column($clasificacion, 'gAverage');
    $columna_puntos = array_column($clasificacion, 'puntos');
    $columa_equipos = array_column($clasificacion, 'equipo');
    array_multisort($columna_puntos, SORT_DESC, $columna_gAverage, SORT_DESC,$columa_equipos ,SORT_ASC, $clasificacion);
    return $clasificacion;
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
        }elseif(isset($_POST['clasificacion'])){
            $partidos = $_POST['partidos'];
            $equipos = $_POST['equipos'];
            $array_equipos = explode(',', $equipos);
            $clasificacion = creaClasificacion($array_equipos);
            $clasificacion = actualizaClasificacion($partidos, $clasificacion);            
            include 'vista_clasificacion.php';
        }
        ?>
        
    </body>
</html>

