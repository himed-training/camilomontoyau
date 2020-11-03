<?php
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

final class ConsultaTest extends TestCase
{
    public function testPuedeCrearConsulta() {
      $consulta = new Consulta('id', 'nombre', 'apellido', '20/02/2020');
      $this->assertInstanceOf(Consulta::class, $consulta);
    }

    public function testPostCrearConsulta() {
      $client = new Client();
      $response = $client->post('http://localhost', [
        'json' => [ 
          'id'=> 'id',
          'nombre'=> 'nombre',
          'apellido'=> 'apellido'
        ]
      ]);
      $this->assertEquals($response->getStatusCode(), 200);
      $json_consulta = json_decode($response->getBody());
      $this->assertEquals($json_consulta->paciente->nombre, 'nombre');
      $this->assertEquals($json_consulta->paciente->apellido, 'apellido');
      $this->assertEquals($json_consulta->paciente->id, 'id');
      $this->assertEquals($json_consulta->fecha->fecha, date("d/m/Y"));
    }    
}