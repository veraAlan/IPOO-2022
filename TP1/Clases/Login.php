<?php
class Login
{
    // Atributos
    private $nombreUsuario;
    private $contrasenia;
    private $frase;
    private $ultimasContrasenias = [];

    // Constructor
    public function __construct($nombreUsuario, $contrasenia, $frase)
    {
        $this->setNombreUsuario($nombreUsuario);
        $this->setContrasenia($contrasenia);
        $this->setFrase($frase);
    }

    // Setters
    private function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }

    private function setContrasenia($contrasenia)
    {
        $this->contrasenia = $contrasenia;
    }

    private function setFrase($frase)
    {
        $this->frase = $frase;
    }

    private function setUltimasContrasenias($nuevaContrasenia)
    {
        if (count($this->ultimasContrasenias) == 4) {
            array_shift($this->ultimasContrasenias);
        }
        array_push($this->ultimasContrasenias, $nuevaContrasenia);
    }

    // Getters
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    private function getContrasenia()
    {
        return $this->contrasenia;
    }

    private function getFrase()
    {
        return $this->frase;
    }

    // Métodos
    public function validarContrasenia($validar)
    {
        return $this->getContrasenia() == $validar ? true : false;
    }

    public function cambiarContrasenia($vieja, $nueva, $frase)
    {
        if ($this->validarContrasenia($vieja) && !in_array($nueva, $this->ultimasContrasenias)) {
            $this->setUltimasContrasenias($this->getContrasenia());
            $this->setContrasenia($nueva);
            $this->setFrase($frase);
        } else {
            echo "La contraseña no pudo ser cambiada";
        }
    }

    public function recordar()
    {
        echo "La frase de ayuda es: " . $this->getFrase() . "\n";
    }

    // Método toString debug.
    public function __toString()
    {
        return "Nombre de usuario: " . $this->getNombreUsuario() . "\n" .
            "Contraseña: " . $this->getContrasenia() . "\n" .
            "Frase de ayuda: " . $this->getFrase() . "\n" .
            "Ultimas contraseñas: " . implode(" | ", $this->ultimasContrasenias) . "\n";
    }

    public function __destruct()
    {
        echo "Se ha destruido la instancia de " . get_class() . " de " . $this->getNombreUsuario() . "\n";
    }
}
