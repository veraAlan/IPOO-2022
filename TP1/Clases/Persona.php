<?php
class Persona
{
    private $nombre;
    private $edad;
    private $altura;

    public function __construct($nombre, $edad, $altura)
    {
        if (is_string($nombre)) {
            $this->nombre = $nombre;
            if (is_numeric($edad) && $edad > 0 && is_numeric($altura) && $altura > 0) {
                $this->edad = $edad;
                $this->altura = $altura;
            } else {
                throw new ErrorException("Edad y altura tienen que ser números positivos.");
            }
        } else {
            throw new ErrorException("Nombre tiene que ser una cadena de carteres.");
        }
    }

    private function getNombre()
    {
        return $this->nombre;
    }

    private function getEdad()
    {
        return $this->edad;
    }

    private function getAltura()
    {
        return $this->altura;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    private function setEdad($edad)
    {
        $this->edad = $edad;
    }

    private function setAltura($altura)
    {
        $this->altura = $altura;
    }

    public function cumplirAnios()
    {
        $this->edad++;
    }

    public function crecerAltura($centimetros)
    {
        $this->altura += $centimetros;
    }

    public function __toString()
    {
        return $this->nombre . " de " . $this->edad . " años y mide " . $this->altura . " cm.\n";
    }

    public function __destruct()
    {
        return $this . " instancia destruida, no hay referencias a este objeto. \n";
    }
}
