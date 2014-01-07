<?
class mov_aliados_orden{
	private $id_orden;
	private $prov_origen;
	private $prov_destino;
	private $id_aliado;
	private $prov_evento;
		
	public function __construct($id_orden,$prov_origen,$prov_destino,$id_aliado,$prov_evento){
		$this->id_orden=$id_orden;
		$this->prov_origen=$prov_origen;
		$this->prov_destino=$prov_destino;
		$this->id_aliado=$id_aliado;
		$this->prov_evento=$prov_evento;
	}
public function insertBD(){

	$sql = "INSERT INTO mov_aliados_orden values ('".$this->id_orden."','".$this->prov_origen."','".$this->prov_destino."','".$this->id_aliado."','".$this->prov_evento."')";
	$result = mysql_query($sql);
}
	

}
?>
