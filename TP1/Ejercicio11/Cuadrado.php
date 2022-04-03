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
        $this->setV1($v1);
        $this->setV2($v2);
        $this->setV3($v3);
        $this->setV4($v4);
        /* if (count($v1) == 2 && count($v2) == 2 && count($v3) == 2 && count($v4) == 2) {
        $vertices = ordenarVertices($v1, $v2 . $v3 . $v4);
            if (esUnCuadrado()) {
                $this->setV1($vertices[0]);
                $this->setV2($vertices[1]);
                $this->setV3($vertices[2]);
                $this->setV4($vertices[3]);
            } else {
                throw new Exception("Los vertices ingresados no son de un cuadrado.")
            }
        } else {
            throw new Exception("Los valores deben ser un arreglo de dos elementos.");
        } */
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
        return $this->vInfIz;
    }

    public function getV2()
    {
        return $this->vInfDe;
    }

    public function getV3()
    {
        return $this->vSupIz;
    }

    public function getV4()
    {
        return $this->vSupDe;
    }

    // Metodos
    /* public function ordernarVertices($arregloVertices)
    {
    } */

    /* public function area()
    {
        $l = $this->getV1()->distancia($this->getV2());
        return;
    } */

    /* public function desplazar($d)
    {
    } */

    // Funciones magicas
    public function __toString()
    {
        return "[" . $this->getV3()[0] . "] [" . $this->getV4()[0] . "] \n" .
            "[" . $this->getV1()[0] . "] [" . $this->getV2()[0] . "]\n";
    }
}
