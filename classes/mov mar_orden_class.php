<?
class mov_mar_orden{
	private $id_orden;
	private $prov_origen;
	private $prov_destino;
	private $puntos;
	private $mov_extra;
	private $realizado;
	
	public function __construct($id_orden,$prov_origen,$prov_destino,$puntos,$mov_extra,$realizado){
		$this->id_orden=$id_orden;
		$this->prov_origen=$prov_origen;
		$this->prov_destino=$prov_destino;
		$this->puntos=$puntos;
		$this->mov_extra=$mov_extra;
		$this->realizado=$realizado;
	}
public function insertBD(){

	$sql = "INSERT INTO mov_mar_orden values ('".$this->id_orden."','".$this->prov_origen."','".$this->prov_destino."','".$this->puntos."','".$this->mov_extra."','".$this->realizado."')";
	$result = mysql_query($sql);
}
	

}
?>
