<?php

function is_victoria($tablero, $fila, $arrayColumna, $jugada){
    $string_fila= "";
    for($x=0;$x<7;$x++){
        if(isset($fila[$x])){
            $string_fila = $string_fila.$fila[$x];
        }else{
            $string_fila = $string_fila.".";           
        }
    }   
    $string_columna= "";
    for($x=0;$x<7;$x++){
        if(isset($arrayColumna[$x])){
            $string_columna = $string_columna.$arrayColumna[$x];
        }else{
            $string_columna = $string_columna.".";           
        }
    }
    if(substr_count($string_columna, "XXXX") || substr_count($string_fila, "XXXX") || substr_count(trans_dch($tablero, $jugada), "XXXX") || substr_count(trans_izq($tablero, $jugada), "XXXX")){
        $resultado = 1;
    }elseif(substr_count($string_columna, "OOOO") || substr_count($string_fila, "OOOO") || substr_count(trans_dch($tablero, $jugada), "OOOO") || substr_count(trans_izq($tablero, $jugada), "OOOO")){
        $resultado = 2;
    }else{        
        $resultado = 0;
    }     
    return $resultado;
}
function trans_dch($tablero, $jugada){
    $total = 6 - $jugada['x'];//Valores de x < 6 llegar hasta el resultado,valores de y < 6 empezar desde x == 6.
    $x = range($jugada['y'] - $total, $jugada['x'] + $total);
    $y = array_reverse($x);
    $a = count($y);
    
    for($z= $a-1;$z>=0;$z--) {
        $array[$y[$z]] = $x[$z];
    }
    
    $string = "";
    foreach ($array as $key => $value) {
        if(isset($tablero[$key][$value])){
            $string = $string.$tablero[$key][$value];
        } else {
            $string = $string.".";
        }             
    }        
    return $string;
}
function trans_izq($tablero, $jugada){
    $total = 6 - $jugada['x'];//Valores de x < 6 llegar hasta el resultado,valores de y < 6 empezar desde x == 6.
    $inicio = $jugada['y']-$jugada['x'] ;//Resultado  y - x , $inicio negativo pone a 0,$inicio positivo inicio cuenta.
    ($inicio < 0)? $inicio = 0 : $inicio = $inicio;//
    $inicio2 = $jugada['x']-$jugada['y'] ;//Resultado  x - y , $inicio2 negativo pone a 0,$inicio positivo inicio cuenta.
    ($inicio2 < 0)? $inicio2 = 0 : $inicio2 = $inicio2;
    
    $x = array_reverse(range($inicio2, $jugada['x']+ $total));
    $y = array_reverse(range($inicio, $jugada['y']+ $total));
    $a = count($y);
    
    for($z= $a-1;$z>=0;$z--) {
        $array[$x[$z]] = $y[$z];
    }   
    $string = "";
    foreach ($array as $key => $value) {
        if(isset($tablero[$key][$value])){
            $string = $string.$tablero[$key][$value];
        } else {
            $string = $string.".";
        }             
    }        
    return $string;
}
function juegaMaquina(&$tablero){
    $hecho = false;
    while(!$hecho){
        $columna = rand(0, 6);
        $arrayColumna = array_column($tablero, $columna);
        if(7 != count($arrayColumna)){
            for($fila = 6; $fila >= 0; $fila--){
                if(!isset($tablero[$fila][$columna])){
                    $tablero[$fila][$columna] = "O";
                    $jugada['x']= $fila;
                    $jugada['y']= $columna;
                    $hecho = true;
                    break;
                }
            }
        }
    }
    return $jugada; 
}
if(empty($_POST) || isset($_POST['volver'])){
    $mensaje = "Empieza el juego, selecciona columna";
    include 'vistas/vista_tablero.php';
}elseif (isset ($_POST['jugar'])) {
    $columna = $_POST['columna'];
    if(isset($_POST['tablero'])){
        $tablero = $_POST['tablero'];    
    }else{
        $tablero = [];
    }
    $arrayColumna = array_column($tablero, (int)$columna);
    if(7 == count($arrayColumna)){
        $mensaje = "Columna llena, elige otra";
        include 'vistas/vista_tablero.php';
    }else{
        for($fila = 6; $fila >= 0; $fila--){
            if(!isset($tablero[$fila][(int)$columna])){
                $tablero[$fila][(int)$columna] = "X";
                break;
            }
        }
        $jugada['x'] = $fila;
        $jugada['y'] = (int)$columna; 
        $arrayColumna = array_column($tablero, (int)$columna);
        $resultado = is_victoria($tablero, $tablero[$fila], $arrayColumna, $jugada);
        if($resultado){
            ($resultado == 1)? $mensaje = "Has ganado": $mensaje = "Has perdido";
            include 'vistas/vista_victoria.php';
        }else{
            $jugada = juegaMaquina($tablero);
            $arrayColumna = array_column($tablero, (int)$jugada['y']);
            $resultado = is_victoria($tablero, $tablero[$jugada['x']], $arrayColumna, $jugada);
            if($resultado){
                ($resultado == 1)? $mensaje = "Has ganado": $mensaje = "Has perdido";
                include 'vistas/vista_victoria.php';
            }else{
                $mensaje = "Continua el juego, selecciona columna";
                include 'vistas/vista_tablero.php';
            }
        }
    }
    
    
}
?>
  
