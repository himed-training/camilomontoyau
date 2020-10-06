<?php
use PHPUnit\Framework\TestCase;

final class FechaTest extends TestCase
{
    public function testFechaEsString() {
        $mifecha = new Fecha('20/09/2020');
        $this->assertTrue(is_string($mifecha->fecha));
    }

    public function testFechaTieneDosSlash() {
        $mifecha = new Fecha('20/09/2020');
        $this->assertEquals(substr_count($mifecha->fecha,'/'), 2);
    }

    public function testElTamanioDeFechaEs10() {
        $mifecha = new Fecha('20/09/2020');
        $this->assertEquals(strlen($mifecha->fecha), 10);
    }

    public function testDosDigitosNumericosAntesDelPrimerSlash() {
        $mifecha = new Fecha('20/09/2020');
        $fechaPedazos = explode('/', $mifecha->fecha);
        $this->assertEquals(strlen($fechaPedazos[0]), 2);
        $this->assertTrue(is_numeric($fechaPedazos[0]));
    }
}