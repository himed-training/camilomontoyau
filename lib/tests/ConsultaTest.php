<?php
use PHPUnit\Framework\TestCase;

final class ConsultaTest extends TestCase
{
    public function testPuedeCrearConsulta() {
      $consulta = new Consulta('id', 'nombre', 'apellido', '20/02/2020');
      $this->assertInstanceOf(Consulta::class, $consulta);
    }    
}