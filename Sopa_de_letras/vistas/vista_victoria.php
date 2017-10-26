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
                
                <?php for($x=0;$x<=14;$x++) { ?>
                    <tr>
                        <td width="20" height="20">
                            <?= $x; ?>
                        </td>
                    <?php for($y=0;$y<=14;$y++) { ?>
                        <td>
                            <?php
                            $valor = $sopa_de_letras[$x][$y];
                            if(isset($valor['letra'])){
                                echo $valor['letra'];
                                echo "<input type='hidden' value='".$valor['letra']."' name='sopa_de_letras[$x][$y][letra]' >";
                                echo "<input type='hidden' value='".$valor['flag']."' name='sopa_de_letras[$x][$y][flag]' >";
                            }else{
                                echo $valor;
                                echo "<input type='hidden' value='$valor' name='sopa_de_letras[$x][$y]' >";        
                            }

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

