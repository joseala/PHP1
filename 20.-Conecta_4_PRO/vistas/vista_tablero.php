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
        <?php for ($x = 0; $x <8; $x++) { ?>
            <tr>
                <th>
                    <?= $x + 1; ?>
                </th>
            </tr>    
            <tr>
           <?php for ($y = 0; $y <8; $y++) { ?>
                <td>
                    
                </td>
           <?php } ?>
            </tr>
       <?php } ?>
               </table>
        </form>
    </body>
</html>
