<?php
function pisaPalabra($tablero,$col,$fil,$direccion,$tamanio){
    $pisado = false;
    if($direccion){
        $fila = $fil + $tamanio;
        for($z= $fila;$z>=$fil;$z--){
            for($x=-1;$x<2;$x++){
                for($y=-1;$y<2;$y++){
                    if(isset($tablero[$col+$x][$fila+$y])){
                        $pisado = true;
                     break 3;
                    }
                }
            }
        }
    }else{
        $colum = $col + $tamanio;
        for($z= $colum;$z>=$col;$z--){
            for($x=-1;$x<2;$x++){
                for($y=-1;$y<2;$y++){
                    if(isset($tablero[$colum+$x][$fil+$y])){
                        $pisado = true;
                     break 3;
                    }
                }
            }
        }
    } 
    
    return $pisado;    
}
function introducePalabra($tablero,$col,$fil,$direccion,$tamanio,$palabra){
    $array_palabra = str_split($palabra);
    $sentido = rand(0, 1);
    ($sentido)? $array_palabra = array_reverse($array_palabra) : $array_palabra = $array_palabra;
    
    if($direccion){     
        for($z=0;$z<$tamanio;$z++){
            $tablero[$col][$fil+$z]['letra'] = $array_palabra[$z];
            $tablero[$col][$fil+$z]['flag'] = 0;
        }
    }else{
        for($z= 0;$z<$tamanio;$z++){
            $tablero[$col+$z][$fil]['letra'] = $array_palabra[$z];
            $tablero[$col+$z][$fil]['flag'] = 0;
        }
    } 
    
    return $tablero;
}
function colocaPalabras($elegidas,$alto,$ancho){
    $tablero=[];
    foreach ($elegidas as $x => $palabra) {
        $colocada = false;
        $tamanio = strlen($palabra);
        while(!$colocada){
            $direccion = rand(0,1);//0=>vertical, 1=>horizontal
            if($direccion){
                $min_col = 0;
                $max_col = 14; 
                $min_fil= 0;
                $max_fil= 14-$tamanio; 
            }else{
                $min_col = 0;
                $max_col = 14-$tamanio; 
                $min_fil= 0;
                $max_fil= 14;
            }
            $col = rand($min_col, $max_col);
            $fil = rand($min_fil, $max_fil);
            if(!pisaPalabra($tablero,$col,$fil,$direccion,$tamanio)){
                $tablero = introducePalabra($tablero,$col,$fil,$direccion,$tamanio,$palabra);
                $colocada= true;
            }                 
        }      
    }
    return $tablero;
}
function colocaletras($tablero,$ancho,$alto){
    for($x=0;$x<=$alto;$x++){
        for($y=0;$y<=$ancho;$y++){
            $num_letra = rand(97, 122);
            $letra = chr($num_letra);
            if(!isset($tablero[$x][$y])){
                $tablero[$x][$y]= $letra;
            }
        }
    }
    return $tablero;
}
function actualizar($tablero,$columna,$fila,$direccion,$tam){
    if(isset($tablero[$columna][$fila]['flag'])){
        if($tablero[$columna][$fila]['flag'] == 0){
            if($direccion == 0){
               $col= $columna-($tam-1);
               $fil = $fila;
            }elseif ($direccion == 1) {
               $col= $columna;
               $fil = $fila; 
            }elseif ($direccion == 2) {
               $col= $columna;
               $fil = $fila; 
            }elseif ($direccion == 3) {
                $col= $columna;
                $fil = $fila-($tam-1);
            }
            if($direccion == 0 || $direccion == 1 ){
                for ($x = $col; $x < $columna+$tam; $x++) {//fallo
                   $tablero[$x][$fil]['letra'] = strtoupper($tablero[$x][$fil]['letra']);
                   $tablero[$x][$fil]['flag'] = "1";
                }
                
            } else {
                for ($x = $fil; $x <= $fila; $x++) {
                    $tablero[$col][$x]['letra'] = strtoupper($tablero[$col][$x]['letra']);
                   $tablero[$col][$x]['flag'] = "1";
                }
            }
        }      
    }
    
    return $tablero;
}
function tamanioTotal($palabras){
    $tamaño = 0;
    foreach ($palabras as $key => $palabra) {
        $tamaño = $tamaño + strlen($palabra);
    }
    return $tamaño;
}
function is_victoria($tablero,$flags){
    $aciertos = 0;
    for ($xa = 0; $xa < 14; $xa++) {
        for ($ya = 0; $ya < 14; $ya++) {
            if(isset($tablero[$xa][$ya]['flag'])){
                if($tablero[$xa][$ya]['flag'] == "1"){
                    $aciertos++;               
                }
            }
        }
    }
    return ($aciertos == $flags);
}
define("ANCHO",14);
define("ALTO",14);        
if(empty($_POST) || isset($_POST['volver'])){
    $array_palabras = ["camello","elefante","leon","cocodrilo","rinoceronte","piton","jirafa","leopardo","tigre","vaca","caballo"];
    $palabras_elegidas = array_map(function($x) use ($array_palabras){
        return $array_palabras[$x];
    },array_rand($array_palabras, 3));
    $flags = tamanioTotal($palabras_elegidas);
    $sopa_de_letras = colocaPalabras($palabras_elegidas,ALTO,ANCHO);
    $sopa_de_letras = colocaLetras($sopa_de_letras,ANCHO,ALTO);
    include 'vistas/vista_juego.php';
}elseif (isset ($_POST['resolver'])) {
    $sopa_de_letras = $_POST['sopa_de_letras'];
    $columna = $_POST['columna'];
    $fila = $_POST['fila'];
    $direccion = $_POST['direccion'];
    $tam = $_POST['tam'];
    $flags = $_POST['flags'];
     $a;
    $sopa_de_letras = actualizar($sopa_de_letras,$columna,$fila,$direccion,$tam);
   
    if(!is_victoria($sopa_de_letras,$flags)){
        include 'vistas/vista_juego.php';
    }else{
        include 'vistas/vista_victoria.php';
    }
    
}
?>
    
