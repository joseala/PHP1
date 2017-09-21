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
        <form method="POST" action="convertidor.php">
            <label>Inserte cantidad</label>
            <input type="number" name="cantidad">
            <br>
            <label>Inserte divisa Origen</label>
            <select name="divisa[monedaOrigen]">
                <option value="E">Euro</option>
                <option value="D">Dolar</option>
                <option value="L">Libra</option>
                <option value="Y">Yuan</option>
            </select>
            <br>
            <br>
            <label>Inserte divisa Destino</label>
            <select name="divisa[monedaDestino]">
                <option value="E">Euro</option>
                <option value="D">Dolar</option>
                <option value="L">Libra</option>
                <option value="Y">Yuan</option>
            </select>
            <input type="submit" valor="calcula" name="calcula">
        </form>
    </body>
</html>
