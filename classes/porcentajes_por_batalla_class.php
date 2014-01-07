<?
class porcentajes_por_batalla{
	private $resultado;
	private $texto;
	private $porcentaje;
	
	public function __construct($resultado,$texto,$porcentaje){
		$this->resultado=$resultado;
		$this->texto=$texto;
		$this->porcentaje=$porcentaje;
	}
	public function getResultado(){
		return $this->resultado;
	}
	public function setResultado($newR){
		$this->resultado=$newR;
	}
	public function getTexto(){
		return $this->texto;
	}
	public function setTexto($newT){
		$this->texto=$newT;
	}
	public function getPorcentaje(){
		return $this->porcentaje;
	}
	public function setPorcentaje($newP){
		$this->porcentaje=$newP;
	}
}

?>
