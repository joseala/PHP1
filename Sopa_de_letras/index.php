<?php
function pisaPalabra($tablero,$col,$fil,$direccion,$tamanio){
    $pisado = false;
    if($direccion){
        $fila = $fil + $tamanio-1;
        for($z= $fil;$z<=$fila;$z++){
            for($x=-1;$x<2;$x++){
                for($y=-1;$y<2;$y++){
                    if(isset($tablero[$col+$x][$z+$y])){
                        $pisado = true;
                     break 3;
                    }
                }
            }
        }
    }else{
        $colum = $col + $tamanio-1;
        for($z= $col;$z<=$colum;$z++){
            for($x=-1;$x<2;$x++){
                for($y=-1;$y<2;$y++){
                    if(isset($tablero[$z+$x][$fil+$y])){
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
    $sentido = rand(0, 1);//0 Vertical, 1 Horizontal
    ($sentido)? $array_palabra = array_reverse($array_palabra) : $array_palabra = $array_palabra;//Se da un sentido u otro.
    
    
    if($direccion){//Horizontal     
        for($z=0;$z<$tamanio;$z++){
            $tablero[$col][$fil+$z]['letra'] = $array_palabra[$z];
            $tablero[$col][$fil+$z]['flag'] = 0;
        }
    }else{//Vertical
        
        for($z= 0;$z<$tamanio;$z++){
            $tablero[$col+$z][$fil]['letra'] = $array_palabra[$z];
            $tablero[$col+$z][$fil]['flag'] = 0;
        }
    } 
    
    return $tablero;
}
function colocaPalabras($elegidas,$alto,$ancho){
    $tablero=[];
    foreach ($elegidas as $x => $palabra) {//Recorro palabras elegidas
        $colocada = false;
        $tamanio = strlen($palabra);//Tamaño para no salir de tablero y 
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
    
    for ($x = 0;$x<=14;$x++) {
        $hayCinco = false;
        for ($y = 0;$y<=14;$y++) {
            $colocada = false;
            while(!$colocada){               
                if(isset($tablero[$x][$y])){
                    $colocada = true;
                }else{
                    $num_letra = rand(97, 122);
                    $letra = chr($num_letra);
                    if(!$hayCinco && !is_colocable($tablero,$x,$y,$letra)){                   
                        $tablero[$x][$y]= $letra;
                        $colocada = true;
                    }else{
                        $consonantes = "bcdfghjklmnñpqrstvwxyz";
                        $array_consonantes = str_split($consonantes);
                        $num_letra = rand(0, 22);                  
                        $letra = chr($array_consonantes);
                        $tablero[$x][$y]= $letra;
                        $colocada = true;
                        $hayCinco = true;
                    }
                }
            }               
        }          
    }
    return $tablero;
}
function is_colocable($tablero,$fil,$col,$letra){
   
    $array_columna = array_column($tablero, $col);
    if(isset($tablero[$fil])){
        $array_fila = $tablero[$fil];
    }else{
        $array_fila = [];
    }
    $vocalesCol = array_filter($array_columna, function ($valor){      
        return (isset($valor['letra']))? preg_match('/^([aeiou]+)$/', $valor['letra']) : preg_match('/^([aeiou]+)$/', $valor);      
    });
    $vocalesFil = array_filter($array_fila, function ($valor){      
        return (isset($valor['letra']))? preg_match('/^([aeiou]+)$/', $valor['letra']) : preg_match('/^([aeiou]+)$/', $valor);      
    });
    $colocar = false;
    for ($x = -1; $x < 2; $x++) {
        for ($y = -1; $y < 2; $y++) {
            if(isset($tablero[$fil+$x][$col+$y])){
                if(isset($tablero[$fil+$x][$col+$y]['letra'])){
                    $colocar = ($tablero[$fil+$x][$col+$y]['letra'] == $letra);
                }else{
                    $colocar = ($tablero[$fil+$x][$col+$y] == $letra);
                }
            }
            if($colocar){
                break 2;
            }
        }       
    }   
    return count($vocalesFil) >= 5 && count($vocalesCol) >= 5 && $colocar; 
}
function actualizar($tablero,$columna,$fila,$direccion,$tam){
    if(isset($tablero[$columna][$fila]['flag'])){
        if($tablero[$columna][$fila]['flag'] == 0){
            if($direccion == 0 || $direccion == 1){
               ($direccion == 0)? $principio = $columna-($tam-1) : $principio = $columna ;
               $final = $principio + ($tam-1);
               for ($x = $principio; $x <= $final ; $x++) {
                   $tablero[$x][$fila]['letra'] = strtoupper($tablero[$x][$fila]['letra']);
                   $tablero[$x][$fila]['flag'] = "1";
                }
            }elseif ($direccion == 2 || $direccion == 3) {
                ($direccion == 2)? $principio =  $fila : $principio = $fila-($tam-1)  ;
                 $final = $principio + ($tam-1);
               for ($x = $principio; $x <= $final; $x++) {
                    $tablero[$columna][$x]['letra'] = strtoupper($tablero[$columna][$x]['letra']);
                    $tablero[$columna][$x]['flag'] = "1";
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
    foreach ($tablero as $x => $fila){
        foreach ($fila as $y => $valor){
            if(isset($valor['flag'])){
                if($valor['flag'] == "1"){
                    $aciertos++;               
                }
            }
        }
    }
    return ($aciertos == $flags);
}
define("ANCHO",14);
define("ALTO",14); 
define("PALABRAS",3);
if(empty($_POST) || isset($_POST['volver'])){
    $array_palabras = ["camello","elefante","leon","cocodrilo","rinoceronte","piton","jirafa","leopardo","tigre","vaca","caballo"];
    $palabras_elegidas = array_map(function($x) use ($array_palabras){
        return $array_palabras[$x];
    },array_rand($array_palabras, PALABRAS));
    $flags = tamanioTotal($palabras_elegidas);//Letras totales para victoria
    $sopa_de_letras = colocaPalabras($palabras_elegidas,ALTO,ANCHO);
    $sopa_de_letras = colocaLetras($sopa_de_letras,ANCHO,ALTO);
    include 'vistas/vista_juego.php';
}elseif (isset ($_POST['resolver'])) {
    $sopa_de_letras = $_POST['sopa_de_letras'];
    $columna = $_POST['fila'];
    $fila = $_POST['columna'];
    $direccion = $_POST['direccion'];
    $a=1;
    $tam = $_POST['tam'];
    $flags = $_POST['flags'];
    $palabras_elegidas = $_POST['palabras'];
    
    $sopa_de_letras = actualizar($sopa_de_letras,$columna,$fila,$direccion,$tam);
   
    if(!is_victoria($sopa_de_letras,$flags)){
        include 'vistas/vista_juego.php';
    }else{
        include 'vistas/vista_victoria.php';
    }
    
}
?>
    
