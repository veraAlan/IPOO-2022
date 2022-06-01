<?php
class Nacional extends Viaje {
    private $descuento = 10;

    function __construct($destino, $hora_llegada, $hora_partida, $numero, $monto_base, $fecha, $asientos_totales, $asientos_disponibles, $responsable) {
        parent::__construct($destino, $hora_llegada, $hora_partida, $numero, $monto_base, $fecha, $asientos_totales, $asientos_disponibles, $responsable);
    }

     // Setters
     public function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

     // Getters
     public function getDescuento() {
        return $this->descuento;
    }

    // Metodos
     /**
     * Calcula el importe del viaje.
     * @return float 
     */
    public function calcularImporteViaje() {
        $m_base =  $this->getMonto_Base();
        $asientos_vendidos =  $this->getAsientos_Totales() -  $this->getAsientos_Disponibles();
        $asientos_totales =  $this->getAsientos_Totales();
        $descuento = $this->getDescuento();

        return ($m_base + ($m_base * ($asientos_vendidos / $asientos_totales))) * ($descuento * 0.01);
    }

    // toString
    function __toString() {
        return "\nViaje Nacional." . 
        "\nDescuento: " . $this->getDescuento() .
        Viaje::__toString() . "\n";
    }
}