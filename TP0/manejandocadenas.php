<?php
//Funciones para manejar cadenas.

/**
 * Función que devuelve la longitud de una cadena.
 */
function longitud($string)
{
    $longitud = 0;
    $lastIndex = substr($string, -1);
    for ($i = 0; $i <= strpos($string, $lastIndex); $i++) {
        $longitud++;
    }

    return $longitud;
}

//Ejercicios.

/*
 * Ejercicio 1: Dada una cadena de caracteres terminada en punto 
 * retornar la cantidad de letras que contiene la cadena.
 */
function ej1()
{
    do {
        $cadenaChar = readline("Ingrese una cadena de carácteres terminada en punto: ");
    } while ((substr($cadenaChar, -1 != ".")));

    return "La cadena tiene " . strlen($cadenaChar) . " letras.";
}

/*
 * Ejercicio 2: Dado un texto terminado en / y un caracter, determinar 
 * cuántas veces aparece ese caracter en la cadena.
 */
function ej2()
{
    do {
        $cadenaChar = readline("Ingrese una cadena de carácteres terminada en / y un caracter: ");
        $auxiliar = substr($cadenaChar, -2);

        if (substr($auxiliar, 0, 1) == "/") {
            $cadenaChar = substr($cadenaChar, 0, -2);
            $char = substr($auxiliar, -1);
            $bandera = false;
        } else {
            echo "\nLa cadena no termina en '/' y un carácter\n";
            $bandera = true;
        }
    } while ($bandera);

    return "El carácter '" . $char . "' se encuentra " . substr_count($cadenaChar, $char) . " veces en la cadena.";
}


/*
 * Ejercicio 3: Dada 2 cadenas cadena1 y cadena2 retornar verdadero si 
 * cadena2 se encuentra en cadena1 y falso en caso contrario.
 */
function ej3()
{
    $bandera = true;
    do {
        $cadena1 = readline("Ingrese una cadena de carácteres: ");
        $cadena2 = readline("Ingrese otra cadena de carácteres: ");

        if (strlen($cadena1) > strlen($cadena2)) {
            $bandera = false;
        } else {
            echo "La cadena 1 debe ser mayor a la cadena 2\n";
        }
    } while ($bandera);

    return str_contains($cadena1, $cadena2);
}

/*
 * Ejercicio 4: Dada una cadena retornar su longitud sin utilizar la 
 * función count de PHP.
 */
function ej4()
{
    $cadena = readline("Ingrese una cadena de carácteres: ");

    return "La longitud de la cadena es: " . longitud($cadena);
}

/*
 * Ejercicio 5: Dada 2 cadenas cadena1 y cadena2 retornar la cadena 
 * de mayor longitud, invocar al método implementado para el inciso anterior.
 */
function ej5()
{
    $cadena1 = readline("Ingrese una cadena de carácteres: ");
    $cadena2 = readline("Ingrese otra cadena de carácteres: ");

    return (longitud($cadena1) > longitud($cadena2)) ? $cadena1 : $cadena2;
}

$ejercicio = readline("Que ejercicio quiere llamar? (Ejemplos: ej1 ó ej4)\n");

echo $ejercicio();