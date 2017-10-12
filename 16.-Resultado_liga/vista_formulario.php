<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            echo "<form action='index.php' method='POST'>";
            echo "<label>Introduce nombre de equipos separados por comas</label>";
            echo "<input type='text' name='equipos'>";
            echo "<input type='submit' value='Generar cruces' name='generar'>";
            echo "</form>";
        ?>
    </body>
</html>
