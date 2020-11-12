<?php
class Paciente {
	public $id;
	public $nombre;
    public $apellido;
    public $documento;

	public function __construct($id, $nombre, $apellido, $documento)
    {  
        if(!$this->nombreValido($nombre)) {
            throw new Exception('Falta nombre');
        } 
        if(!$this->apellidoValido($apellido)) {
            throw new Exception('Falta apellido');
        } 
        if(!$this->idValido($id)) {
            throw new Exception('Falta id');
        }
        if(!$this->DocumentoValido($documento)) {
            throw new Exception('Falta documento');
        }
        $this->id       = $id;
        $this->nombre   = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
    }

    public function getId() {
        return $this -> id;
    }

    public function getNombre() {
        return $this -> nombre;
    }

    public function getApellido() {
        return $this -> apellido;
    }

    public function getDocumento() {
        return $this -> documento;
    }

    public function nombreValido ($nombre) {
        return strlen($nombre) > 0;
    }

    public function idValido ($id) {
        return strlen($id) > 0;
    }

    public function apellidoValido ($apellido) {
        return strlen($apellido) > 0;
    }

    public function DocumentoValido ($documento) {
        return strlen($documento) > 0;
    }
}
?>