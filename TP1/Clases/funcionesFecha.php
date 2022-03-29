<?php
/**
 * Funcion para comprobar si los dígitos ingresados en el arreglo son de una fecha válida.
 * @param $arregloFecha Arreglo con la fecha separada por dia, mes y año.
 * @return bool
 */
function fechaValida($arreglo)
{
    $valido = false;

    if (is_numeric($arreglo[2]) && is_numeric($arreglo[1]) && is_numeric($arreglo[0])) {
        if (esNDigitos($arreglo[1], 2) && esNDigitos($arreglo[0], 2)) {
            if ($arreglo[1] <= 12 && $arreglo[1] > 0) {
                switch ($arreglo[1]) {
                    case 1:
                    case 3:
                    case 5:
                    case 7:
                    case 8:
                    case 10:
                    case 12:
                        if ($arreglo[0] <= 31 && $arreglo[0] > 0) {
                            $valido = true;
                        }
                        break;
                    case 4:
                    case 6:
                    case 9:
                    case 11:
                        if ($arreglo[0] <= 30 && $arreglo[0] > 0) {
                            $valido = true;
                        }
                        break;
                    default:
                        if (bisiesto($arreglo[2])) {
                            if (29 > $arreglo[0]) {
                                $valido = true;
                            }
                        } else {
                            if (28 > $arreglo[0]) {
                                $valido = true;
                            }
                        }
                }
            }
        }
    }

    return $valido;
}

/**
 * Función para comprobar si un número tiene la cantidad de $n digitos o menos.
 * @param $valor, $n.
 * @return bool
 */
function esNDigitos($valor, $n)
{
    echo "esNDigitos: valor $valor y digitos $n\n";
    echo "esNDigitos: " . (strlen($valor) > 0 && strlen($valor) <= $n) . "\n";
    return strlen($valor) > 0 && strlen($valor) <= $n;
}

/**
 * Función para comprobar si un año es bisiesto.
 * @param $anio.
 * @return bool
 */
function bisiesto($anio)
{
    return ($anio % 4 == 0 && $anio % 100 != 0 || $anio % 400 == 0);
}

/**
 * Función para obtener el nombre del mes.
 * @param $numeromes.
 * @return string
 */
function numeroAMes($numeroMes)
{
    return array(1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre" )[$numeroMes];
}

/**
 * Función para obtener la cantidad máximas de dias que tiene un mes.
 * @param $numeroMes, $anio.
 * @return int
 */
function diasMax($numeroMes, $anio){
    switch ($numeroMes) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            return 31;
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            return 30;
            break;
        default:
            if (bisiesto($anio)) {
                return 29;
            } else {
                return 28;
            }
    }
}