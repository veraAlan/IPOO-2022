<?php
//Menu para elegir el ejercicio.
function menu()
{
    $ejercicio = readline("Que ejercicio quiere llamar? (Ejemplos: ej1 ó ej4)\n");

    if (substr($ejercicio, -1) >= 5) {
        print_r($ejercicio());
    } elseif (substr($ejercicio, -1) < 5) {
        echo $ejercicio();
    } else {
        echo "No existe tal ejercicio.";
    }
}

//Funciones utilizadas.

/**
 * Función que pide al usuario un número.
 * Vuelve a pedir un valor si se ingreso un dato erroneo.
 */
function ingresarNumero()
{
    do {
        $numero = readline(" ");

        if (!is_numeric($numero)) {
            echo "No se ha ingresado un número válido.\n";
        }
    } while (!is_numeric($numero));

    return $numero;
}

/**
 * Función que crea un array de $n cantidad de nombres y lo devuelve.
 */
function leerNombres($n)
{
    for ($i = 0; $i < $n; $i++) {
        $nombres[] = readline("Ingrese un nombre: ");
    }

    return $nombres;
}

/**
 * Función que calcula el factorial de un número.
 */
function factorialN(int $n)
{
    $factorial = 1;
    for ($i = 1; $i <= $n; $i++) {
        $factorial *= $i;
    }
    return $factorial;
}

/**
 * Función que retorna si un numero es par o impar (true o false respectivamente)
 */
function esPar(int $n)
{
    if ($n % 2 == 0) {
        return true;
    } else {
        return false;
    }
}

/**
 * Función que agrega valores aleatorio entre $min y $max, devolviendo el nuevo array.
 */
function randValArray()
{
    //Pedirle al usuario el tamaño y profundiad del array a generar.
    $cantidad = readline("Ingrese la cantidad de valores que desea ingresar: ");
    $min = readline("Ingrese el valor minimo: ");
    $max = readline("Ingrese el valor maximo: ");

    $array = array();
    for ($i = 0; $i < $cantidad; $i++) {
        $array[$i] = rand($min, $max);
    }
    return $array;
}

/**
 * Función que crea un arreglo con todos los años bisiestos hasta $anioMax.
 */
function arregloAniosBisiestos($anioMax)
{
    for ($i = 0; $i < $anioMax; $i++) {
        if ($i % 4 == 0 && $i % 100 != 0 || $i % 400 == 0) {
            $aniosBisiestos[] = $i;
        }
    }

    return $aniosBisiestos;
}

/**
 * Función que agrega los valores $arregloN al $arregloI.
 */
function sumaArray(array $arregloI, array $arregloN)
{
    for ($i = 0; $i < count($arregloN); $i++) {
        $arregloI[] = $arregloN[$i];
    }

    return $arregloI;
}

/**
 * Crea un arreglo con los valores que se encuentran en $arregloA y no son iguales a un valor de $arregloB.
 */
function difIntersecArreglos($arregloA, $arregloB){
    for ($i = 0; $i < count($arregloA); $i++) {
        if (!in_array($arregloA[$i], $arregloB)) {
            $arregloC[] = $arregloA[$i];
        }
    }
    return $arregloC;
}

/**
 * Función que muestra por panralla 2 arreglos.
 */
function mostrarArreglo(array $arreglo)
{
    echo "Arreglo ingresado: ";
    print_r($arreglo);
    echo "\n";
}

//Ejercicios.

/*
 * Ejercicio 1: Dado un número N retornar su factorial.
 */
function ej1()
{
    $bandera = true;

    do {
        $numero = readline("Ingrese un número: ");

        if (is_numeric($numero) && $numero >= 0) {
            $bandera = false;
        } else {
            echo "No se ha ingresado un número valido\n";
        }
    } while ($bandera);

    return "El factorial del número ingresado es: " . factorialN($numero);
}

/*
 * Ejercicio 2: Dado un número N retornar verdadero si el número es par y falso en caso contrario.
 */
function ej2()
{
    echo "Ingrese un número para comprobar si es par: ";
    $numero = ingresarNumero();

    return esPar($numero);
}

/*
 * Ejercicio 3: Dado dos números N y M retornar verdadero si el número N es 
 * divisible por M y falso en caso contrario.
 */
function ej3()
{
    echo "Ingrese un número para comprobar si es divisible por el proximo número: ";
    $N = ingresarNumero();
    $M = ingresarNumero();

    return ($N % $M == 0);
}

/*
 * Ejercicio 4: Dada un arreglo de números enteros, determinar los valores máximo y mínimo, 
 * y las posiciones en que éstos se encontraban en el arreglo.
 */
function ej4()
{
    $arreglo = randValArray();
    mostrarArreglo($arreglo);

    return "Valor mínimo es: " . min($arreglo) . " en la posición " . (array_search(min($arreglo), $arreglo) + 1) .
        "\nValor máximo es: " . max($arreglo) . " en la posición " . (array_search(max($arreglo), $arreglo) + 1);
}

/*
 * Ejercicio 5: Cree una función leerNombres, cuyo parámetro de entrada formal es una 
 * cantidad n de nombres (ciclo definido), que solicite a un usuario los n nombres y los 
 * almacene en un arreglo indexado. La función debe retornar el arreglo indexado.
 */
function ej5()
{
    $n = readline("Ingrese la cantidad de nombres que desea ingresar: ");

    return leerNombres($n);
}

/*
 * Ejercicio 6: Dado un número que se corresponde a un año calendario, 
 * retornar un arreglo con todos los años bisiestos menores al año ingresado.
 */
function ej6()
{
    echo "Ingrese un año para calcular los años bisiestos: ";
    $anio = ingresarNumero();

    return arregloAniosBisiestos($anio);
}

/*
 * Ejercicio 7: Dado 2 arreglos A y B, de N y M elementos respectivamente. 
 * Construir un algoritmo que retorne un arreglo con los elementos de A mas los elementos de B.
 */
function ej7()
{
    //Agregar una cantidad de valores aleatorios a los arreglos.
    $arregloA = randValArray();
    mostrarArreglo($arregloA);
    $arregloB = randValArray();
    mostrarArreglo($arregloB);

    return sumaArray($arregloA, $arregloB);
}

/*
 * Ejercicio 8: Dado 2 arreglos A y B, de N y M elementos respectivamente. Construir un 
 * algoritmo que retorne un arreglo con los elementos de A que no estan en B.
 */
function ej8()
{
    //Agregar una cantidad de valores aleatorios a los arreglos.
    $arregloA = randValArray();
    mostrarArreglo($arregloA);
    $arregloB = randValArray();
    mostrarArreglo($arregloB);

    return difIntersecArreglos($arregloA, $arregloB);
}

menu();