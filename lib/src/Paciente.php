<?php
class Paciente {
	public $id;
	public $nombre;
	public $apellido;

	public function __construct($id, $nombre, $apellido)
    {  
        if($this->esValido($id, $nombre, $apellido)) {
            $this->id       = $id;
            $this->nombre   = $nombre;
            $this->apellido = $apellido;
        } else {
            throw new Exception('Paciente inválido');
        }
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

    public function esValido($id, $nombre, $apellido){
    	return $id!="" && $nombre!="" && $apellido!="";    	
    }
}
?>