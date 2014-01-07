<?
class ordenes{
	private $turno;
	private $id;
	private $propietario;
	private $comentarios;
	private $fecha;
	
	public function __construct($turno,$id,$propietario,$comentarios,$fecha){
		$this->turno=$turno;
		$this->id=$id;
		$this->propietario=$propietario;
		$this->comentarios=$comentarios;
		$this->fecha=$fecha;
	}
	public function getTurno(){
		return $this->turno;
	}
	public function setTurno($newT){
		$this->turno=$newT;
	}
	public function getId(){
		return $this->id;
	}
	public function setId($newI){
		$this->id=$newI;
	}
	public function getPropietario(){
		return $this->propietario;
	}
	public function setPropietario($newP){
		$this->propietario=$newP;
	}
	public function getComentarios(){
		return $this->comentarios;
	}
	public function setComentarios($newC){
		$this->comentarios=$newC;
	}
	public function getFecha(){
		return $this->fecha;
	}
	public function setFecha($newF){
		$this->fecha=$newF;
	}
	public function insertBD(){
		$sql = "INSERT INTO ordenes values ('".$this->turno."','".$this->id."','".$this->propietario."','".$this->comentarios."','".$this->fecha."')";
		$result = mysql_query($sql);
	}
}
function getOrdenBD($id){
	$sql = "SELECT * FROM ordenes where id = '".$id."'";
	$orden= mysql_query($sql);
	return $orden; //esto falla seguro, habra que hacer un fetch, crear un objeto orden y rellenarlo a mano antes de devolverlo
}
?>
