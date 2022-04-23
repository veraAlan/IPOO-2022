<?php
class Punto {
    // Atributos
    private $x;
    private $y;

    // Constructor
    public function __construct($x, $y)
    {
        if (is_numeric($y) && is_numeric($x)) {
            $this->x = $x;
            $this->y = $y;
        } else {
            throw new Exception("Los valores deben ser números.");
        }
    }

    // Getters
    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    // Setters
    public function setX($x)
    {
        $this->x = $x;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    // Métodos
    public function distancia($punto)
    {
        $x1 = $this->getX();
        $y1 = $this->getY();
        $x2 = $punto->getX();
        $y2 = $punto->getY();
        return sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
    }

    public function desplazar($punto){
        $x1 = $this->getX();
        $y1 = $this->getY();
        $x2 = $punto->getX();
        $y2 = $punto->getY();
        $this->setX($x1 + $x2);
        $this->setY($y1 + $y2);
        return $this;
    }

    public function __toString()
    {
        return "(" . $this->getX() . ", " . $this->getY() . ")";
    }
}