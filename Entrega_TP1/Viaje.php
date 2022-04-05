<?php
class Viaje
{
    private $destino;
    private $codigo;
    private $cantMaxPasajeros;
    private $pasajeros;

    /**
     * Constructor
     * @param string $destino
     * @param string $codigo
     * @param int $cantMaxPasajeros
     */
    public function __construct($destino, $codigo, $cantMaxPasajeros)
    {
        $this->setDestino($destino);
        $this->setCodigo($codigo);
        $this->setCantMaxPasajeros($cantMaxPasajeros);
        $this->pasajeros = array();
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

    public function setPasajero($pasajero)
    {
        $nuevoPasajero = ["Nombre" => $pasajero->getNombre(), "Apellido" => $pasajero->getApellido(), "DNI" => $pasajero->getDni()];
        array_push($this->pasajeros, $nuevoPasajero);
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

    public function getPasajeros()
    {
        return $this->getStringPasajeros();
    }

    // Métodos
    /**
     * Metodo que devuelve la lista de pasajeros en forma de string de la instancia actual de Viaje.
     * @return string
     */
    private function getStringPasajeros()
    {
        if (count($this->pasajeros) > 0) {
            $stringPasajeros = "Pasajeros: \nNombre Apellido DNI\n";
            foreach ($this->pasajeros as $pasajero) {
                $stringPasajeros = $stringPasajeros . $pasajero["Nombre"] . " " . $pasajero["Apellido"] . " " . $pasajero["DNI"] . "\n";
            }
        } else {
            $stringPasajeros = "No hay pasajeros en el viaje";
        }
        return $stringPasajeros;
    }

    /**
     * Metodo que devuelve si hay capacidad para agregar un pasajero a la instancia actual de Viaje.
     */
    public function hayCapacidad()
    {
        return count($this->pasajeros) < $this->cantMaxPasajeros;
    }

    /**
     * Metodo que agrega un pasajero a la instancia actual de Viaje.
     * @param object $pasajero
     */
    public function agregarPasajero($pasajero)
    {
        if ($this->hayCapacidad()) {
            $this->setPasajero($pasajero);
            echo "Pasajero " . $pasajero->getNombre() . " " . $pasajero->getApellido() . " agregado\n";
        }
    }

    /**
     * Metodo que comprueba la existencia de un pasajero en la instancia actual de Viaje.
     * @param string $dni
     * @return bool
     */
    public function existePasajero($dni)
    {
        foreach ($this->pasajeros as $pasajero) {
            if ($pasajero["DNI"] == $dni) {
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
                if ($pasajero["DNI"] == $dni) {
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
        return "\n+=======================================+" .
            "\nDestino: " . $this->getDestino() .
            "\nCodigo: " . $this->getCodigo() .
            "\nCantidad maxima de pasajeros: " . $this->getCantMaxPasajeros() .
            "\n" . $this->getStringPasajeros() .
            "\n+=======================================+\n";
    }

    public function __destruct()
    {
        return "Instancia de viaje a " . $this->getDestino() . " destruida.\n";
    }
}
