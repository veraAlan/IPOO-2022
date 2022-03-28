<?php
class Calculadora
{
    private $valor_x;
    private $valor_y;
    private $resultado;

    public function __construct($valor_x, $valor_y)
    {
        if (is_numeric($valor_x) && is_numeric($valor_y)) {
            $this->valor_x = $valor_x;
            $this->valor_y = $valor_y;
        } else {
            throw new ErrorException("Los valores de x e y tienen que ser números reales.");
        }
    }

    public function setValor_x($valor_x)
    {
        $this->valor_x = $valor_x;
    }

    public function setValor_y($valor_y)
    {
        $this->valor_y = $valor_y;
    }

    public function getValor_x()
    {
        return $this->valor_x;
    }

    public function getValor_y()
    {
        return $this->valor_y;
    }

    public function getResultado()
    {
        return $this->resultado;
    }

    public function suma()
    {
        $this->resultado = $this->valor_x + $this->valor_y;
    }

    public function resta()
    {
        $this->resultado = $this->valor_x - $this->valor_y;
    }

    public function multiplicacion()
    {
        $this->resultado = $this->valor_x * $this->valor_y;
    }

    public function division()
    {
        $this->resultado = $this->valor_x / $this->valor_y;
    }

    public function __toString()
    {
        return $this->getResultado();
    }

    public function __destruct()
    {
        echo "Instancia de " . get_class() . " destruida.";
    }
}
