<?php
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

final class ConsultaTest extends TestCase
{
    public function testPuedeCrearConsulta() {
      $consulta = new Consulta('id', 'nombre', 'apellido', 'documento', '20/02/2020');
      $this->assertInstanceOf(Consulta::class, $consulta);
    }

    public function testPostCrearConsulta() {
      $client = new Client();
      $response = $client->post('http://localhost', [
        'json' => [ 
          'id'=> 'id',
          'nombre'=> 'nombre',
          'apellido'=> 'apellido',
          'documento'=> 'documento'
        ]
      ]);
      $this->assertEquals($response->getStatusCode(), 200);
      $json_consulta = json_decode($response->getBody());
      $this->assertEquals($json_consulta->paciente->nombre, 'nombre');
      $this->assertEquals($json_consulta->paciente->apellido, 'apellido');
      $this->assertEquals($json_consulta->paciente->id, 'id');
      $this->assertEquals($json_consulta->paciente->documento, 'documento');
      $this->assertEquals($json_consulta->fecha->fecha, date("d/m/Y"));
    }    
    
    public function testPostCrearConsultaMuestraErrorSinId() {
      $client = new Client();
      try {
        $response = $client->post('http://localhost', [
          'json' => [ 
            'id'=> '',
            'nombre'=> 'nombre',
            'apellido'=> 'apellido',
            'documento'=> 'documento'
          ]
        ]);
      } catch (Exception $error) {
        $mensaje = $error->getMessage();
        $this->assertTrue(strlen(strstr($mensaje, 'Falta id')) > 0);
        $this->assertTrue(strlen(strstr($mensaje, '400')) > 0);
      }
    }
    
    public function testPostCrearConsultaMuestraErrorSinNombre() {
      $client = new Client();
      try {
        $response = $client->post('http://localhost', [
          'json' => [ 
            'id'=> 'id',
            'nombre'=> '',
            'apellido'=> 'apellido',
            'documento'=> 'documento'
          ]
        ]);
      } catch (Exception $error) {
        $mensaje = $error->getMessage();
        $this->assertTrue(strlen(strstr($mensaje, 'Falta nombre')) > 0);
        $this->assertTrue(strlen(strstr($mensaje, '400')) > 0);
      }
    }

    public function testPostCrearConsultaMuestraErrorSinApellido() {
      $client = new Client();
      try {
        $response = $client->post('http://localhost', [
          'json' => [ 
            'id'=> 'id',
            'nombre'=> 'nombre',
            'apellido'=> '',
            'documento'=> 'documento'
          ]
        ]);
      } catch (Exception $error) {
        $mensaje = $error->getMessage();
        $this->assertTrue(strlen(strstr($mensaje, 'Falta apellido')) > 0);
        $this->assertTrue(strlen(strstr($mensaje, '400')) > 0);
      }
    }

    public function testPostCrearConsultaMuestraErrorSinDocumento() {
      $client = new Client();
      try {
        $response = $client->post('http://localhost', [
          'json' => [ 
            'id'=> 'id',
            'nombre'=> 'nombre',
            'apellido'=> 'apellido',
            'documento'=> ''
          ]
        ]);
      } catch (Exception $error) {
        $mensaje = $error->getMessage();
        $this->assertTrue(strlen(strstr($mensaje, 'Falta documento')) > 0);
        $this->assertTrue(strlen(strstr($mensaje, '400')) > 0);
      }
    }
}