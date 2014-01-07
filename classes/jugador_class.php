<?
class jugador{ //constructor, getters and setters creados
	private $id;
	private $nombre;
	private $imperio;
	private $vn;
	private $vd;
	private $vm;
	private $e;
	private $dn;
	private $dd;
	private $dm;
	private $email;
	private $recursos;
	private $condicion;
	private $color;
	private $jugador_objetivo;
	
	public function __construct($id,$nombre,$imperio,$vn,$vd,$vm,$e,$dn,$dd,$dm,$email,$recursos,$condicion,$color,$jugador_objetivo){
			$this->id=$id;
			$this->nombre=$nombre;
			$this->imperio=$imperio;
			$this->vn=$vn;
			$this->vd=$vd;
			$this->vm=$vm;
			$this->e=$e;
			$this->dn=$dn;
			$this->dd=$dd;
			$this->dm=$dm;
			$this->email=$email;
			$this->recursos=$recursos;
			$this->condicion=$condicion;
			$this->color=$color;
			$this->jugador_objetivo=$jugador_objetivo;
			$this->provincia=$provincia;
	}
	public function getId(){
		return $this->id;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($newN){
		$this->nombre=$newN;
	}
	public function getImperio(){
		return $this->imperio;
	}
	
	public function getVn(){
		return $this->vn;
	}
	public function setVN($newVn){
		$this->vn=$newVn;
	}
	public function getVd(){
		return $this->vd;
	}
	public function setVd($newVd){
		$this->vd=$newVd;
	}
	public function getVm(){
		return $this->vm;
	}
	public function setVm($newVm){
		$this->vm=$newVm;
	}
	public function getE(){
		return $this->e;
	}
	public function setE($newE){
		$this->e=$newE;
	}
	public function getDn(){
		return $this->dn;
	}
	public function setDn($newDn){
		$this->dn=$newDn;
	}
	public function getDd(){
		return $this->dd;
	}
	public function setDd($newDd){
		$this->dd=$newDd;
	}
	public function getDm(){
		return $this->dm;
	}
	public function setDm($newDm){
		$this->dm=$newDm;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getRecursos(){
		return $this->recursos;
	}
	public function setRecursos($newR){
		$this->recursos=$newR;
	}
	public function getCondicion(){
		return $this->condicion;
	}
	public function setCondicion($newC){
	     $this->condicion = $newC;
	}
	public function getColor(){
		return $this->color;
	}
	public function getJugadorObjetivo(){
		return $this->jugador_objetivo;
	}
	public function setJugadorObjetivo($newJ){
		$this->jugador_objetivo=$newJ;
	}
	

	
}

?>
