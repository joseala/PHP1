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
        <form action="index.php" method="POST">
            <table border="1" width="1">
                <?php foreach ($tableroJuego as $x => $fila) { ?>
                <tr>
                    <?php foreach ($fila as $y => $valor) { ?>   
                    <td>
                        <?= $valor ;?>
                    </td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>
            <input type="submit" value="Volver" name="volver">
        </form>
    </body>
</html>
