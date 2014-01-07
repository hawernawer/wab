<?
class eventos_por_provincia{ 
	private $provincia;
	private $turno_inicio;
	private $turno_fin;
	private $numeroE;
	private $tipoE;
		
	public function __construct($provincia,$turno_inicio,$turno_fin,$numeroE,$tipoE){
		$this->provincia=$provincia;
		$this->turno_inicio=$turno_inicio;
		$this->turno_fin=$turno_fin;
		$this->numeroE=$numeroE;
		$this->tipoE=$tipoE;
	}
	public function getProvincia(){
		return $this->provincia;
	}
	public function setProvincia($newP){
		$this->provincia=$newP;
	}
	public function getTurno_inicio(){
		return $this->turno_inicio;
	}
	public function setTurno_inicio($newTi){
		$this->turno_inicio=$newTi;
	}
	public function getTurno_fin(){
		return $this->turno_fin;
	}
	public function setTurno_fin($newTf){
		$this->turno_fin=$newTf;
	}
	public function getEvento(){
		return $this->evento;
	}
	public function setEvento($newE){
		$this->evento=$newE;
	}
}
	
?>
