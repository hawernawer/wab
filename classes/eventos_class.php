<?
class eventos{ 
	private $tipo;
	private $numero;
	private $efecto;
	private $duracion;
	
	public function __construct($tipo,$numero,$efecto,$duracion){
		$this->tipo=$tipo;
		$this->numero=$numero;
		$this->efecto=$efecto;
		$this->duracion=$duracion;
	}
	public function getId(){
		return $this->id;
	}
	public function getTipo(){
		return $this->tipo;
	}
	public function setTipo($newT){
		$this->tipo=$newT;
	}
	public function getNumero(){
		return $this->numero;
	}
	public function setNumero($newN){
		$this->numero=$newN;
	}
	public function getEfecto(){
		return $this->efecto;
	}
	public function setEfecto($newE){
		$this->efecto=$newE;
	}
	public function getDuracion(){
		return $this->duracion;
	}
	public function setDuracion($newD){
		$this->duracion=$newD;
	}
	
	public function insertBD(){

		$sql = "INSERT INTO eventos values ('".$this->tipo."','".$this->numero."','".$this->efecto."','".$this->duracion."')";
		$result = mysql_query($sql);
	}	
	public function updateBD(){
	
		$sql = "update eventos set tipo = '".$this->tipo."', numero = '".$this->numero."', efecto = '".$this->efecto."', equipo = '".$this->duracion."' where id = '".$this->id."' ";
		$result = mysql_query($sql);
	}
	public function deleteBD(){
		$sql = "DELETE FROM eventos where id = '".$this->id."'"; 
		$result = mysql_query($sql);
	}
}
?>
