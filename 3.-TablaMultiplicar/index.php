<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" action="tabla.php">
            <label>Introduce un numero del 1 al 9 </label> 
            <input type="text" size="1" name="numero">
            <input type="submit" value="multiplica" name="multiplica">
        </form>
        <form method="POST" action="rango.php">
            <label>Introduce numeros separados por comas ',' o rangos separados por guion '-' </label> 
            <input type="text" size="1" name="numero">
            <input type="submit" value="Genera Tablas" name="tablas">
        </form>
    </body>
</html>
