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
        <table border="1"> 
        <?php
        foreach ($sudoku as $key => $fila) {
            echo '<tr>';
            foreach ($fila as $key => $valor) {
                echo '<td>';
                echo $valor;
                echo '</td>';
            } 
            echo '</tr>';
        }
        ?>
        </table>
    </body>
</html>
