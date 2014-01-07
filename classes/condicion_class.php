<?
class condicion{
	private $numero;
	private $condicion;
	
	public function __construct($numero,$condicion){
		$this->numero=$numero;
		$this->condicion=$condicion;
	}
	
	public function getNumero(){
		return $this->numero;
	}
	public function setNumero($newN){
		$this->numero=$newN;
	}
	public function getCondicion(){
		return $this->condicion;
	}
	public function setCondicion($newC){
		$this->condicion=$newC;
	}
}
?>
