<?php
function compara($a,$b){
    if ($a == $b) {
        return 0;
    }
    return ($a > $b) ? 2 : 1;
}

if(empty($_POST)){
    include 'vista_formulario.php';
}elseif (isset($_POST['probar'])) {
    $superior = $_POST['superior'];
    $inferior = $_POST['inferior'];
    $numero = $_POST['numero'];
    
    $aleatorio = rand($inferior, $superior);
    $resultado = compara($numero,$aleatorio);
    if($resultado){
        include 'vista_nuevo_intento.php';
    }else{
        include 'vista_encontrado.php';
    }
}elseif (isset ($_POST['nIntento'])) {
    
    $numero = $_POST['numero'];
    $aleatorio = $_POST['aleatorio'];   
    $resultado = compara($numero,$aleatorio);
    if($resultado){
        include 'vista_nuevo_intento.php';
    }else{
        include 'vista_encontrado.php';
    }
}
?>