<?php
require "Fecha.php";
require "Paciente.php";

class Consulta{
	public $paciente;
	public $fecha;	

	public function __construct($id, $nombre, $apellido, $documento, $fecha)
    {           
        $this->fecha = new Fecha($fecha);
       	$this->paciente = new Paciente($id, $nombre, $apellido, $documento);
    }

    public function getPaciente(){
    	return $this->objPaciente;
    }

    public function getFecha(){
    	return $this->objFecha;
    }
}
?>