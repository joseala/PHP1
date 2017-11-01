<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            .palabras{
               position: relative;
                left: 500px;
                bottom: 500px;
            }
        </style>
    </head>
    <body>
        <h1>Sopa de Letras</h1>
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
                                echo "<input type='hidden' value='".$valor['letra']."' name='sopa_de_letras[$x][$y][letra]'>";
                                echo "<input type='hidden' value='".$valor['flag']."' name='sopa_de_letras[$x][$y][flag]'>";
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
            <?php 
                echo "<input type='hidden' value='$flags' name='flags' >";  
            ?>
            
            <br>
            <label>Fila</label>
            <select name="fila">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
            </select>
            <label>Columna</label>
            <select name="columna">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
            </select>
            <br>
            <label>Direccion</label>
            <select name="direccion">
                <option value="0">Norte</option>
                <option value="1">Sur</option>
                <option value="2">Este</option>
                <option value="3">Oeste</option>
            </select>
            <br>
            <label>Tamaño</label>
            <select name="tam">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
            </select>
            <br>
            <input type="submit" value="Resolver" name="resolver">
            <div class="palabras">

                <h2>Busca estas palabras</h2>
                <table border="1" cellspacing="2">
                    <tr>
                 <?php foreach ($palabras_elegidas as $x => $palabra) {?>                 
                        <td>
                            <?= $palabra; ?>
                        </td>
                <?php 
                        echo "<input type='hidden' value='$palabra' name='palabras[$x]' >";  
                 } ?>
                    </tr>
                </table>
            </div>
        </form>
        <?php
     
        ?>
    </body>
</html>
