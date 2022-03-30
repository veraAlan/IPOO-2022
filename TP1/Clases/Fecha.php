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
    // Atributos
    private $dia;
    private $mes;
    private $anio;

    // Constructor
    public function __construct($dia, $mes, $anio)
    {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
    }

    // Setters
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

    // Getters
    public function getDia()
    {
        return $this->dia;
    }

    public function getMes()
    {
        return $this->mes;
    }

    public function getAnio()
    {
        return $this->anio;
    }

    // Métodos
    public function incremento($diasIncremento, $dia, $mes, $anio)
    {
        $dia += $diasIncremento;
        do {
            $dia -= diasMax($mes, $anio);
            if ($mes == 12) {
                $mes = 1;
                $anio++;
            } else {
                $mes++;
            }
        } while ($dia > diasMax($mes, $anio));
        $this->setDia($dia);
        $this->setMes($mes);
        $this->setAnio($anio);
    }

    // To String
    public function __toString()
    {
        return "Fecha abreviada: " . $this->getDia()  . "/" . $this->getMes() . "/" . $this->getAnio() . "\nFecha extendida: " . $this->dia . " de " . numeroAMes($this->mes) . " de " . $this->anio . "\n";
    }

    // Destructor
    public function __destruct(){
        echo "Instancia de " . get_class() . " destruida.";
    }
}