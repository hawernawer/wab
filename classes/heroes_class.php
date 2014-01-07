<?
class heroes{ //constructor getter and setter creados
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
	private $lider;
	private $mejoras_de_heroe = Array();
	private $M,$WS,$BS,$S,$T,$W,$I,$A,$LD;
	
	public function __construct($nombre,$turno_creacion,$turno_muerte,$habilidades,$coste,$comentarios,$historia,$propietario,$provincia,$equipo,$lider,$mejoras_de_heroe,$M,$WS,$BS,$S,$T,$W,$I,$A,$LD){
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
		$this->mejoras_de_heroe=$mejoras_de_heroe;
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
	
	public function getLider(){
		return $this->lider;
	}
	public function getMejoras_de_heroe(){
		return $this->mejoras_de_heroe;
	}
	public function setMejoras_de_heroe($newM){
		$this->mejoras_de_heroe=$newM;
	}
	public function getHab_Basicas(){
		$tmp_hab = Array();
		$tmp_hab[] = $this->M;
		$tmp_hab[] = $this->WS;
		$tmp_hab[] = $this->BS;
		$tmp_hab[] = $this->S;
		$tmp_hab[] = $this->T;
		$tmp_hab[] = $this->W;
		$tmp_hab[] = $this->I;
		$tmp_hab[] = $this->A;
		$tmp_hab[] = $this->LD;
		
		return $tmp_hab;
	}
	public function getM(){
		return $this->M;
	}
	public function getWS(){
		return $this->WS;
	}
	public function getBS(){
		return $this->BS;
	}
	public function getS(){
		return $this->S;
	}
	public function getT(){
		return $this->T;
	}
	public function getW(){
		return $this->W;
	}
	public function getI(){
		return $this->I;
	}
	public function getA(){
		return $this->A;
	}
	public function getLD(){
		return $this->LD;
	}
	
	
}


?>
