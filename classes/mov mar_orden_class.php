<?
class mov_mar_orden{
	private $id_orden;
	private $prov_origen;
	private $prov_destino;
	private $puntos;
	private $mov_extra;
	private $prov_evento;
	
	public function __construct($id_orden,$prov_origen,$prov_destino,$puntos,$mov_extra,$prov_evento){
		$this->id_orden=$id_orden;
		$this->prov_origen=$prov_origen;
		$this->prov_destino=$prov_destino;
		$this->puntos=$puntos;
		$this->mov_extra=$mov_extra;
		$this->prov_evento=$prov_evento;
	}
public function insertBD(){

	$sql = "INSERT INTO mov_mar_orden values ('".$this->id_orden."','".$this->prov_origen."','".$this->prov_destino."','".$this->puntos."','".$this->mov_extra."','".$this->prov_evento."')";
	$result = mysql_query($sql);
}
	

}
?>
