<?
class batallas{
	private $id;
	private $provincia;
	private $turno;
	private $report;
	private $terminada;
	private $comentarios;

	public function __construct($provincia,$turno){
		$this->id=getLastidBatalla();
		$this->provincia=$provincia;
		$this->turno=$turno;
		$this->report="";
		$this->terminada=FALSE;
		$this->comentarios="";
	}
	public function getId(){
		return $this->id;
	}
	public function setId($newI){
		$this->nombre=$newI;
	}
	public function getProvincia(){
		return $this->provincia;
	}
	public function setProvincia($newP){
		$this->provincia=$newP;
	}
	public function getTurno(){
		return $this->turno;
	}
	public function setTurno($newT){
		$this->turno=$newT;
	}
	public function getReport(){
		return $this->report;
	}
	public function setReport($newR){
		$this->report=$newR;
	}
	public function getTerminada(){
		return $this->terminada;
	}
	public function setTerminada($newT){
		$this->terminada=$newT;
	}
	public function getComentarios(){
		return $this->comentarios;
	}
	public function setComentarios($newC){
		$this->comentarios=$newC;
	}

}
function getLastidBatalla(){
	$sql = "SELECT MAX(id) FROM batallas";
	$id= mysql_query($sql);
	return $id+1;
}
?>
