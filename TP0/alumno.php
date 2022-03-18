<?php

function crearArregloEstudiantes()
{
    for ($i = 0; $i < 5; $i++) {
        $estudiantes[$i] = array("nroLegajo" => rand(1000, 9999), "codigoMateria" => rand(1, 3), "notaObtenida" => rand(1, 10));
    }

    mostrarEstudiantes($estudiantes);

    return $estudiantes;
}

function mostrarEstudiantes($estudiantes)
{
    foreach ($estudiantes as $estudiante) {
        echo "Nro de legajo: " . $estudiante["nroLegajo"] . " .Codigo materia: " . $estudiante["codigoMateria"] . " .Nota obtenida: " . $estudiante["notaObtenida"] . "\n";
    }
}

//Ejercicios.

/* 
* dada una materia obtener la cantidad de alumnos que rindieron esa materia.
*/
function alumnosPorMateria($estudiantes)
{
    $materia = readline("Ingrese el codigo de la materia: ");
    $cantRindiendoMateria = 0;

    foreach ($estudiantes as $estudiate) {
        if ($estudiate["codigoMateria"] == $materia) {
            $cantRindiendoMateria++;
        }
    }

    return $cantRindiendoMateria;
}

/*
* por cada materia el porcentaje de alumnos que rindieron.
*/
function porcentajeAlumnosPorMateria($estudiantes)
{
    
}

porcentajeAlumnosPorMateria(crearArregloEstudiantes());

/*
* obtener toda la información del alumno que mayor nota obtuvo por cada materia.
*/


/*
* 
*/