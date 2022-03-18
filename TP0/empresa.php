<?php
//Menu.
function menu()
{
    $funcion = readline("Quiere conseguir la \"mayor ganancia\" o los \"empleados y sueldos\"? (1/2): ");
    $funcion = ($funcion == 1) ? "mayorGanancia" : "empleadosYSueldos";

    if ($funcion == "mayorGanancia") {
        echo mayorGanancia();
    } else {
        print_r(empleadosYSueldos());
    }
}

//Funciones.

/**
 * Función para inicializar un arreglo.
 */
function inicializarArreglo()
{
    //Agregue aqui el arreglo con el que quiere trabajar.
    $arreglo = [];

    return $arreglo;
}

/**
 * Crear un arreglo con 10 nombres con sueldo y antiguedad.
 */
function crearArregloEmpleados()
{
    $nombres = ["Juan", "Pedro", "Maria", "Jose", "Luis", "Ana", "Nick", "Braden", "Ricky", "Don"];

    $empleados = array();
    for ($i = 0; $i < 10; $i++) {
        $empleados[$i] = array(
            "nombre" => $nombres[$i],
            "sueldo" => rand(10000, 100000),
            "antiguedad" => rand(1, 20)
        );
    }

    return $empleados;
}

/**
 * Función para crear un arreglo de meses con cantidad recaudada y costo total.
 */
function crearArregloMeses()
{
    for ($i = 0; $i < 12; $i++) {
        $meses[$i] = array("recaudado" => rand(100, 100000), "costoTotal" => rand(100, 100000));
    }

    print_r($meses);

    return $meses;
}

/**
 * Función que convierte un número en el nombre del mes.
 */
function nombreMes(int $i)
{
    switch ($i) {
        case 1:
            return "Enero";
        case 2:
            return "Febrero";
        case 3:
            return "Marzo";
        case 4:
            return "Abril";
        case 5:
            return "Mayo";
        case 6:
            return "Junio";
        case 7:
            return "Julio";
        case 8:
            return "Agosto";
        case 9:
            return "Septiembre";
        case 10:
            return "Octubre";
        case 11:
            return "Noviembre";
        case 12:
            return "Diciembre";
    }
}

//Ejercicios.

/*
 * Ejercicio 1: Dada una estructura de arreglos asociativos, donde cada posición 
 * almacena un arreglo con la cantidad recaudada (en pesos) y costo total (en pesos), 
 * en el que cada mes del año se corresponde con la posición del arreglo dentro del 
 * otro arreglo; implementar un algoritmo que calcule cuál fue el mes que arrojó mayor ganancia.
 */
function mayorGanancia()
{
    //Pedir al usuario si crea un arreglo o que se cree aleatorio.
    $inicializar = readline("¿Desea inicializar el arreglo ingresado? Si no se inicializa se crea uno aleatorio que se mostrara por consola.\n(s/n): ");
    if ($inicializar == "s") {
        $meses = inicializarArreglo();
    } else {
        $meses = crearArregloMeses();
    }

    //Calcular el mayor ganancia.
    $mayorGanancia = 0;
    for ($i = 0; $i < count($meses); $i++) {
        if ($mayorGanancia < $meses[$i]["recaudado"] - $meses[$i]["costoTotal"]) {
            $mayorGanancia = $meses[$i]["recaudado"] - $meses[$i]["costoTotal"];
            $mes = $i + 1;
        }
    }

    return "La mayor ganacia de " . $mayorGanancia . " fué obtenida en el mes " . nombreMes($mes);
}

/*
 * Ejercicio 2: Dada una estructura de arreglos asociativos, donde cada arreglo se 
 * corresponde a la información del empleado de una empresa ( nombre completo, 
 * sueldo básico, antigüedad) , retornar un arreglo con el nombre de cada empleado y 
 * su sueldo a cobrar. El sueldo se calcula adicionando al sueldo básico el 50 % si 
 * la antigüedad supera los 10 años y el 25 % en caso contrario.
 */
function empleadosYSueldos()
{
    //Pedir al usuario si crea un arreglo o que se cree aleatorio.
    $inicializar = readline("¿Desea inicializar el arreglo ingresado? Si no se inicializa se crea uno aleatorio que se mostrara por consola.\n(s/n): ");
    if ($inicializar == "s") {
        $empleados = inicializarArreglo();
    } else {
        $empleados = crearArregloEmpleados();
        print_r($empleados);
    }

    for ($i = 0; $i < count($empleados); $i++) {
        if ($empleados[$i]["antiguedad"] > 10) {
            $sueldosACobrar[$i] = array("nombre" => $empleados[$i]["nombre"], "sueldo" => $empleados[$i]["sueldo"] * 1.5);
        } else {
            $sueldosACobrar[$i] = array("nombre" => $empleados[$i]["nombre"], "sueldo" => $empleados[$i]["sueldo"] * 1.25);
        }
    }

    return $sueldosACobrar;
}

menu();