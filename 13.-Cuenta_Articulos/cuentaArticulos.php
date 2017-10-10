<?php
if(!isset($_POST['confirmar'])){
    header('Location: http://localhost:8000');
}
$texto=$_POST['texto'];
$palabras = preg_split("/[\s,\t;\n:.]+/", $texto);//Separa texto
$array = array_count_values($palabras);
echo "<p>El articulo 'el' aparece ".$array['el']." veces</p>";
echo "<p>El articulo 'la' aparece ".$array['la']." veces</p>";
echo "<p>El articulo 'los' aparece ".$array['los']." veces</p>";
echo "<p>El articulo 'las' aparece ".$array['las']." veces</p>";
?>

