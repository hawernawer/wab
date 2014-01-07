<?
class Puntos_por_provincia{ 
	private $puntos_por_jugador = Array();
	private $provincia;
	public function __construct($puntos_por_jugador,$provincia){
		$this->puntos_por_jugador=$puntos_por_jugador;
		$this->provincia=$provincia;
	}
	public function getPuntos_por_jugador(){
		return $this->puntos_por_jugador;
	}
	public function setPuntos($newP){
		$this->puntos=$newP;
	}
	public function getProvincia(){
		return $this->provincia;
	}
	
}

?>
