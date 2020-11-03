<?php
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  require "./src/Consulta.php";

  $data = json_decode(file_get_contents("php://input"));
  
  if(!isset($data->id)) {
    http_response_code(400);
    echo json_encode(array("mensaje"=>"falta el id"));
    exit;
  }

  if(!isset($data->nombre)) {
    http_response_code(400);
    echo json_encode(array("mensaje"=>"falta el nombre"));
    exit;
  }

  if(!isset($data->apellido)) {
    http_response_code(400);
    echo json_encode(array("mensaje"=>"falta el apellido"));
    exit;
  }

  $id = $data->id;
  $nombre = $data->nombre;
  $apellido = $data->apellido;
  $fecha = date("d/m/Y");

  $consulta = new Consulta($id, $nombre, $apellido, $fecha);
  
  if($consulta) {
    http_response_code(200);
    echo json_encode($consulta);
    exit;
  }
  

  

  
  