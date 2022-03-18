<?php
/**
 * Pide al usuario si inicializa un arreglo ingresado o si lo crea aleatoriamente.
 * @param string $nombre
 */
function crearOInicializar($nombre)
{
    $inicializar = readline("\n¿Desea inicializar el arreglo de " . $nombre . " ingresado? Si no se inicializa se crea uno aleatorio que se mostrara por consola.\n(s/n): ");
    $nombre = ucfirst($nombre);
    if ($inicializar == "s") {
        $nombre = "inicializarArreglo" . $nombre;
        $arreglo = $nombre();
    } else {
        if (strtolower($nombre) == "alumnos") {
            $cantidadAlumnos = readline("Ingrese la cantidad de alumnos: ");
            $cantidadMaterias = readline("Ingrese la cantidad de materias: ");
            $arreglo = crearArregloAlumnos($cantidadAlumnos, --$cantidadMaterias);
        } else {
            $cantidadMaterias = readline("Ingrese la cantidad de materias: ");
            $arreglo = crearArregloMaterias($cantidadMaterias);
        }
    }

    return $arreglo;
}

/**
 * Crea un arreglo de alumnos con números aleatorios.
 * @param int $cantidadAlumnos, $cantMaterias
 */
function crearArregloAlumnos($cantAlumnos, $cantMaterias)
{
    for ($i = 0; $i < $cantAlumnos; $i++) {
        $alumnos[$i] = array("nroLegajo" => rand(1000, 9999), "codigoMateria" => rand(0, $cantMaterias), "notaObtenida" => rand(1, 10));
    }

    mostraralumnos($alumnos);

    return $alumnos;
}

/**
 * Muestra los alumnos en el arreglo de $alumnos.
 * @param $alumnos
 */
function mostraralumnos($alumnos)
{
    foreach ($alumnos as $estudiante) {
        echo "Nro de legajo: " . $estudiante["nroLegajo"] . "\n¦-----Codigo materia: " . $estudiante["codigoMateria"] . "\n+-----Nota obtenida: " . $estudiante["notaObtenida"] . "\n\n";
    }
}

function crearArregloMaterias($cantidad)
{
    return array_fill(0, $cantidad, 0);
}

function inicializarArregloAlumnos()
{
    //Reemplazar arreglo de alumnos por el arreglo predefinido.
    $alumnos = [
        array(
            "nroLegajo" => 5734,
            "codigoMateria" => 0,
            "notaObtenida" => 5
        ),

        array(
            "nroLegajo" => 1049,
            "codigoMateria" => 2,
            "notaObtenida" => 7
        ),

        array(
            "nroLegajo" => 2793,
            "codigoMateria" => 0,
            "notaObtenida" => 2
        ),

        array(
            "nroLegajo" => 5648,
            "codigoMateria" => 2,
            "notaObtenida" => 9
        ),

        array(
            "nroLegajo" => 5985,
            "codigoMateria" => 1,
            "notaObtenida" => 6
        ),

    ];

    return $alumnos;
}

function inicializarArregloMaterias()
{
    //Reemplazar arreglo de codigos de materias por el arreglo predeterminado.
    $materias = [ 0, 0, 0];

    return $materias;
}


//Ejercicios.

/* 
* dada una materia obtener la cantidad de alumnos que rindieron esa materia.
*/
function alumnosPorMateria()
{
    $cantRindiendoMateria = 0;
    $alumnos = crearOInicializar("alumnos");
    $materia = readline("Ingrese la materia a saber cuantos alumnos rindieron: ");

    foreach ($alumnos as $alumno) {
        if ($alumno["codigoMateria"] == $materia) {
            $cantRindiendoMateria++;
        }
    }

    return $cantRindiendoMateria;
}

/*
* por cada materia el porcentaje de alumnos que rindieron.
*/
function porcentajeAlumnosPorMateria()
{
    //Pedir al usuario si crea un arreglo o que se cree aleatorio.
    $materias = crearOInicializar("materias");
    $alumnos = crearOInicializar("alumnos");

    foreach ($alumnos as $estudiante) {
        if (array_key_exists($estudiante["codigoMateria"], $materias)) {
            $materias[$estudiante["codigoMateria"]]++;
        }
    }

    $i = 0;
    foreach ($materias as $materia => $cantAlumnos) {
        $porcentajeMaterias[$i] = "Código de materia: " . $materia . "\n+-----Porcentaje de alumnos que rindieron: " . round($cantAlumnos / count($alumnos) * 100, 2) . "%\n";
        $i++;
    }

    return $porcentajeMaterias;
}

/*
* obtener toda la información del alumno que mayor nota obtuvo por cada materia.
*/


/*
* 
*/