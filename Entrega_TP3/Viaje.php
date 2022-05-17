<?php
class Viaje
{
    private $importe;
    private $idavuelta;
    private $destino;
    private $codigo;
    private $cantMaxPasajeros;
    private $pasajeros;
    private $responsable;
    private $tipoViaje;

    /**
     * Constructor
     * @param string $destino
     * @param string $codigo
     * @param int $cantMaxPasajeros
     * @param object $responsable
     * @param float $importe
     * @param int $idavuelta
     */
    public function __construct($destino, $codigo, $cantMaxPasajeros, $responsable, $importe, $idavuelta)
    {
        $this->destino = $destino;
        $this->codigo = $codigo;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->pasajeros = array();
        $this->responsable = $responsable;
        $this->idavuelta = strtolower($idavuelta);
        if (strtolower($idavuelta) == "ambos") {
            $this->importe = $importe * 1.5;
        } else {
            $this->importe = $importe;
        }
    }

    // Setter
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setCantMaxPasajeros($cantMaxPasajeros)
    {
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }

    public function setPasajeros($pasajero)
    {
        $this->pasajeros = $pasajero;
    }

    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    }

    public function setTipoViaje($tipoViaje)
    {
        $this->tipoViaje = $tipoViaje;
    }

    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    public function setIdavuelta($idavuelta)
    {
        $this->idavuelta = $idavuelta;
    }

    // Getter
    public function getDestino()
    {
        return $this->destino;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getCantMaxPasajeros()
    {
        return $this->cantMaxPasajeros;
    }

    public function getResposable()
    {
        return $this->responsable;
    }

    public function getPasajeros()
    {
        return $this->pasajeros;
    }

    public function getTipoViaje()
    {
        return $this->tipoViaje;
    }

    public function getImporte()
    {
        return $this->importe;
    }

    public function getIdavuelta()
    {
        return $this->idavuelta;
    }

    // Métodos
    /**
     * Metodo que devuelve la lista de pasajeros en forma de string de la instancia actual de Viaje.
     * @return string
     */
    private function getStringPasajeros()
    {
        if (count($this->pasajeros) > 0) {
            $stringPasajeros = "Pasajeros: \nNombre Apellido DNI Telefono\n";
            foreach ($this->pasajeros as $pasajero) {
                $stringPasajeros = $stringPasajeros . $pasajero->getNombre() .
                    " " . $pasajero->getApellido() . " " . $pasajero->getDni() .
                    " " . $pasajero->getTelefono() . "\n";
            }
        } else {
            $stringPasajeros = "No hay pasajeros en el viaje";
        }
        return $stringPasajeros;
    }

    /**
     * Metodo que devuelve si hay capacidad para agregar un pasajero a la instancia actual de Viaje.
     * @return bool
     */
    public function hayPasajesDisponible()
    {
        return count($this->pasajeros) < $this->cantMaxPasajeros;
    }

    /**
     * Metodo que agrega un pasajero a la instancia actual de Viaje.
     * @param object $pasajero
     */
    public function agregarPasajero($pasajero)
    {
        $coleccion = $this->getPasajeros();
        array_push($coleccion, $pasajero);
        $this->setPasajeros($coleccion);
    }

    /**
     * Metodo que comprueba la existencia de un pasajero en la instancia actual de Viaje.
     * @param string $dni
     * @return bool
     */
    public function existePasajero($dni)
    {
        foreach ($this->pasajeros as $pasajero) {
            if ($pasajero->getDni() == $dni) {
                return true;
            }
        }
        return false;
    }

    /**
     * Metodo que elimina un pasajero buscandolo por su dni en la instancia actual de Viaje.
     * @param string $dni
     */
    public function eliminarPasajero($dni)
    {
        if ($this->existePasajero($dni)) {
            foreach ($this->pasajeros as $key => $pasajero) {
                if ($pasajero->getDni() == $dni) {
                    unset($this->pasajeros[$key]);
                }
            }
            echo "Se ha eliminado el pasajero de DNI: " . $dni . "\n";
        } else {
            echo "No existe el pasajero.\n";
        }
    }

    // Funciones magicas
    public function __toString()
    {
        return "\nResponsable\n" . $this->getResposable() .
            "\nDestino: " . $this->getDestino() .
            "\nCodigo: " . $this->getCodigo() .
            "\nCantidad maxima de pasajeros: " . $this->getCantMaxPasajeros() .
            "\n" . $this->getStringPasajeros();
    }

    public function __destruct()
    {
        return "Instancia de viaje a " . $this->getDestino() . " destruida.\n";
    }
}
