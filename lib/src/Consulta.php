<?php
require "Fecha.php";
require "Paciente.php";

class Consulta{
	private $objPaciente;
	private $objFecha;	

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

    public function consultaEsValida(){
        $id = "1";
        $nombre = "Juan";
        $apellido = "Perez";
        $fecha = "01/02/2020";
        $objFecha = new Fecha($fecha);        
        $objPaciente = new Paciente($id, $nombre, $apellido);
        return $objPaciente->pacienteEsValido($id, $nombre, $apellido) && $objFecha->fechaEsValida($fecha);
    }
}
?>