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

$notaMedia = [];
$notaMediaFinal = [];

//Creacion de la lista iterando el array
foreach ($array as $key => $value ) 
{
    echo("<ul>".$key);
    echo("<li>".'Nota DWES :'.$value["DWES"]."</li>");
    echo("<li>".'Nota DWEC :'.$value["DWEC"]."</li>");
    echo("</ul>");
}




// Control de filltro con radiogroup
if (!empty($_POST))
{
    foreach ($array as $key => $value) 
    {
        foreach ($_POST as $asig) 
        {
            echo("<ul>".$key);            
            echo("<li>".'Nota :'.$asig.' :'.$value[$asig]."</li>");
            echo("</ul>");
        }
    }
    
}
 
//Control de filtro con parametros de URL
if (!empty($_GET))
{
    foreach ($array as $key => $value) 
    {
        foreach ($_GET as $asig) 
        {
            echo("<ul>".$key);
            echo("<li>".'Nota :'.$asig.' :'.$value[$asig]."</li>");
            echo("</ul>");
        }
    }
    
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
<script>
 this.onload = () => 
    {
        document.getElementById("ejJson").addEventListener("click","json")
    }

function json()
{
    <?php
    global $array;
    //Creacion de fichero JSON
    $jsonEncoded = json_encode($array,JSON_UNESCAPED_UNICODE);
    file_put_contents('./jsonAlumnos.json',$jsonEncoded);



    //Nota media de cada alumno
    $jsonAlumnos = file_get_contents('./jsonAlumnos.json');
    $jsonAlumnosDecode = json_decode($jsonAlumnos, true, 512, JSON_UNESCAPED_UNICODE);

    foreach ($jsonAlumnosDecode as $key => $value) 
    {
        global $suma;
        foreach ($value as $llave => $nota) 
        {
            $suma += $nota;
        }
        echo("La nota media del alumno ".$key." es: " .$suma/count($value) ."<br>");
        $suma = 0;
    }
    ?>
}

</script>
<body>
    <form action="./2_formulario.php" method="post">
        <div id = 'radiogroup'>
            <input type="radio" name="ASIGNATURA" value="DWEC"> DWEC
            <input type="radio" name="ASIGNATURA" value="DWES"> DWES
            <input type="submit" value="Filtrar">
        </div>
    </form>
    <button  onClick="location.href='./2_formulario.php?asig=DWEC'" > DWEC URL </button>
    <button  onClick="location.href='./2_formulario.php?asig=DWES'" > DWES URL </button>
    <button id ="ejJSon" > EjercicioJSON </button>
</body>
</html>
