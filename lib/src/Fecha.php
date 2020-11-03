<?php
class Fecha{
	public $fecha;

	public function __construct($fecha)
    {
        if ($this->fechaEsValida($fecha)){
        	$this->fecha = $fecha;
				} else {
					throw new Exception('Fecha inválida');
				}
		}

	public function fechaCantidadSlash($fecha){
		return substr_count($fecha, '/') == 2;
	}

	public function fechaLongitud($fecha){
		return strlen($fecha) == 10;
	}

	public function cantidadNumerosSegunPosicion($i, $cant, $fecha){
		$texto = explode('/', $fecha);		
		return strlen($texto[$i]) == $cant;
	}

	public function validarMesCorrecto($fecha){
		$texto = explode('/', $fecha);		
		return $texto[1] <= 12;	
	}

	public function bisiesto($fecha) {
		$texto = explode('/', $fecha);
		$a = $texto[2];
    	return ( ($a%4 == 0 && $a%100 != 0) || $a%400 == 0 );
	}
	
	public function diaCorrectoSegunMes($fecha){
		$texto = explode('/', $fecha);		
		if ($texto[0]<=31 && ($texto[1]==1 ||  $texto[1]==3 || $texto[1]==5 || $texto[1]==7 || $texto[1]==8 || $texto[1]==10 || $texto[1]==12)){
			return true;
		}
		if ($texto[0] <= 30 && ($texto[1]==4 ||  $texto[1]==6 || $texto[1]==9 || $texto[1]==11)){
			return true;
		}
		if ($texto[0] <= 28 && $texto[1]==2){
			return true;
		}
		if ($texto[0] == 29 && $this->bisiesto($fecha)==1){
			return true;
		}
		return false;
	}

	public function todosLosNumerosMayoresCero($fecha){
		$texto = explode('/', $fecha);	
		return $texto[0]>0 && $texto[1]>0 && $texto[2]>0;		
	}

	public function fechaFormato($fecha){
		$exp_reg = '/^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/';
		return preg_match($exp_reg, $fecha) == 1;
	}

	public function fechaEsValida($fecha){
        return $this->fechaCantidadSlash($fecha) && $this->fechaLongitud($fecha) && $this->cantidadNumerosSegunPosicion(0, 2, $fecha) && $this->cantidadNumerosSegunPosicion(1, 2, $fecha) 
        && $this->cantidadNumerosSegunPosicion(2, 4, $fecha) && $this->validarMesCorrecto($fecha) && $this->bisiesto($fecha) && $this->diaCorrectoSegunMes($fecha)
        && $this->todosLosNumerosMayoresCero($fecha) && $this->fechaFormato($fecha);
    }
}
?>