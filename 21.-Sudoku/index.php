<?php

function tableroAleatorio(){
    $fila= array(array(1,2,3),array(4,5,6),array(7,8,9),array(5,6,4),array(8,9,7),array(2,3,1),array(9,7,8),array(3,1,2),array(6,4,5));  
    //$cuadrante=[["1"=>0,"2"=>0,"3"=>0],["4"=>0,"5"=>0,"6"=>0],["7"=>0,"8"=>0,"9"=>0]];
    $aleatorio = rand(0,2);
    $pos = [0,1,2];
    if ($aleatorio == 1){
        $final = array_slice($fila,0,6);
        $fila = array_slice($fila,6,8);
        $fila = array_merge($fila,$final);
    }elseif ($aleatorio == 2) {
        $final = array_slice($fila,0,3);
        $fila = array_slice($fila,3,8);
        $fila = array_merge($fila,$final);
    }
    return $fila;
}
function creaSudoku($fila){
    $contador1 = 0; 
    $contador2 = 0;     
    for($y=0;$y<3;$y++){
        $sudoku[$y]= array_merge($fila[$y],$fila[$y+1+$contador2],$fila[$y+2+$contador1]);
        $contador1 = -3;
        if($y == 1){
            $contador2 = -3;
        }
    }
    
    $contador1 = 0; 
    $contador2 = 0; 
    for($y=3;$y<6;$y++){
        $sudoku[$y]= array_merge($fila[$y],$fila[$y+1+$contador2],$fila[$y+2+$contador1]);
        $contador1 = -3;
        if($y == 1){
            $contador2 = -3;
        }
        
    }
    
    $contador1 = 0; 
    $contador2 = 0; 
    
    for($y=6;$y<9;$y++){
        $sudoku[$y]= array_merge($fila[$y],$fila[$y+1+$contador2],$fila[$y+2+$contador1]);
        $contador1 = -3;
        if($y == 7){
            $contador2 = -3;
        }      
    }
    return $sudoku;
}
if(empty($_POST)){
    
    
    
    $sudoku[] = [[[9,0],[7,0],[6,0]],[[3,0],[2,0],[8,0]],[[5,0],[1,0],[4,0]]];
    $sudoku[] = [[[2,0],[4,0],[3,0]],[[1,0],[6,0],[5,0]],[[8,0],[7,0],[9,0]]];
    $sudoku[] = [[[8,0],[5,0],[1,0]],[[7,0],[4,0],[9,0]],[[3,0],[6,0],[2,0]]];
    
    $sudoku[] = [[[6,0],[4,0],[2,0]],[[7,0],[5,0],[9,0]],[[1,0],[8,0],[3,0]]];
    $sudoku[] = [[[7,0],[3,0],[8,0]],[[6,0],[1,0],[2,0]],[[9,0],[5,0],[4,0]]];
    $sudoku[] = [[[1,0],[9,0],[5,0]],[[4,0],[3,0],[8,0]],[[6,0],[2,0],[7,0]]];
    
    $sudoku[] = [[[8,0],[6,0],[5,0]],[[4,0],[9,0],[1,0]],[[2,0],[3,0],[7,0]]];
    $sudoku[] = [[[4,0],[9,0],[1,0]],[[3,0],[2,0],[7,0]],[[5,0],[8,0],[6,0]]];
    $sudoku[] = [[[2,0],[7,0],[3,0]],[[5,0],[8,0],[6,0]],[[9,0],[1,0],[4,0]]];
    
    
    
    include 'vistas/vista_sudoku.php';   
 }     
?>
   
