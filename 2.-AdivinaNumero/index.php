<!DOCTYPE html>
<!--Escribe un programa PHP que permita al usuario introducir tres números. 
Dos de ellos serán los límites inferior y superior de un rango, el tercero 
será un número situado dentro de dicho rango. Cuando el programa reciba los 
datos generará un número aleatorio entre los límites inferior y superior y 
lo comparará con el tercer valor. Finalmente se informará al usuario si ha 
acertado el número aleatorio o no. En la página devuelta también figurará 
el número aleatorio y el introducido por el usuario.
 Generación de números aleatorios
 Estructura de control condicional
 Comentarios en código PHP
 Introduce comentarios explicativos en el código de tu programa.
 Implementa el programa de manera que la respuesta indique si el número introducido por el usuario es mayor o menor que el número aleatorio secreto.
 Piensa cómo se podría mejorar el programa para darle la opción al jugador de intentarlo varias veces en caso de fallo. -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Numero Aleatorio</title>
    </head>
    <body>
        <h1>Encuentra el numero aleatorio</h1>
        <br> 
        <form name="Formulario" action="aleatorio.php" method="POST">
            <div>
                <label for="limiteSuperior">Limite Superior:  </label>
                <input id="limiteSuperior" type="number" name="numeros[0]" size="2">
            </div>
            <br> 
            <div>
                <label for="limiteInferior">Limite Inferior:  </label>
                <input id="limiteInferior" type="number" name="numeros[1]" size="2">
            </div>
            <br> 
            <div>
                <label for="numeroRango">Numero en rango:  </label>
                <input id="numeroRango" type="number" name="numeros[2]" size="2">
            </div>
            <br>    
            <input type="submit" value="Generar" name="generar">  
        </form>
    </body>
</html>