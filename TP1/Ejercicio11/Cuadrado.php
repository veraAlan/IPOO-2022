<?php
class Cuadrado
{
    private $vInfIz;
    private $vInfDe;
    private $vSupIz;
    private $vSupDe;

    public function __construct($vInfIz, $vInfDe, $vSupIz, $vSupDe)
    {
        if(count($vInfIz) == 2 && count($vInfDe) == 2 && count($vSupIz) == 2 && count($vSupDe) == 2) {
            $this->vInfIz = $vInfIz;
            $this->vInfDe = $vInfDe;
            $this->vSupIz = $vSupIz;
            $this->vSupDe = $vSupDe;

        } else {
            throw new Exception("Error: Los valores deben ser un arreglo de dos elementos");
        }
    }

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

    public function area()
    {
        $l = $this->getV1()->distancia($this->getV2());
        return ;
    }

    public function desplazar($d)
    {

    }
}
