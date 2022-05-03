<?php
class Viaje {
    private $destino;
    private $hora_partida;
    private $hora_llegada;
    private $numero;
    private $importe;
    private $fecha;
    private $cantidad_asientos_totales;
    private $cantidad_asientos_disponibles;
    private $responsable;

    // Constructor.
    public function __construct($destino, $hora_partida, $hora_llegada, $numero, $importe, $fecha, $cantidad_asientos_totales, $cantidad_asientos_disponibles, $responsable) {
        $this->destino = $destino;
        $this->hora_partida = $hora_partida;
        $this->hora_llegada = $hora_llegada;
        $this->numero = $numero;
        $this->importe = $importe;
        $this->fecha = $fecha;
        $this->cantidad_asientos_totales = $cantidad_asientos_totales;
        $this->cantidad_asientos_disponibles = $cantidad_asientos_disponibles;
        $this->responsable = $responsable;
    }

    // Getters.
    public function getDestino() {
        return $this->destino;
    }

    public function getHoraPartida() {
        return $this->hora_partida;
    }

    public function getHoraLlegada() {
        return $this->hora_llegada;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getImporte() {
        return $this->importe;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getCantidadAsientosTotales() {
        return $this->cantidad_asientos_totales;
    }

    public function getCantidadAsientosDisponibles() {
        return $this->cantidad_asientos_disponibles;
    }

    public function getResponsable() {
        return $this->responsable;
    }

    // Setters.
    public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function setHoraPartida($hora_partida) {
        $this->hora_partida = $hora_partida;
    }

    public function setHoraLlegada($hora_llegada) {
        $this->hora_llegada = $hora_llegada;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setImporte($importe) {
        $this->importe = $importe;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setCantidadAsientosTotales($cantidad_asientos_totales) {
        $this->cantidad_asientos_totales = $cantidad_asientos_totales;
    }

    public function setCantidadAsientosDisponibles($cantidad_asientos_disponibles) {
        $this->cantidad_asientos_disponibles = $cantidad_asientos_disponibles;
    }

    public function setResponsable($responsable) {
        $this->responsable = $responsable;
    }

    // Metodos.
    public function asignarAsientosDisponibles($catAsientos) {
        if ($this->getCantidadAsientosDisponibles() >= $catAsientos) {
            $this->setCantidadAsientosDisponibles($this->getCantidadAsientosDisponibles() - $catAsientos);
            $asignado = true;
        } else {
            $asignado = false;
        }

        return $asignado;
    }

    // Metodos magicos.
    public function __toString() {
        return "\tDestino: " . $this->getDestino() . 
        "\n\tHora de partida: " . $this->getHoraPartida() . 
        "\n\tHora de llegada: " . $this->getHoraLlegada() . 
        "\n\tNumero: " . $this->getNumero() . 
        "\n\tImporte: " . $this->getImporte() . 
        "\n\tFecha: " . $this->getFecha() . 
        "\n\tCantidad de asientos totales: " . $this->getCantidadAsientosTotales() . 
        "\n\tCantidad de asientos disponibles: " . $this->getCantidadAsientosDisponibles() . 
        "\n\tResponsable:\n" . $this->getResponsable() . "\n";
    }
}