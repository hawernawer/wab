<?
class estado{ 
	private $turno;
	private $estado;
		
	public function __construct($turno,$estado){
		$this->turno=$turno;
		$this->estado=$estado;
	}
	public function getTurno(){
		return $this->turno;
	}
	public function setTurno($newT){
		$this->turno=$newT;
	}
	public function getEstado(){
		return $this->estado;
	}
	public function setEstado($newE){
		$this->estado=$newE;
	}
	
	
	public function insertBD(){
		$sql = "INSERT INTO estado values ('".$this->turno."','".$this->estado."')";
		$result = mysql_query($sql);
	}
	public function updateBD(){
		$sql = "update estado set estado = '".$this->estado."' where turno = '".$this->turno."' ";
		$result = mysql_query($sql);
	}
}


?>
