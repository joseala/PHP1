<?php
function is_Valida($tablero){
    $contador = -1;
    foreach ($tablero as $key => $fila) {
        foreach ($fila as $key => $valor) {
            if($valor != ""){
              $contador++;  
            }
        }    
    }
    return $contador;
}
function actualizaTablero($limpio, $juego){
    foreach ($limpio as $x => $fila) {
        foreach ($fila as $y => $valor) {
            if($valor != ""){
              $juego[$x][$y] = $valor;
            }
        }    
    }
    return $juego;
}
function coordenadaJugada($tablero){
    foreach ($tablero as $x => $fila) {
        foreach ($fila as $y => $valor) {
            if($valor != ""){
              $jugada['x']=$x;
              $jugada['y']=$y;
            }
        }    
    }
    return $jugada;
}
function is_victoria($jugada, $tablero){
    $columna = implode(array_column($tablero, $jugada['y']));  
    $fila = implode($tablero[$jugada['x']]);
    $y = 2;
    for($x=0;$x<3;$x++){
      $transversalIzq += $tablero[$x][$x];
      $transversalDcha += $tablero[$x][$y];
      $y--;
    }
    if($columna == "xxx" || $fila == "xxx" || $transversalIzq == "xxx" || $transversalDcha == "xxx"){
        $resultado = 1;
    }elseif ($columna == "ooo" || $fila == "ooo" || $transversalIzq == "ooo" || $transversalDcha == "ooo") {
        $resultado = 2;
    }else{
        $resultado = 0;
    }
    return resultado;
}
if(empty($_POST)){
    include 'vista_tablero_limpio.php';   
}elseif(isset($_POST['jugar'])){
    $tablero_limpio = $_POST['tableroLimpio'];
    $tablero_juego = $_POST['tableroJuego'];
    if(!is_Valida($tablero_limpio)){
        $tablero_juego = actualizaTablero($tablero_limpio, $tablero_juego);
        $jugada = coordenadaJugada($tablero_limpio);
        if(is_victoria($jugada, $tablero_juego)){
            
            
        }else{
            
        }
    }else{
        
    }
    
}
?>
    