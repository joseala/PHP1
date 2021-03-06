<?php
function pisaPalabra($tablero,$fil,$col,$tam){
    $pisado = false;
    if(isset($tablero [$fil-1])){
        $fila_ant = $tablero [$fil-1];
    }else{
        $fila_ant = array_fill(0, 15, "");
    }
    if(isset($tablero [$fil+1])){
        $fila_pos = $tablero [$fil+1];
    }else{
        $fila_pos = array_fill(0, 15, "");
    }  
    $fila_act = $tablero [$fil];
    
    if( 1 != count(array_unique(array_slice($fila_ant,$col-1,$col+$tam))) ||
        1 != count(array_unique(array_slice($fila_act,$col-1,$col+$tam))) ||
        1 != count(array_unique(array_slice($fila_pos,$col-1,$col+$tam)))){
        $pisado = true;    
    }   
    return $pisado;    
}
function introducePalabra($tablero,$fil,$col,$palabra,$tamanio){
    $array_palabra = str_split($palabra);
    $sentido = rand(0, 1);
    ($sentido)? $array_palabra = array_reverse($array_palabra) : $array_palabra = $array_palabra;//Se da un sentido u otro.
    $direccion= rand(0, 1);
    $array_palabra[] = "";
    if($direccion){          
        array_splice($tablero[$fil], $col,($tamanio+1) ,$array_palabra);//fallo
        $tablero = array_map(null, ...$tablero);       
    }else{

        array_splice($tablero[$fil], $col, ($tamanio+1),$array_palabra);//fallo
    }   
    return $tablero;
}
function colocaPalabras($sopa_de_letras,$elegidas,$alto,$ancho){
    foreach ($elegidas as $x => $palabra) {//Recorro palabras elegidas
        $colocada = false;
        $tamanio = strlen($palabra);//Tamaño para no salir de tablero y 
        while(!$colocada){
            
            $min_fil = 0;
            $max_fil = 14; 
            $min_col= 0;
            $max_col= 14-$tamanio; 
            
            $fil = rand($min_fil, $max_fil);
            $col = rand($min_col, $max_col);
            if(!pisaPalabra($sopa_de_letras,$fil,$col,$tamanio)){
                $sopa_de_letras = introducePalabra($sopa_de_letras,$fil,$col,$palabra,$tamanio);
                $colocada= true;
            }                 
        }      
    }
    return $sopa_de_letras;
}
function colocaletras($tablero,$ancho,$alto){
    $consonantes = "bcdfghjklmnpqrstvwxyz";
    $array_consonantes = str_split($consonantes);
    foreach ($tablero as $x => $fil){
        $hayCinco = false;
        foreach ($fil as $y => $valor) {
            $colocada = false;
            while(!$colocada){               
                if($valor != ""){
                    $colocada = true;
                }else{//fallo
                    $num_letra = rand(97, 122);
                    $letra = chr($num_letra);
                    if(!$hayCinco && !no_colocable($tablero,$x,$y,$letra )){  
                        if(!hayAlrededor($tablero,$x,$y,$letra)){
                            $tablero[$x][$y]= $letra;
                            $colocada = true;
                        }                   
                    }else{                    
                        $num_letra = rand(0, 20);                  
                        $letra = $array_consonantes[$num_letra];
                        $hayCinco = true;
                        if(!hayAlrededor($tablero,$x,$y,$letra)){
                            $tablero[$x][$y]= $letra;
                            $colocada = true;                     
                        }            
                    }
                }
            }               
        }          
    }
    return $tablero;
}
function no_colocable($tablero,$fil,$col,$letra){
   
    $array_columna = array_column($tablero, $col);
    $array_fila = $tablero[$fil];
    
    $vocalesCol = array_filter($array_columna, function ($valor){      
        return preg_match('/^([aeiou]+)$/', $valor);      
    });
    $vocalesFil = array_filter($array_fila, function ($valor){      
        return preg_match('/^([aeiou]+)$/', $valor);      
    });
      
    return count($vocalesFil) >= 5 || count($vocalesCol) >= 5; 
}
function hayAlrededor($tablero,$fil,$col,$letra){
    $colocar = false;
    for ($x = -1; $x < 2; $x++) {
        for ($y = -1; $y < 2; $y++) { 
            if(isset($tablero[$fil+$x][$col+$y])){
                $colocar = ($tablero[$fil+$x][$col+$y] == $letra);
                if($colocar){
                    break 2;
                }
            }
        }       
    }
    return $colocar;
}
function actualizar($tablero,$fila,$columna,$direccion,$tam,&$palabras){
            $encontrada = false;
            if($direccion == 0 || $direccion == 1){//Dar la Vuelta norte
               ($direccion == 0)? $principio = $fila-($tam-1) : $principio = $fila ;
               $final = $principio + ($tam-1);
               $array_columna = array_column($tablero, (int)$columna);
               $jugada = implode(array_slice($array_columna,$principio,$tam));
               ($direccion == 0)? $jugada = strrev($jugada): $jugada = $jugada;
               if(is_numeric(array_search($jugada, $palabras))){
                    for ($x = $principio; $x <= $final ; $x++) {
                       $tablero[$x][$columna] = strtoupper($tablero[$x][$columna]);
                    }
                    array_splice($palabras, array_search($jugada, $palabras),1);
               }   
            }elseif ($direccion == 2 || $direccion == 3) {//Dar la Vuelta oeste
                ($direccion == 2)? $principio =  $columna : $principio = $columna-($tam-1);
                
                $final = $principio + ($tam-1);
                $fil = $tablero[$fila];
                $jugada = implode(array_slice($fil,$principio,$tam)); 
                ($direccion == 3)? $jugada = strrev($jugada): $jugada = $jugada;
                if(is_numeric(array_search($jugada, $palabras))){
                    for ($x = $principio; $x <= $final; $x++) {
                        $tablero[$fila][$x]= strtoupper($tablero[$fila][$x]);
                    }
                    array_splice($palabras, array_search($jugada, $palabras),1);
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
    $sopa_de_letras = array_fill(0,15,array_fill(0, 15, ""));
    $sopa_de_letras = colocaPalabras($sopa_de_letras,$palabras_elegidas,ALTO,ANCHO);
    $sopa_de_letras = colocaLetras($sopa_de_letras,ANCHO,ALTO);
    include 'vistas/vista_juego.php';
}elseif (isset ($_POST['resolver'])) {
    $sopa_de_letras = $_POST['sopa_de_letras'];
    $fila = $_POST['fila'];
    $columna = $_POST['columna'];
    $direccion = $_POST['direccion'];
    $tam = $_POST['tam'];
    $palabras_elegidas = $_POST['palabras'];
 
    $sopa_de_letras = actualizar($sopa_de_letras,$fila,$columna,$direccion,$tam,$palabras_elegidas);
   
    if(count($palabras_elegidas)){
        include 'vistas/vista_juego.php';
    }else{
        include 'vistas/vista_victoria.php';
    }
    
}
?>
    
