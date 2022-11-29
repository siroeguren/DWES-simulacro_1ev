<?php
/**
 * 
 * 2. Formularios
 * - Crear una lista iterando el array anterior que muestre todos los alumnos y sus notas.
 * - Crear un formulario que permita seleccionar la asignatura a mostrar de los estudiantes. Utilizar o un select o un grupo de radio-buttons.
 * - Filtrar las asignaturas de manera similar al apartado anterior
 * - Crear un fichero json con los datos de cada alumno
 * - Decodificarlo y mostrar la nota media de cada alumno por pantalla
 * 
 * 
 */

require_once("./1_arrays.php");

foreach ($array as $key => $value ) 
{
    echo("<ul>".$key);
    echo("<li>".'Nota DWES :'.$value["DWES"]."</li>");
    echo("<li>".'Nota DWEC :'.$value["DWEC"]."</li>");
    echo("</ul>");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./3_controlador.php" method="post">
        <div id = 'radiogroup'>
            <input type="radio" name="DWEC" value="dwec"> DWEC
            <input type="radio" name="DWES" value="dwes"> DWES
            <input type="submit" value="Enviar datos">
        </div>
    </form>
</body>
</html>