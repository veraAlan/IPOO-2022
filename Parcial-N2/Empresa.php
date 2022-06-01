<?php
 class Empresa  {
     private $identificacion;
     private $nombre;
     private $coleccion_viajes;

    // Construct
    /**
     * Construct
     */
     function __construct($identificacion, $nombre, $coleccion_viajes) {
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->coleccion_viajes = $coleccion_viajes;
     }

     // Setters
     public function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }

    public function setNombre($nombre) {
       $this->nombre = $nombre;
   }

   public function setColeccion_Viajes($coleccion_viajes) {
       $this->coleccion_viajes = $coleccion_viajes;
   }

     // Getters
     public function getIdentificacion() {
         return $this->identificacion;
     }

     public function getNombre() {
        return $this->nombre;
    }

    public function getColeccion_Viajes() {
        return $this->coleccion_viajes;
    }

    public function getViajes_String() {
        $string_viajes = "";
        $coleccion = $this->getColeccion_Viajes();
        foreach($coleccion as $viaje) {
            $string_viajes = $string_viajes . $viaje->__toString();
        }

        return $string_viajes;
    }
    
    // Metodos
    /**
     * Busca un viaje por su codigo y retorna dicho viaje
     * @param string $codViaje
     * @return mixed
     */
    public function buscarViaje($codViaje) {
        $arr_viajes = $this->getColeccion_Viajes();
        $viaje = "";
        $i = -1;
        do {
            $i++;
            $viaje = $arr_viajes[$i];
            if ($i == count($arr_viajes) && $viaje->getNumero != $codViaje) {
                $viaje = "No se encontro el viaje.";
            }
        } while($viaje->getNumero != $codViaje || $viaje != "No se encontro el viaje.");

        return $viaje;
    }

    /**
     * Busca un viaje por su codigo y devuelve el importe de dicho viaje.
     * @param int codViaje
     * @param mixed
     */
    public function darCostoViaje($codViaje) {
        $arr_viajes = $this->getColeccion_Viajes();
        $i=-1;
        do {
            $i++;
            $viaje = $arr_viajes[$i];
            if ($i == count($arr_viajes) && $viaje->getNumero != $codViaje) {
                $viaje = "No se encontro el viaje.";
            }
        } while($viaje->getNumero != $codViaje || $viaje != "No se encontro el viaje.");

        if (is_object($viaje)) {
            $importe = $viaje->getImporte;
        } else {
            $importe = $viaje;
        }

        return $importe;
    }

    // toString
    public function __toString() {
        return "\n+==================================" . 
        "\nIdentificacion: " . $this->getIdentificacion() . 
        "\nNombre: " . $this->getNombre() . 
        "\nColleccion de Viajes: " . $this->getViajes_String() . 
        "+===================================\n";
    }
 }