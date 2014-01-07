<?
class mov_heroes_orden{
	private $id_orden;
	private $prov_origen;
	private $prov_destino;
	private $id_heroe;
	private $prov_evento;
		
	public function __construct($id_orden,$prov_origen,$prov_destino,$id_heroe,$prov_evento){
		$this->id_orden=$id_orden;
		$this->prov_origen=$prov_origen;
		$this->prov_destino=$prov_destino;
		$this->id_heroe=$id_heroe;
		$this->prov_evento=$prov_evento;
	}
public function insertBD(){

	$sql = "INSERT INTO mov_heroes_orden values ('".$this->id_orden."','".$this->prov_origen."','".$this->prov_destino."','".$this->id_heroe."','".$this->prov_evento."')";
	$result = mysql_query($sql);
}
	

}
?>
