<?php
if(!filter_input(INPUT_POST, 'confirmar')){
    header('Location: http://localhost:8000');
}
$cantidad=$_POST['cantidad'];

for($x=1;$x<=$cantidad;$x++){
    $tiradas[]=rand(1,6);
}
$repetidos = array_count_values($tiradas);
foreach ($repetidos as $numero => $cantidad) {
    echo"<p>El numero $numero esta repetido $cantidad vez/veces </p><br>";
}

?>

