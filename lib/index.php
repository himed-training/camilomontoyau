<?php
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  require "./src/Consulta.php";

  $data = json_decode(file_get_contents("php://input"));
  
  $id = $data->id;
  $nombre = $data->nombre;
  $apellido = $data->apellido;
  $documento = $data->documento;
  $fecha = date("d/m/Y");

  try {
    $consulta = new Consulta($id, $nombre, $apellido, $documento, $fecha);
    if($consulta) {
      http_response_code(200);
      echo json_encode($consulta);
      exit;
    }  
  } catch (Exception $e) {
    $mensaje = $e->getMessage();
    switch($mensaje) {
      case "Paciente inválido":
      case "Falta nombre":
      case "Falta apellido":
      case "Falta id":
      case "Falta documento":
        http_response_code(400);
      break;
      default:
        http_response_code(500);
    }
    
    echo json_encode(array("error"=>$e->getMessage())); 
    exit;
  }
  
  
  
  

  

  
  