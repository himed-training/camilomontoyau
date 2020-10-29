<?php
require "Fecha.php";
require "Paciente.php";

class Consulta{
	private Paciente $paciente;
	private Fecha $fecha;	

	public function __construct($id, $nombre, $apellido, $fecha)
    {           
        $objFecha = new Fecha($fecha);        
       	$objPaciente = new Paciente($id, $nombre, $apellido);
    }

    public function getPaciente(){
    	return $this->objPaciente;
    }

    public function getFecha(){
    	return $this->objFecha;
    }
}
?>