<?
class recursos{

	private $turno;
	private $propietario;
	private $provincia;
	private $puntos;
	
	public function __construct($turno,$propietario,$provincia,$puntos){
		$this->turno=$turno;
		$this->propietario=$propietario;
		$this->provincia=$provincia;
		$this->puntos=$puntos;
	}
	public function getTurno(){
		return $this->turno;
	}
	public function setTurno($newT){
		$this->turno=$newT;
	}
	public function getPropietario(){
		return $this->propietario;
	}
	public function setPropietario($newP){
		$this->propietario=$newP;
	}
	
	public function getProvincia(){
		return $this->provincia;
	}
	public function setProvincia($newP){
		$this->provincia=$newP;
	}
	public function getPuntos(){
		return $this->puntos;
	}
	public function setPuntos($newPu){
		$this->puntos=$newPu;
	}
	public function insertBD(){

		$sql = "SELECT INTO recursos values ('".$this->turno."','".$this->propietario."','".$this->provincia."','".$this->puntos."')";
		$result = mysql_query($sql);
	}


}
?>
