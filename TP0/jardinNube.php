<?php

/**
 * Función que inicializa un arreglo predefinido.
 * @return array
 */
function inicializarArreglo()
{
    $arreglo = [
        ["nombre" => "Juanito", "tutor" => ["nombre" => "", "apellido" => ""], "fechaNacimiento" => "15-6-2017", "sexo" => "masculino"],
        ["nombre" => "Cucu", "tutor" => ["nombre" => "", "apellido" => ""], "fechaNacimiento" => "22-3-2017", "sexo" => "femenino"],
        ["nombre" => "Pepito", "tutor" => ["nombre" => "", "apellido" => ""], "fechaNacimiento" => "3-2-2017", "sexo" => "masculino"],
        ["nombre" => "Pepa", "tutor" => ["nombre" => "", "apellido" => ""], "fechaNacimiento" => "12-10-2016", "sexo" => "femenino"],
        ["nombre" => "Ricarda", "tutor" => ["nombre" => "", "apellido" => ""], "fechaNacimiento" => "10-2-2018", "sexo" => "femenino"],
    ];

    return $arreglo;
}

/**
 * Función que calcula la edad de una persona en base a su fecha de nacimiento (Formato: dia-mes-año).
 * @param $fechaNacimiento
 * @return int
 */
function calcularEdad($fechaNacimiento)
{
    $fechaActual = date("d-m-Y");
    $fechaNacimiento = strtotime($fechaNacimiento);
    $fechaActual = strtotime($fechaActual);
    $edad = ($fechaActual - $fechaNacimiento) / (60 * 60 * 24 * 365);
    return floor($edad);
}

/**
 * Función que devuelve un arreglo con los nombres, edad y salita de cada alumno.
 * La salita es calculada por el sexo del alumno: femenino -> verde y masculino -> rojo.
 * @param $alumnos
 * @return array
 */
function ordenarSalitas($alumnos)
{
    $alumnoYSalita = [];

    foreach ($alumnos as $alumno) {
        array_push($alumnoYSalita, [
            "nombre" => $alumno["nombre"],
            "edad" => calcularEdad($alumno["fechaNacimiento"]),
            "salita" => ($alumno["sexo"] == "femenino") ? "verde" : "roja"
        ]);
    }

    return $alumnoYSalita;
}

/**
 * Función main.
 */
function main()
{
    $alumnos = ordenarSalitas(inicializarArreglo());

    foreach ($alumnos as $alumno) {
        echo "El alumno " . $alumno["nombre"] . " tiene " . $alumno["edad"] . " años y va a la salita " . $alumno["salita"] . ".\n";
    }
}

main();