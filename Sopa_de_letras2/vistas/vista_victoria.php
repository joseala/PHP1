<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Juego acabado</h1>
        <form action="index.php" method="post">
            <table border="1">
                <th>
                <?php for($z=0;$z<=14;$z++){?>
                    <td width="20" height="20">
                        <?= $z; ?>
                    </td>
                <?php } ?>
                </th>
                
                <?php foreach ($sopa_de_letras as $x => $array_fila) { ?>
                    <tr>
                        <td width="20" height="20">
                            <?= $x; ?>
                        </td>
                    <?php foreach ($array_fila as $y => $valor) { ?>
                        <td>
                            <?php
                            echo $valor;
                            echo "<input type='hidden' value='$valor' name='sopa_de_letras[$x][$y]' >";        
                            ?>
                        </td>
                    <?php }?>
                      </tr>
                <?php }?>                                                                      
            </table>
            <br>
           
            <input type="submit" value="Volver" name="volver">
        </form>
        <?php
     
        ?>
    </body>
</html>

