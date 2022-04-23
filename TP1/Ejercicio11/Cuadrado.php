<?php
class Cuadrado
{
    // Atributos
    private $vInfIz;
    private $vInfDe;
    private $vSupIz;
    private $vSupDe;

    // Constructor
    public function __construct($v1, $v2, $v3, $v4)
    {
        $vertices = array($v1, $v2, $v3, $v4);

        $vertices = $this->ordenarVertices($vertices);
        try {
            if ($this->esCuadrado($vertices)) {
                $this->vInfIz = $vertices[0];
                $this->vInfDe = $vertices[1];
                $this->vSupIz = $vertices[2];
                $this->vSupDe = $vertices[3];
            } else {
                throw new Exception("Los vertices no forman un cuadrado.");
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Setters
    public function setV1($vInfIz)
    {
        $this->vInfIz = $vInfIz;
    }

    public function setV2($vInfDe)
    {
        $this->vInfDe = $vInfDe;
    }

    public function setV3($vSupIz)
    {
        $this->vSupIz = $vSupIz;
    }

    public function setV4($vSupDe)
    {
        $this->vSupDe = $vSupDe;
    }

    // Getters
    public function getV1()
    {
        return $this->vInfIz->getX() . "," . $this->vInfIz->getY();
    }

    public function getV2()
    {
        return $this->vInfDe->getX() . "," . $this->vInfDe->getY();
    }

    public function getV3()
    {
        return $this->vSupIz->getX() . "," . $this->vSupIz->getY();
    }

    public function getV4()
    {
        return $this->vSupDe->getX() . "," . $this->vSupDe->getY();
    }

    // Metodos
    private function ordenarVertices($vertices)
    {
        function cmp($a, $b)
        {
            if ($a->getX() == $b->getX() && $a->getY() == $b->getY()) {
                return 0;
            }

            return ($a->getX() < $b->getX()) ? -1 : 1;
        };

        uasort($vertices, 'cmp');

        return array_values($vertices);
    }

    private function esCuadrado($vertices)
    {
        $v1 = $vertices[0];
        $v2 = $vertices[1];
        $v3 = $vertices[2];
        $v4 = $vertices[3];

        if ($v1->getX() == $v1->getY() && $v4->getX() == $v4->getY()) {
            if ($v1->getX() == $v2->getX() && $v3->getX() == $v4->getX() && $v1->getY() == $v3->getY() && $v2->getY() == $v4->getY()) {
                return true;
            }
        }

        return false;
    }

    public function area()
    {
        $lado = $this->vInfIz->distancia($this->vInfDe);
        return $lado * $lado;
    }

    public function desplazar($d)
    {
        
    }
    
    // Funciones magicas
    public function __toString()
    {
        return "Cuadrado:\n[" . $this->getV3() . "] [" . $this->getV4() . "] \n" .
            "[" . $this->getV1() . "] [" . $this->getV2() . "]\n" .
            "Area: " . $this->area() . "\n";
    }
}
