<?
class posicion_por_batalla{ 
	private $posicion;
	private $texto;
		
	public function __construct($posicion,$texto){
		$this->posicion=$posicion;
		$this->texto=$texto;
	}
	public function getPosicion(){
		return $this->posicion;
	}
	public function setPosicion($newP){
		$this->posicion=$newP;
	}
	public function getTexto(){
		return $this->texto;
	}
	public function setTexto($newT){
		$this->texto=$newT;
	}
}


?>
