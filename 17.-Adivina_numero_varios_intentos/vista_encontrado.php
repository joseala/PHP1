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
        <?php
        echo "Has encontrado el numero secreto ".$aleatorio;
        echo "<br>";
        echo "Juega otra vez";
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' name='volver' value='volver'>";
        echo "</form>";
        ?>
    </body>
</html>
