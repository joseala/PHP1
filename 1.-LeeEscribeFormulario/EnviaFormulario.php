<?php
if(!isset($_POST['enviar']))
{
    header('Location: http://localhost:8000');
}
$nombre=  htmlspecialchars($_POST['nombre']);//Convierte caracteres especiales a html.
$contrasenia=  htmlspecialchars($_POST['contrasenia']);
$fecha=  htmlspecialchars($_POST['fecha']);
$tienda=  htmlspecialchars($_POST['tienda']);
$edad= htmlspecialchars($_POST['edad']);
$suscripcion= htmlspecialchars($_POST['suscripcion']);
?>
<!DOCTYPE html>
<html>
    <head>
       <title>Aplicacion</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <h1>
        <?php
           echo "Nombre: $nombre  <br>";        
           echo "Contraseña: $contrasenia <br>";          
           echo "Fecha de nacimiento: $fecha <br>";        
           echo "Tienda: $tienda <br>";      
           echo "Edad: $edad <br>";          
           echo "Suscripcion: $suscripcion";
        ?>
        </h1>    
    </body>
</html>


