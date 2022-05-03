<?php
class Responsable {
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $telefono;

    // Constructor.
    public function __construct($nombre, $apellido, $dni, $direccion, $telefono) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    // Getters.
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    // Setters.
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    // Metodos magicos.
    public function __toString() {
        return "\tNombre: " . $this->nombre . 
        "\n\tApellido: " . $this->apellido . 
        "\n\tDNI: " . $this->dni . 
        "\n\tDireccion: " . $this->direccion . 
        "\n\tTelefono: " . $this->telefono . "\n";
    }
}