<?php
if(empty($_POST)){
    $fila= array(array(1,2,3),array(4,5,6),array(7,8,9),array(5,6,4),array(8,9,7),array(2,3,1),array(9,7,8),array(3,1,2),array(6,4,5));  
    $contador1 = 0; 
    $contador2 = 0;
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
    
    include 'vistas/vista_sudoku.php';   
 }     
?>
   
