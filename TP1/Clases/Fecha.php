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
            $this->dia = $arregloFecha[0];
            $this->mes = $arregloFecha[1];
            $this->anio = $arregloFecha[2];
        } else {
            throw new ErrorException("Formato ingresado invalido. Formato adecuado: (dd-mm-AAAA)");
        }
    }

    public function __toString()
    {
        echo "Fecha: " . $this->dia  . " " . $this->mes . " " . $this->anio . "\n";
    }
}
