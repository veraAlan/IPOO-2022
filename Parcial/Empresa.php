<?php
class Empresa
{
    private $identificacion;
    private $nombre;
    private array $coleccion_viajes;

    // Constructor.
    public function __construct($identificacion, $nombre)
    {
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->coleccion_viajes = [];
    }

    // Getters.
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getColeccion_viajes()
    {
        return $this->coleccion_viajes;
    }

    // Setters.
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setColeccion_viajes($coleccion_viajes)
    {
        $this->coleccion_viajes = $coleccion_viajes;
    }

    // Metodos.
    public function darViajeADestino($elDestino, $cantAsientos)
    {
        $coleccion_a_destino = array();
        foreach ($this->getColeccion_viajes() as $viaje) {
            if ($viaje->getDestino() == $elDestino) {
                if ($viaje->asignarAsientosDisponibles($cantAsientos)) {
                    array_push($coleccion_a_destino, $viaje);
                }
            }
        }

        return $coleccion_a_destino;
    }

    public function incorporarViaje($objViaje)
    {
        $coleccion = $this->getColeccion_viajes();
        foreach ($coleccion as $viaje) {
            if ($viaje->getDestino() == $objViaje->getDestino() && $viaje->getFecha() == $objViaje->getFecha() && $viaje->getHoraPartida() == $objViaje->getHoraPartida()) {
                return false;
            }
        }
        array_push($coleccion, $objViaje);
        $this->setColeccion_viajes($coleccion);
        return true;
    }

    public function venderViajeADestino($canAsientos, $destino)
    {
        $coleccion = $this->getColeccion_viajes();
        foreach ($coleccion as $viaje) {
            if ($viaje->getDestino() == $destino) {
                if ($viaje->asignarAsientosDisponibles($canAsientos)) {
                    $viaje_a_destino = $viaje;
                    return $viaje_a_destino;
                }
            }
        }

        return null;
    }

    public function montoRecaudado()
    {
        $monto = 0;
        $coleccion = $this->getColeccion_viajes();
        foreach ($coleccion as $viaje) {
            $asientosVendidos = $viaje->getCantidadAsientosTotales() - $viaje->getCantidadAsientosDisponibles();
            $monto += $asientosVendidos * $viaje->getImporte();
        }

        return $monto;
    }

    public function viajesString(){
        $string = "";
        foreach ($this->getColeccion_viajes() as $viaje) {
            $string .= $viaje->__toString();
        }

        return $string;
    }

    // Metodos magicos.
    public function __toString()
    {
        return "Identificacion: " . $this->getIdentificacion() .
            "\nNombre: " . $this->getNombre() .
            "\nColeccion de viajes:\n" . $this->viajesString() . "\n";
    }
}
