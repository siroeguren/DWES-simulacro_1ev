<?php

/**
 * 
 * 1. Arrays:
 * Crear un array que recoja las notas de la asignatura "DWES" de 5 alumnos. Dicho array ha de ser asociativo y las notas números aleatorios entre 1 y 10.
 * Añadir por cada estudiante, una clave más "DWEC" con números aleatorios entre 1 y 10.
 * 
 */

 $array =
 [
    "Juan" => 
    [
        "DWES" => rand(1,10),
    ],
    "Pepe" => 
    [
        "DWES" => rand(1,10),
    ],
    "Pedro" => 
    [
        "DWES" => rand(1,10),
    ],
    "Siro" => 
    [
        "DWES" => rand(1,10),
    ],
 ];



 foreach ($array as $key => $value) 
 {
    $array[$key]["DWEC"] = rand(1,10);    
 }

 
