<?php
class Internacional extends Viaje {
    private $documentacion_extra;
    private $impuestos = 45;

    function __construct($destino, $hora_llegada, $hora_partida, $numero, $monto_base, $fecha, $asientos_totales, $asientos_disponibles, $responsable, $documentacion_extra) {
        parent::__construct($destino, $hora_llegada, $hora_partida, $numero, $monto_base, $fecha, $asientos_totales, $asientos_disponibles, $responsable);
        $this->documentacion_extra = $documentacion_extra;
     }

     // Setters
     public function setDocumentacion_Extra($documentacion_extra) {
        $this->documentacion_extra = $documentacion_extra;
    }

    public function setImpuestos($impuestos) {
        $this->impuestos = $impuestos;
    }

     // Getters
     public function getDocumentacion_Extra() {
        return $this->documentacion_extra;
    }

    public function getImpuestos() {
        return $this->impuestos;
    }

    // Metodos
     /**
     * Calcula el importe del viaje.
     * @return float 
     */
    public function calcularImporteViaje() {
        $m_base =  $this->getMonto_Base();
        $asientos_vendidos = $this->getAsientos_Totales() - $this->getAsientos_Disponibles();
        $asientos_totales =  $this->getAsientos_Totales();
        $impuestos = $this->getImpuestos();

        return ($m_base + ($m_base * ($asientos_vendidos / $asientos_totales))) * ($impuestos * 0.01);
    }

    // toString
    function __toString() {
        return "\nViaje Internacional." . 
        "\nSe Requiere Documentacion Extra: " . $this->getDocumentacion_Extra() .
        "\nImpuestos: " . $this->getImpuestos() .
        Viaje::__toString() . "\n";
    }
}