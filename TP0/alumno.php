<?php
//Menu y opciones.
function menu()
{
    $opcion = readline(opciones());

    if ($opcion != 0) {
        $alumnos = crearOInicializar("alumnos");
        $materias = crearOInicializar("materias");

        switch ($opcion) {
            case 1:
                echo "\nAlumnos aprobados en la materia ingresada: " . cantAlumnosApobadosMateria($alumnos, $materias);
                break;
            case 2:
                print_r(porcentajeAlumnosPorMateria($alumnos, $materias));
                break;
            case 3:
                print_r(mayorNotaPorMateria($alumnos, $materias));
                break;
            case 4:
                print_r(alumnosAprobadosPorMateria($alumnos, $materias));
                break;
            case 5:
                $materia = readline("\nIngrese la materia a saber los alumnos aprobados: ");
                print_r(alumnosAprobadosEnMateria($alumnos, $materias, $materia));
                break;
            case 6:
                print_r(legajosAprobadosMasDe4Materias($alumnos, $materias));
                break;
            case 7:
                $legajo = readline("\nIngrese el legajo del alumno: ");
                print_r(materiasAprobadasPorAlumno($alumnos, $materias, $legajo));
                break;
        }
    } else {
        exit();
    }
}

function opciones()
{
    return "+=========================================================================================+\n" .
        "1. Obtener la cantidad de alumnos que rindieron una materia.\n" .
        "2. Porcentaje de alumnos que rindieron cada materia.\n" .
        "3. Obtener alumno con mayor nota por cada materia.\n" .
        "4. Obtener la cantidad de alumnos aprobados por materia.\n" .
        "5. Obtener los datos de alumnos aprobados en una materia.\n" .
        "6. Obtener el o los números de legajo de los alumnos que aprobaron más de cuatro materias.\n" .
        "7. Obtener las materias aprobadas por un alumno.\n" .
        "0. Salir.\n" .
        "+=========================================================================================+\nOpción a elegir: ";
}


/**
 * Pide al usuario si inicializa un arreglo ingresado o si lo crea aleatoriamente.
 * @param string $nombre
 * @return array
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
 * Función que inicializa un arreglo de alumnos predefinido.
 * @return array
 */
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
            "notaObtenida" => 8
        ),

        array(
            "nroLegajo" => 2793,
            "codigoMateria" => 1,
            "notaObtenida" => 9
        ),

        array(
            "nroLegajo" => 2793,
            "codigoMateria" => 2,
            "notaObtenida" => 8
        ),

        array(
            "nroLegajo" => 2793,
            "codigoMateria" => 3,
            "notaObtenida" => 10
        ),

        array(
            "nroLegajo" => 2533,
            "codigoMateria" => 2,
            "notaObtenida" => 7
        ),

        array(
            "nroLegajo" => 5648,
            "codigoMateria" => 0,
            "notaObtenida" => 9
        ),

        array(
            "nroLegajo" => 5648,
            "codigoMateria" => 1,
            "notaObtenida" => 5
        ),

        array(
            "nroLegajo" => 5648,
            "codigoMateria" => 2,
            "notaObtenida" => 6
        ),

        array(
            "nroLegajo" => 5648,
            "codigoMateria" => 3,
            "notaObtenida" => 10
        ),

        array(
            "nroLegajo" => 5985,
            "codigoMateria" => 1,
            "notaObtenida" => 6
        ),

    ];

    return $alumnos;
}

/**
 * Función que inicializa un arreglo de materias predefinido.
 * @return array
 */
function inicializarArregloMaterias()
{
    //Reemplazar arreglo de codigos de materias por el arreglo predefinido.
    $materias = [0, 0, 0, 0];

    return $materias;
}

/**
 * Crea un arreglo de materias.
 * El índice es igual al número de materia (desde cero a la cantidad de materias - 1).
 * El valor de cada índice es la cantidad de alumnos por materia. Empieza de 0.
 * @param int $cantidad
 * @return array
 */
function crearArregloMaterias($cantidad)
{
    return array_fill(0, $cantidad, 0);
}


/**
 * Crea un arreglo de alumnos con números aleatorios.
 * @param int $cantidadAlumnos, $cantMaterias
 * @return array
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
 * @return void
 */
function mostraralumnos($alumnos)
{
    foreach ($alumnos as $estudiante) {
        echo "Nro de legajo: " . $estudiante["nroLegajo"] . "\n¦-----Codigo materia: " . $estudiante["codigoMateria"] . "\n+-----Nota obtenida: " . $estudiante["notaObtenida"] . "\n\n";
    }
}

/**
 * Función que devuelve un arreglo con todos los estudiantes aprobados en cada materia y los datos respectivos de cada alumno.
 * @param array $alumnos, array $materias
 * @return array
 */
function alumnosAprobadosCadaMateria($alumnos, $materias)
{
    foreach ($alumnos as $alumno) {
        if (gettype($materias[$alumno["codigoMateria"]]) == "integer" && $alumno["notaObtenida"] >= 7) {
            $materias[$alumno["codigoMateria"]] = array();
            $materias[$alumno["codigoMateria"]][] = $alumno;
        } elseif ($alumno["notaObtenida"] >= 7) {
            $materias[$alumno["codigoMateria"]][] = $alumno;
        }
    }

    return $materias;
}

//Ejercicios.

/** 
 * Dada una materia obtener la cantidad de alumnos que rindieron esa materia.
 * @param array $alumnos
 * @return int
 */
function cantAlumnosApobadosMateria($alumnos)
{
    $cantRindiendoMateria = 0;
    $materia = readline("Ingrese la materia a saber cuantos alumnos rindieron: ");

    foreach ($alumnos as $alumno) {
        if ($alumno["codigoMateria"] == $materia) {
            $cantRindiendoMateria++;
        }
    }

    return $cantRindiendoMateria;
}

/**
 * Por cada materia el porcentaje de alumnos que rindieron.
 * @param array $alumnos, $cantAlumnosPorMaterias
 * @return array
 */
function porcentajeAlumnosPorMateria($alumnos, $cantAlumnosPorMaterias)
{
    foreach ($alumnos as $estudiante) {
        if (array_key_exists($estudiante["codigoMateria"], $cantAlumnosPorMaterias)) {
            $cantAlumnosPorMaterias[$estudiante["codigoMateria"]]++;
        }
    }

    $i = 0;
    foreach ($cantAlumnosPorMaterias as $materia => $cantAlumnos) {
        $porcentajeMaterias[$i] = "Código de materia: " . $materia . "\n+-----Porcentaje de alumnos que rindieron: " . round($cantAlumnos / count($alumnos) * 100, 2) . "%\n";
        $i++;
    }

    return $porcentajeMaterias;
}

/**
 * Obtener toda la información del alumno que mayor nota obtuvo por cada materia.
 * @param array $alumnos, $mayoresNotasPorMateria
 * @return array
 */
function mayorNotaPorMateria($alumnos, $mayoresNotasPorMateria)
{
    foreach ($alumnos as $alumno) {
        if (gettype($mayoresNotasPorMateria[$alumno["codigoMateria"]]) == "integer") {
            $mayoresNotasPorMateria[$alumno["codigoMateria"]] = $alumno;
        } elseif ($mayoresNotasPorMateria[$alumno["codigoMateria"]]["notaObtenida"] < $alumno["notaObtenida"]) {
            $mayoresNotasPorMateria[$alumno["codigoMateria"]] = $alumno;
        }
    }

    return $mayoresNotasPorMateria;
}

/**
 * Si una materia se aprueba con una nota >= 7, retornar la cantidad de alumnos aprobados por materia.
 * @param array $alumnos, $cantAprobPorMateria
 * @return array
 */
function alumnosAprobadosPorMateria($alumnos, $cantAprobPorMateria)
{
    foreach ($alumnos as $alumno) {
        if ($alumno["notaObtenida"] >= 7) {
            $cantAprobPorMateria[$alumno["codigoMateria"]]++;
        }
    }

    return $cantAprobPorMateria;
}

/**
 * Dada una materia retornar un arreglo con los alumnos que aprobaron esa materia.
 * @param array $alumnos, $materias, $materia
 * @return array
 */
function alumnosAprobadosEnMateria($alumnos, $materias, $materia)
{
    $aprobMaterias = alumnosAprobadosCadaMateria($alumnos, $materias);

    return $aprobMaterias[$materia];
}

/**
 * Obtener el o los números de legajo de los alumnos que aprobaron más de cuatro materias.
 * @param array $alumnos, $materias
 * @return array
 */
function legajosAprobadosMasDe4Materias($alumnos, $materias)
{
    $aprobPorMaterias = alumnosAprobadosCadaMateria($alumnos, $materias);
    $legajosAprobadoMaterias = array();
    $legajosAprobMas4Materias = array();

    foreach ($aprobPorMaterias as $materia) {
        foreach ($materia as $alumno) {
            if (!key_exists($alumno["nroLegajo"], $legajosAprobadoMaterias)) {
                $legajosAprobadoMaterias[$alumno["nroLegajo"]] = 1;
            } else {
                $legajosAprobadoMaterias[$alumno["nroLegajo"]]++;
            }
        }
    }

    foreach ($legajosAprobadoMaterias as $legajo => $cantMaterias) {
        if ($cantMaterias >= 4) {
            $legajosAprobMas4Materias[] = $legajo;
        }
    }

    return $legajosAprobMas4Materias;
}


/**
 * Dado un número de legajo, obtener un arreglo con las materias aprobadas por ese alumno.
 * @param array $alumnos, $materias
 * @param int $legajo
 * @return array
 */
function materiasAprobadasPorAlumno($alumnos, $materias, $legajo)
{
    $aprobPorMaterias = alumnosAprobadosCadaMateria($alumnos, $materias);
    $materiasAprobadas = array();

    foreach ($aprobPorMaterias as $materia => $alumnos) {
        foreach ($alumnos as $alumno) {
            if ($alumno["nroLegajo"] == $legajo) {
                $materiasAprobadas[] = $materia;
            }
        }
    }

    return $materiasAprobadas;
}

menu();