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
        <style type="text/css">
            .tabla{
                position: absolute;
                left: 500px;
            }
            .azul{
                background-color: #0101DF;
            }
            .rojo{
                background-color: #DF013A;
            }
        </style>     
    </head>
    <body>
        
        <fieldset class="tabla">
            <fieldset>
                <h1>
                    <?= $mensaje; ?>
                </h1>           
            </fieldset>
            <form action="index.php" method="POST">
                <table border="1">
                    <tr>
                <?php for ($z = 1; $z <= 7; $z++) { ?>               
                        <th width="40" height="40">
                            <?= $z; ?>
                        </th>         
                <?php } ?> 
                    </tr>
            <?php for ($x = 0; $x <7; $x++) { ?>    
                <tr>
               <?php for ($y = 0; $y <7; $y++) { ?>                 
                    <?php
                    if(isset($tablero[$x][$y])){
                        echo "<input type='hidden' value='".$tablero[$x][$y]."' name=tablero[$x][$y]>"; ?>
                        <?php if($tablero[$x][$y] == "X"){ ?>
                            <td class="azul" width="75" height="40">
                            <?= $tablero[$x][$y]; ?>
                            </td>
                        <?php } else { ?>
                            <td class="rojo" width="75" height="40">
                            <?= $tablero[$x][$y]; ?>
                            </td>
                        <?php } ?>
                        
               <?php }else{ ?>
                        <td width="75" height="40">
                       
                        </td>                       
               <?php }
               
               } ?>
                </tr>
           <?php } ?>
                   </table>
                <br>
                <select name="columna">
                    <option value="0">1</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                    <option value="4">5</option>
                    <option value="5">6</option>
                    <option value="6">7</option>              
                </select>
                <input type="submit" name="jugar" value="Jugar">
            </form>
        </fieldset>    
    </body>
</html>
