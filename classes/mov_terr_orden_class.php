<?
class mov_terr_orden{
	private $id_orden;
	private $prov_origen;
	private $prov_destino;
	private $puntos;
	private $campamento;
	private $batalla;
	private $partisanos;
	
	public function __construct($id_orden,$prov_origen,$prov_destino,$puntos,$campamento,$batalla,$partisanos){
		$this->id_orden=$id_orden;
		$this->prov_origen=$prov_origen;
		$this->prov_destino=$prov_destino;
		$this->puntos=$puntos;
		$this->campamento=$campamento;
		$this->batalla=$batalla;
		$this->partisanos=$partisanos;
	}
public function insertBD(){

	$sql = "INSERT INTO mov_terr_orden values ('".$this->id_orden."','".$this->prov_origen."','".$this->prov_destino."','".$this->puntos."','".$this->campamento."','".$this->batalla."','".$this->partisanos."')";
	$result = mysql_query($sql);
}
	

}
?>
