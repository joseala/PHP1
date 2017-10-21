<?php
function is_pisado($tablero,$fil,$col){
    $pisado = false;
    for($x=-1;$x<2;$x++){
        for($y=-1;$y<2;$y++){
            if(isset($tablero[$fil+$x][$col+$y])){
                $pidado = true;
                break 2;
            }
        }
    }
    return $pisado;
}
function introduceBarcos($tablero, $barco, $fila, $columna){
    $introducido = false;
    $pisado = false;
    while(!$introducido){
        $orientacion = rand(0, 1);
        if($orientacion){
            $fil= rand(0,$fila-$barco);
            $col= rand(0,$columna-1);
            $f1=0;
            $c1=1;
            $f2=0;
            $c2=2;
        }else{
            $fil= rand(0,$fila-1);
            $col= rand(0,$columna-$barco);
            $f1=1;
            $c1=0;
            $f2=2;
            $c2=0;
        }
        switch ($barco) {
            case 1:             
                if(!is_pisado($tablero, $fil, $col)){
                    $tablero[$fil][$col] = "o";
                    $introducido = true;
                }
                break;
            case 2:           
                if(!is_pisado($tablero, $fil, $col) && !is_pisado($tablero, $fil+$f1, $col+$c1) ){
                    $tablero[$fil][$col] = "o";
                    $tablero[$fil+$f1][$col+$c1] = "o";
                    $introducido = true;
                }
                break;
            case 3:
               if(!is_pisado($tablero, $fil, $col) && !is_pisado($tablero, $fil+$f1, $col+$c1) && !is_pisado($tablero, $fil+$f2, $col+$c2) ){
                   $tablero[$fil][$col] = "o";
                   $tablero[$fil+$f1][$col+$c1] = "o";
                   $tablero[$fil+$f2][$col+$c2] = "o";
                   $introducido = true;
                }
                break;
            default:
                break;
        }
        
    }
    
    return $tablero;
}
function colocaBarcos($barcos){
    $tableroBarcos = [];
    foreach ($barcos as $key => $barco) {       
            $tableroBarcos = introduceBarcos($tableroBarcos, $barco, FILA, COLUMNA);                  
    }
    return $tableroBarcos;
}
function unDisparo($tablero){
    $contador = 0;
    $valido = true;
    foreach ($tablero as $x => $fila) {
        foreach ($fila as $y => $valor) {
            if($valor == "o"){
                $contador++;
            }
            
        }
        
    }
    if($contador != 1){
        $valido = false;
    }
    return $valido;
}
function buscaDisparo($tablero){
    $disparo = [];
    foreach ($tablero as $x => $fila) {
        foreach ($fila as $y => $valor) {
            if($valor == "o"){
               $disparo['x'] = $x;
               $disparo['y'] = $y;
                break 2;
            }
        }
        
    }
    return $disparo;
}
function actualizaJuego($tablero, $barcos, $disparo){
    $x= $disparo['x'];
    $y= $disparo['y'];       
    if(isset($barcos[$x][$y])){
        $tablero[$x][$y]="*";
    }else{
        $tablero[$x][$y]="+";
    }
    return $tablero;
}
function isVictoria($tablero,$barcos){
    $contador = 0;
    foreach ($tablero as $x => $fila) {
        foreach ($fila as $y => $valor) {
            if($tablero[$x][$y] == "*"){
                $contador++;
            }
        }
    }
    return ($contador == 10);
}
define('FILA',10);
define('COLUMNA', 10);
define('BARCOS', 10);
if(empty($_POST)){
    $barcos = [1,1,1,2,2,3];
    $tableroBarcos = colocaBarcos($barcos);
    include 'vista_inicial.php';
}elseif(isset ($_POST['jugar'])){
    $barcos = $_POST['barcos'];
    $tableroDisparo = $_POST['tableroDisparo'];
    $tableroJuego = $_POST['tableroJuego'];
    if(unDisparo($tableroDisparo)){
        $disparo = buscaDisparo($tableroDisparo);
        $tableroJuego = actualizaJuego($tableroJuego,$barcos ,$disparo);
        if(isVictoria($tableroJuego, BARCOS)){
            include 'vista_final.php';
        }else{
            include 'vista_juego.php';
        }       
    }else{
        include 'vista_juego.php';
    }
}
?>
   
