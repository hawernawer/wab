
<?
class participantes_por_batalla{ 
	private $id_batalla;
	private $jugador;
	private $posicion;
	private $puntos_iniciales;
	private $puntos_finales;
	private $resultado;
	
	public function __construct($id_batalla,$jugador,$posicion,$punto_iniciales,$puntos_finales,$resultado){
		$this->id_batalla=$id_batalla;
		$this->jugador=$jugador;
		$this->posicion=$posicion;
		$this->puntos_iniciales=$puntos_iniciales;
		$this->puntos_finales=$puntos_finales;
		$this->resultado=$resultado;
	}	
	public function getId_Batalla(){
		return $this->id_batalla;
	}
	public function setId_Batalla($newId){
		$this->id_batalla=$newId;
	}
	public function getJugador(){
		return $this->jugador;
	}
	public function setJugador($newJ){
		$this->jugador=$newJ;
	}
	public function getPosicion(){
		return $this->posicion;
	}
	public function setPosicion($newP){
		$this->posicion=$newP;
	}
	public function getPuntosIniciales(){
		return $this->puntos_iniciales;
	}
	public function setPuntosIniciales($newPi){
		$this->puntos_iniciales=$newPi;
	}
	public function getPuntosFinales(){
		return $this->getPuntosFinales;
	}
	public function setPuntosfinales($newPf){
		$this->puntos_finales=$newPf;
	}
	public function getResultado(){
		return $this->resultado;
	}
	public function setResultado($newR){
		$this->resultado=$newR;
	}
}
?>

