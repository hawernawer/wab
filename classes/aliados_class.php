<?
class aliados{ //constructores getters and setters creados, damos como turno muerte el 0
	private $id;
	private $nombre;
	private $turno_creacion;
	private $turno_muerte;
	private $habilidades;
	private $coste;
	private $comentarios;
	private $historia;
	private $propietario;
	private $provincia;
	private $equipo;
	private $M,$WS,$BS,$S,$T,$W,$I,$A,$LD;

	
	public function __construct($id,$nombre,$turno_creacion,$turno_muerte,$habilidades,$coste,$comentarios,$historia,$propietario,$provincia,$equipo,$M,$WS,$BS,$S,$T,$W,$I,$A,$LD){
		$this->id=$id;
		$this->nombre=$nombre;
		$this->turno_creacion=$turno_creacion;
		$this->turno_muerte=$turno_muerte;
		$this->habilidades=$habilidades;
		$this->coste=$coste;
		$this->comentarios=$comentarios;
		$this->historia=$historia;
		$this->propietario=$propietario;
		$this->provincia=$provincia;
		$this->equipo=$equipo;
		$this->M=$M;
		$this->WS=$WS;
		$this->BS=$BS;
		$this->S=$S;
		$this->T=$T;
		$this->W=$W;
		$this->I=$I;
		$this->A=$A;
		$this->LD=$LD;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($newN){
		$this->nombre=$newN;
	}
	public function getTurnoCreacion(){
		return $this->turno_creacion;
	}
	public function getTurnoMuerte(){
		return $this->turno_muerte;
	}
	public function setTurnoMuerte($newT){
		$this->turno_muerte=$newT;
	}
	public function getHabilidades(){
		return $this->habilidades;
	}
	public function getCoste(){
		return $this->coste;
	}
	public function setCoste($newC){
		$this->coste=$newC;
	}
	public function getComentarios(){
		return $this->comentarios;
	}
	public function setComentarios($newC){
		$this->comentarios=$newC;
	}
	public function getHistoria(){
		return $this->historia;
	}
	public function setHistoria($newH){
		$this->historia=$newH;
	}
	public function getPropietario(){
		return $this->propietario;
	}
	public function getProvincia(){
		return $this->provincia;
	}
	public function setProvincia($newP){
		$this->provincia=$newP;
	}
	public function getEquipo(){
		return $this->equipo;
	}

	public function insertBD(){
		$sql = "INSERT INTO aliados values ('".$this->nombre."','".$this->turno_creacion."','".$this->turno_muerte."','".$this->habilidades."','".$this->coste."','".$this->comentarios."','".$this->historia."','".$this->propietario."','".$this->provincia."','".$this->equipo."','".$this->M."','".$this->WS."','".$this->BS."','".$this->S."','".$this->T."','".$this->W."','".$this->I."','".$this->A."','".$this->LD."')";
		$result = mysql_query($sql);
	}
	public function updateBD(){
		$sql = "update aliados set nombre = '".$this->nombre."', turno_creacion = '".$this->turno_creacion."',turno_muerte = '".$this->turno_muerte."', habilidades = '".$this->habilidades."', coste = '".$this->coste."',comentarios = '".$this->comentarios."', historia = '".$this->historia."', propietario = '".$this->propietario."', provincia = '".$this->provincia."', equipo = '".$this->equipo."', M = '".$this->M."', WS = '".$this->WS."', BS ='".$this->BS."', S ='".$this->S."', T = '".$this->T."', W = '".$this->W."', I = '".$this->I."', A = '".$this->A."', LD = '".$this->LD."' where id = '".$this->id."' ";
		$result = mysql_query($sql);
	}

}

?>
