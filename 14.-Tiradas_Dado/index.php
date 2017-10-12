<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>TIRAR DADO</h1>
        <form name="formularioDado" action="tiradado.php" method="POST">
            <div>
                <label for="introduceNumero">Introduce la cantidad de tiradas del dado</label>
                <input id="introduceNumero" type="number" name="cantidad"/>
            </div>
            <br>
            <input type="submit" value="Confirmar" name="confirmar"/>
        </form>
    </body>
</html>
