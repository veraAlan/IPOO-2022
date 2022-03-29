Diseñar e implementar la clase Fecha. La clase deberá disponer de los atributos mínimos y
necesarios para almacenar el día, el mes y el año, además de métodos que devuelvan un String con la
fecha en forma abreviada (16/02/2000) y extendida (16 de febrero de 2000) . Implementar una función
incremento, que reciba como parámetros un entero y una fecha, que retorne una nueva fecha, resultado
de incrementar la fecha recibida por parámetro en el numero de días definido por el parámetro entero.
Nota 1: Son años bisiestos los múltiplos de cuatro que no lo son de cien, salvo que lo sean de
cuatrocientos, en cuyo caso si son bisiestos.
Nota 2: Para la solución de este problema puede ser útil definir un método incrementa_un_dia.

<?php
include "funcionesFecha.php";

class Fecha
{
    private $dia;
    private $mes;
    private $anio;

    public function __construct($fecha)
    {
        $arregloFecha = explode("-", $fecha, 3);
        if (fechaValida($arregloFecha)) {
            $this->setDia($arregloFecha[0]);
            $this->setMes($arregloFecha[1]);
            $this->setAnio($arregloFecha[2]);
        } else {
            throw new ErrorException("Formato ingresado invalido. Formato adecuado: (dd-mm-AAAA)");
        }
    }

    public function setDia($dia)
    {
        $this->dia = $dia;
    }

    public function setMes($mes)
    {
        $this->mes = $mes;
    }

    public function setAnio($anio)
    {
        $this->anio = $anio;
    }

    public function incremento($dias, $fecha)
    {
        $arregloFecha = explode("-", $fecha, 3);
        $arregloFecha[0] += $dias;
        do {
            $arregloFecha[0] -= diasMax($arregloFecha[1], $arregloFecha[2]);
            if ($arregloFecha[1] == 12) {
                $arregloFecha[1] = 1;
                $arregloFecha[2]++;
            } else {
                $arregloFecha[1]++;
            }
        } while ($arregloFecha[0] > diasMax($arregloFecha[1], $arregloFecha[2]));
        $this->setDia($arregloFecha[0]);
        $this->setMes($arregloFecha[1]);
        $this->setAnio($arregloFecha[2]);
    }

    public function __toString()
    {
        return "Fecha abreviada: " . $this->dia  . "/" . $this->mes . "/" . $this->anio . "\nFecha extendida: " . $this->dia . " de " . numeroAMes($this->mes) . " de " . $this->anio . "\n";
    }
}
