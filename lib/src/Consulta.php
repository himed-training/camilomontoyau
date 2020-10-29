<?php
require "Fecha.php";
require "Paciente.php";

class Consulta{
	public $paciente;
	public $fecha;	

	public function __construct($id, $nombre, $apellido, $fecha)
    {           
        $this->fecha = new Fecha($fecha);        
       	$this->paciente = new Paciente($id, $nombre, $apellido);
    }

    public function getPaciente(){
    	return $this->objPaciente;
    }

    public function getFecha(){
    	return $this->objFecha;
    }
}
?>