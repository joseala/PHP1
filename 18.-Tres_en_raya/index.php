<?php
function is_Valida($tablero){
    $contador = -1;
    foreach ($tablero as $x => $fila) {
        foreach ($fila as $y => $valor) {
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
              $jugadaPersona['x']=$x;
              $jugadaPersona['y']=$y;
            }
        }    
    }
    return $jugadaPersona;
}
function is_victoria($jugadaPersona, $tablero){
    $columna = implode(array_column($tablero, $jugadaPersona['y']));  
    $fila = implode($tablero[$jugadaPersona['x']]);
    $y = 2;
    $transversalIzq = "";
    $transversalDcha = "";
    
    for($x=0;$x<3;$x++){
      $transversalIzq = $transversalIzq . $tablero[$x][$x];
      $transversalDcha = $transversalDcha . $tablero[$x][$y];
      $y--;
    }
    if($columna == "xxx" || $fila == "xxx" || $transversalIzq == "xxx" || $transversalDcha == "xxx"){
        $resultado = 1;
    }elseif ($columna == "ooo" || $fila == "ooo" || $transversalIzq == "ooo" || $transversalDcha == "ooo") {
        $resultado = 2;
    }else{
        $resultado = 0;
    }
    return $resultado;
}
function tableroLleno(&$tablero){//Necesito devolver un booleano para cuando juega maquina y el tablero esta lleno.
    $vacio= false;
    $lleno = false;  
    foreach ($tablero as $x => $fila) {
        if(array_search("", $fila)){
            $vacio= true;
        }
            
    }
    if($vacio){
        foreach ($tablero as $x => $fila) {
            foreach ($fila as $y => $valor) {
                $tablero[$x][$y] = "";
            }    
        }
    }
    return $vacio;
}
function tiradaAleatoria($tablero, &$coordenadaMaquina){//Necesito conocer la coordenada de la tirada de la maquina y guardar la tirada en el tablero.
    $tirada = false;
    while (!$tirada){
        $x = rand(0, 2);
        $y = rand(0, 2);
        if($tablero[$x][$y] == ""){
            $tablero[$x][$y] = "o";
            $coordenadaMaquina['x'] = $x;
            $coordenadaMaquina['y'] = $y;
            $tirada = true;
        }
    }
    return $tablero;
}
function juegaMaquina($tablero, $jugadaPersona, &$coordenadaMaquina){//Necesito conocer la coordenada de la tirada de la maquina y guardar la tirada en el tablero.
     
    if(tableroLleno($tablero)){
        $tablero = tiradaAleatoria($tablero, $coordenadaMaquina);
    }else{
        $columna = array_count_values(array_column($tablero, $jugadaPersona['y']));  
        $fila = array_count_values($tablero[$jugadaPersona['x']]);
        $tirada = false;

        if($columna['x'] == 2){
            for($x=0;$x<3;$x++){
                if($tablero[$x][$jugadaPersona['y']] == ""){
                    $tablero[$x][$jugadaPersona['y']] = "o";
                    $coordenadaMaquina['x'] = $x;
                    $coordenadaMaquina['y'] = $jugadaPersona['y'];
                    $tirada = true;
                }
            }
            if(!$tirada){            
                $tablero = tiradaAleatoria($tablero, $coordenadaMaquina);     
            }     
        }elseif($fila['x'] == 2){
            for($x=0;$x<3;$x++){
                if($tablero[$jugadaPersona['x']][$x] == ""){
                    $tablero[$jugadaPersona['x']][$x] = "o";
                    $coordenadaMaquina['x'] = $jugadaPersona['x'];
                    $coordenadaMaquina['y'] = $x;
                    $tirada = true;
                }
            }
            if(!$tirada){
                $tablero = tiradaAleatoria($tablero, $coordenadaMaquina);
            }  
        }else{
            $y = 2;
            $transversalIzq = "";
            $transversalDcha = "";
            for($x=0;$x<3;$x++){
              $transversalIzq = $transversalIzq . $tablero[$x][$x];
              $transversalDcha = $transversalDcha . $tablero[$x][$y];
              $y--;
            }
            if($transversalIzq == "xx"){
                for($x=0;$x<3;$x++){
                    if($tablero[$x][$x] == ""){
                        $tablero[$x][$x] = "o";
                        $coordenadaMaquina['x'] = $x;
                        $coordenadaMaquina['y'] = $x;
                    }              
                }
            } elseif ($transversalDcha == "xx") {
                $y = 2;
                for($x=0;$x<3;$x++){
                    if($tablero[$x][$y] == ""){
                        $tablero[$x][$y] = "o";
                        $coordenadaMaquina['x'] = $x;
                        $coordenadaMaquina['y'] = $y;
                    } 
                    $y--;
                }
            }else{
                $tablero = tiradaAleatoria($tablero, $coordenadaMaquina);
            }     
        }
    }
    return $tablero;
}
if(empty($_POST) || isset($_POST['volver'])){
    include 'vista_tablero_limpio.php';   
}elseif(isset($_POST['jugar'])){
    $tableroLimpio = $_POST['tableroLimpio'];
    $tableroJuego = $_POST['tableroJuego'];
    tableroLleno($tableroJuego);
    if(!is_Valida($tableroLimpio)){
        $tableroJuego = actualizaTablero($tableroLimpio, $tableroJuego);
        $jugadaPersona = coordenadaJugada($tableroLimpio);
        $resultado = is_victoria($jugadaPersona, $tableroJuego);
        if($resultado){
            include 'vista_final.php';            
        }else{
            $coordenadaMaquina['x'] = 0;
            $coordenadaMaquina['y'] = 0;                    
            $tableroJuego = juegaMaquina($tableroJuego, $jugadaPersona, $coordenadaMaquina);
            $resultado = is_victoria($coordenadaMaquina, $tableroJuego);
            if($resultado){
                include 'vista_final.php';            
            }else{
                tableroLleno($tableroJuego);
                include 'vista_tablero_juego.php';
            }
        }
    }else{
        include 'vista_tablero_juego.php';
    }
    
}
?>
    