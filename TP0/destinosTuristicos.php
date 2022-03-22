<?php
/**
 * Menú con el cual llama las funciones el usuario.
 */
function menu(){
    $encuestas = registrarEncuesta();

    do{
        echo    "+———————————————————————————————————————————————————————————————————————————————————————————————————————————————————————+\n".
                "|1. Cantidad de turistas encuestados.\t\t\t\t\t\t\t\t\t\t\t|\n".
                "|2. Porcentaje de Turistas que viajaron a San Martin y Bariloche al menos una vez.\t\t\t\t\t|\n".
                "|3. Nombre y Transporte del turista que viajo más veces a San Martin y el turista que viajó más veces a Bariloche.\t|\n".
                "|4. Promedio del dinero que tienen los turistas para invertir en sus proximas vacaciones.\t\t\t\t|\n".
                "|5. Salir.\t\t\t\t\t\t\t\t\t\t\t\t\t\t|\n".
                "+———————————————————————————————————————————————————————————————————————————————————————————————————————————————————————+\n\n";
        $opcion = readline("Opción: ");
    
        switch($opcion){
            case 1: $resultado = cantidadPersonasEncuestadas($encuestas);
                echo "——————————————————————————————————————————".str_repeat("—", strlen((string)$resultado))."+\n".
                    "La cantidad de personas encuestadas son: ".$resultado.
                    "\n——————————————————————————————————————————".str_repeat("—", strlen((string)$resultado))."+\n\n"; break;
            case 2: $resultado = porcentajeAmbosDestinos($encuestas);
                echo "———————————————————————————————————————————————————————".str_repeat("—", strlen((string)$resultado))."+\n".
                     "Porcentaje de turistas que viajaron a ambos lugares: ".$resultado.
                    "%\n———————————————————————————————————————————————————————".str_repeat("—", strlen((string)$resultado))."+\n\n"; break;
            case 3: echo "+————————————————————————————————————————+\n";
                    print_r(infoPersonas($encuestas));
                    echo "+————————————————————————————————————————+\n\n"; break;
            case 4: $resultado = darPromedio($encuestas);
                echo "————————————————————————————————————————————————————".str_repeat("—", strlen((string)$resultado))."+\n".
                        "Promedio de inversión de los turistas encuestados: ".$resultado.
                        "\n————————————————————————————————————————————————————".str_repeat("—", strlen((string)$resultado))."+\n\n"; break;
            case 5: $opcion = "n"; break;
        }

        $opcion != "n" ? $opcion = readline("Desea realizar otra función? (s/n): ") : null;
    } while ($opcion == "s");

    echo "\nSaliendo del programa...\n\n\t+============================+\n\t Gracias por usar el programa\n\t+============================+";
}

/**
 * Función que realiza encuestas y registra los datos en el array que retorna.
 * @return array
 */
function registrarEncuesta(){
    $encuesta = [];
    $i = 0;

    do{
        $encuesta[$i] = [
            "nombre" => readline("Ingrese el nombre del turista: "),
            "dinero" => readline("Ingrese la cantidad de dinero que tiene: "),
            "cantsanmartin" => readline("Ingrese la cantidad de veces que viajo a San Martin: "),
            "cantbariloche" => readline("Ingrese la cantidad de veces que viajo a Bariloche: "),
            "mediotransporte" => readline("Ingrese el medio de transporte que utiliza para sus vacaciones: ")
        ];
        $i++;

        $otraencuesta = readline("Realizar otra encuesta? (s/n): ");
    } while(strtolower($otraencuesta) == "s");

    return $encuesta;
}

/**
 * Función que devuelve la cantidad de encuestas realizadas.
 * @param array $arreglo
 * @return int
 */
function cantidadPersonasEncuestadas($arreglo){
    return count($arreglo);
}

/**
 * Función que devuelve el porcentaje de turistas que viajaron a ambos San Martin y Bariloche al menos una vez.
 * @param array $arreglo
 * @return float
 */
function porcentajeAmbosDestinos($arreglo){
    $cantAmbosDestinos = 0; $cantPersonas = 0;
    foreach($arreglo as $respEncuesta){
        if($respEncuesta["cantsanmartin"] > 0 && $respEncuesta["cantbariloche"] > 0){
            $cantAmbosDestinos++;
        }
        $cantPersonas++;
    }

    return ($cantAmbosDestinos / $cantPersonas) * 100;
}

/**
 * Functión que devuelve un arreglo con los nombres y transporte de los turistas que viajaron más veces a cada destino.
 * @param array $arreglo
 * @return array
 */
function infoPersonas($arreglo){
    $masVisitasADestino = ["bariloche" => ["nombrePersona" => "", "transporte" => ""], "sanmartin" => ["nombrePersona" => "", "transporte" => ""]];
    $masVisitasBariloche = 0; $masVisitasSanMartin = 0;

    foreach($arreglo as $encuesta){
        if($encuesta["cantsanmartin"] > $masVisitasSanMartin){
            $masVisitasADestino["sanmartin"]["nombrePersona"] = $encuesta["nombre"];
            $masVisitasADestino["sanmartin"]["transporte"] = $encuesta["mediotransporte"];
            $masVisitasSanMartin = $encuesta["cantsanmartin"];
        }
        if($encuesta["cantbariloche"] > $masVisitasBariloche){
            $masVisitasADestino["bariloche"]["nombrePersona"] = $encuesta["nombre"];
            $masVisitasADestino["bariloche"]["transporte"] = $encuesta["mediotransporte"];
            $masVisitasBariloche = $encuesta["cantbariloche"];
        }
    }

    return $masVisitasADestino;
}

/**
 * Función que devuelve el promedio de dinero invertido en las proximas vacaciones de los turistas encuestados.
 * @param array $arreglo
 * @return float
 */
function darPromedio($arreglo){
    $totalDineroTurismo = 0;

    foreach($arreglo as $encuesta){
        $totalDineroTurismo += $encuesta["dinero"];
    }

    return $totalDineroTurismo / cantidadPersonasEncuestadas($arreglo);
}

menu();