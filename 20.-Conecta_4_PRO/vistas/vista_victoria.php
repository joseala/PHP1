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
                        <th width="75" height="40">
                            <?= $z; ?>
                        </th>         
                <?php } ?> 
                    </tr>
            <?php for ($x = 0; $x <7; $x++) { ?>    
                <tr>
               <?php for ($y = 0; $y <7; $y++) { ?>                 
                    <?php
                    if(isset($tablero[$x][$y])){ ?>
                        <td width="75" height="40">
                            <?= $tablero[$x][$y]; ?>
                        </td>
               <?php }else{ ?>
                        <td width="75" height="40">
                       
                        </td>                       
               <?php }
               
               } ?>
                </tr>
           <?php } ?>
                   </table>
                <br>               
                <input type="submit" name="volver" value="Volver a jugar">
            </form>
        </fieldset> 
    </body>
</html>
