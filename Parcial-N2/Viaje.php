<?php
 class Viaje  {
     private $destino;
     private $hora_llegada;
     private $hora_partida;
     private $numero;
     private $monto_base;
     private $fecha;
     private $asientos_totales;
     private $asientos_disponibles;
     private $responsable;

    // Construct
    /**
     * Construct de la clase Viaje
     * @param string $destino
     * @param string $hora_llegada
     * @param string $hora_partida
     * @param int $numero
     * @param float $monto_base
     * @param string $fecha
     * @param int $asientos_totales
     * @param int $asientos_disponibles
     * @param object $responsable
     * @return void
     */
     function __construct($destino, $hora_llegada, $hora_partida, $numero, $monto_base, $fecha, $asientos_totales, $asientos_disponibles, $responsable) {
        $this->destino = $destino;
        $this->hora_llegada = $hora_llegada;
        $this->hora_partida = $hora_partida;
        $this->numero = $numero;
        $this->monto_base = $monto_base;
        $this->fecha = $fecha;
        $this->asientos_totales = $asientos_totales;
        $this->asientos_disponibles = $asientos_disponibles;
        $this->responsable = $responsable;
     }

     // Setters
     public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function setHora_Llegada($hora_llegada) {
       $this->hora_llegada = $hora_llegada;
   }

   public function setHora_Partida($hora_partida) {
       $this->hora_partida = $hora_partida;
   }

   public function setNumero($numero) {
       $this->numero = $numero;
   }

   public function setMonto_Base($monto_base) {
       $this->monto_base = $monto_base;
   }

   public function setFecha($fecha) {
       $this->fecha = $fecha;
   }

    public function setAsientos_Totales($asientos_totales) {
        $this->asientos_totales = $asientos_totales;
    }

    public function setAsientos_Disponibles($asientos_disponibles) {
        $this->asientos_disponibles = $asientos_disponibles;
    }

    public function setResponsable($responsable) {
        $this->responsable = $responsable;
    }

     // Getters
     public function getDestino() {
         return $this->destino;
     }

     public function getHora_Llegada() {
        return $this->hora_llegada;
    }

    public function getHora_Partida() {
        return $this->hora_partida;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getMonto_Base() {
        return $this->monto_base;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getAsientos_Totales() {
        return $this->asientos_totales;
    }

    public function getAsientos_Disponibles() {
        return $this->asientos_disponibles;
    }

    public function getResponsable() {
        return $this->responsable;
    }

    // toString
    public function __toString() {
        return "\nDestino: " . $this->getDestino() .
        "\nHora de Llegada: " . $this->getHora_Llegada() . 
        "\nHora de Partida: " . $this->getHora_Partida() . 
        "\nNumero: " . $this->getNumero() . 
        "\nMonto Base: " . $this->getMonto_Base() . 
        "\nFecha: " . $this->getFecha() . 
        "\nAsientos Totales: " . $this->getAsientos_Totales() . 
        "\nAsientos Disponibles" . $this->getAsientos_Disponibles() . "\n";
    }
 }