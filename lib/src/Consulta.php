<?php
class Consulta
{
    public $fecha;
    public $paciente;


    public function __construct($paciente) {
        $nuevaFecha = date('dd/mm/yyyy');
        $this->fecha = new Fecha($nuevaFecha);
        $this->paciente = new Paciente($paciente);
    }
}