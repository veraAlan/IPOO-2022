<?php
 class Terminal  {
     private $denominacion;
     private $direccion;
     private $coleccion_empresas;

    // Construct
    function __construct($denominacion, $direccion, $coleccion_empresas) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccion_empresas = $coleccion_empresas;
     }

     // Setters
     public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }

    public function setDireccion($direccion) {
       $this->direccion = $direccion;
   }

   public function setColeccion_Empresas($coleccion_empresas) {
       $this->coleccion_empresas = $coleccion_empresas;
   }

     // Getters
     public function getDenominacion() {
         return $this->denominacion;
     }

     public function getDireccion() {
        return $this->direccion;
    }

    public function getColeccion_Empresas() {
        return $this->coleccion_empresas;
    }

    public function getEmpresas_String() {
        $string_empresas = "";
        $coleccion = $this->getColeccion_Empresas();
        foreach($coleccion as $empresa) {
            $string_empresas = $string_empresas . $empresa->__toString();
        }

        return $string_empresas;
    }
    
    // Metodos
    /**
     * Retorna un string con todos los viajes de menor valor de cada empresa.
     * @return string
     */
    public function darViajeMenorValor() {
        $empresas = $this->getColeccion_Empresas();
        $viaje_eco = null;
        $viajes_economicos = [];
        foreach($empresas as $empresa) {
            $importe_eco = 9999999999999999999;
            foreach($empresa->getColeccion_Viajes() as $viaje) {
                if($viaje->calcularImporteViaje() < $importe_eco) {
                    $viaje_eco = $viaje;
                    $importe_eco = $viaje->calcularImporteViaje();
                }
            }
            array_push($viajes_economicos, $viaje_eco);
        }

        return $viajes_economicos;
    }

    // toString
    public function __toString() {
        return "\nDenominacion: " . $this->getDenominacion() . 
        "\nDireccion: " . $this->getDireccion() . 
        "\nColleccion de Empresas: " . $this->getEmpresas_String() . "\n";
    }
 }