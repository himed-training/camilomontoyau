<?php
use PHPUnit\Framework\TestCase;

final class PacienteTest extends TestCase
{
    public function testAtributosValidos() {
      $paciente = new Paciente('id', 'nombre', 'apellido');
      $this->assertTrue($paciente->nombreValido('nombre'));
      $this->assertTrue($paciente->apellidoValido('apellido'));
      $this->assertTrue($paciente->idValido('id'));
    }    
}