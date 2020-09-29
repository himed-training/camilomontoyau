<?php
use PHPUnit\Framework\TestCase;

final class FechaTest extends TestCase
{
    public function testFechaEsString() {
        $mifecha = new Fecha('20/09/2020');
        $this->assertTrue(is_string($mifecha->fecha));
    }
}