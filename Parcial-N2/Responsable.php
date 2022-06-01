 <?php
 class Responsable  {
     private $nombre;
     private $apellido;
     private $nro_documento;
     private $direccion;
     private $email;
     private $telefono;

    // Construct
    function __construct($nombre, $apellido, $nro_documento, $direccion, $email, $telefono) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nro_documento = $nro_documento;
        $this->direccion = $direccion;
        $this->email = $email;
        $this->telefono = $telefono;
     }

     // Setters
     public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
       $this->apellido = $apellido;
   }

   public function setNro_Documento($nro_documento) {
       $this->nro_documento = $nro_documento;
   }

   public function setDireccion($direccion) {
       $this->direccion = $direccion;
   }

   public function setEmail($email) {
       $this->email = $email;
   }

   public function setTelefono($telefono) {
       $this->telefono = $telefono;
   }

     // Getters
     public function getNombre() {
         return $this->nombre;
     }

     public function getApellido() {
        return $this->apellido;
    }

    public function getNro_Documento() {
        return $this->nro_documento;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    // Metodos

    // toString
    public function __toString() {
        return "\nNombre: " . $this->getNombre() . 
        "\nApellido: " . $this->getApellido() . 
        "\nNumero de Documento: " . $this->getNro_Documento() . 
        "\nDireccion: " . $this->getDireccion() . 
        "\nEmail: " . $this->getEmail() . 
        "\nTelefono: " . $this->getTelefono() . "\n";
    }
 }