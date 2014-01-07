<?
class aliados_plantillas_por_provincia{ 
	private $id_aliado;
	private $provincia;
		
	public function __construct($id_aliado,$provincia){
		$this->id_aliado=$id_aliado;
		$this->provincia=$provincia;
	}
	public function getId_aliado(){
		return $this->id_aliado;
	}
	public function setId_aliado($newI){
		$this->id_aliado=$newI;
	}
	public function getProvincia(){
		return $this->provincia;
	}
	public function setProvincia($newP){
		$this->provincia=$newP;
	}
}


?>
