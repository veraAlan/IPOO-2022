<?php
function fechaValida($arreglo)
{
    $valido = false;

    if (is_numeric($arreglo[2]) && is_numeric($arreglo[1]) && is_numeric($arreglo[0])) {
        //FIXME Can't get pass through next if condition. The function may be the problem.
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
                        if (febreroBisiesto($arreglo[2])) {
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

function esNDigitos($valor, $n)
{
    return strlen($valor) > 0 && strlen($valor) < $n;
}

function febreroBisiesto($anio)
{
    return ($anio % 4 == 0 && $anio % 100 != 0 || $anio % 400 == 0);
}
