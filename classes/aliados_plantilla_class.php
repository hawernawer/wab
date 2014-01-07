<?
class aliados_plantilla{
	private $id;
	private $nombre;
	private $habilidades;
	private $coste;
	private $equipo;
	private $M,$WS,$BS,$S,$T,$W,$I,$A,$LD;
	
	public function __construct($id,$nombre,$habilidades,$coste,$equipo,$M,$WS,$BS,$S,$T,$W,$I,$A,$LD){
		$this->id=$id;
		$this->nombre=$nombre;
		$this->habilidades=$habilidades;
		$this->coste=$coste;
		$this->equipo=$equipo;
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
	public function getId(){
		return $this->id;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($newN){
		$this->nombre=$newN;
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
	public function getEquipo(){
		return $this->equipo;
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

	
	
public function insertBD(){

	$sql = "INSERT INTO aliados_plantilla values ('".$this->id."','".$this->nombre."','".$this->habilidades."','".$this->coste."','".$this->equipo."','".$this->M."','".$this->WS."','".$this->BS."','".$this->S."','".$this->T."','".$this->W."','".$this->I."','".$this->A."','".$this->LD."')";
	$result = mysql_query($sql);
}
public function updateBD(){
	
	$sql = "update aliados_plantilla set nombre = '".$this->nombre."', habilidades = '".$this->habilidades."', coste = '".$this->coste."', equipo = '".$this->equipo."', M = '".$this->M."', WS = '".$this->WS."', BS ='".$this->BS."', S ='".$this->S."', T = '".$this->T."', W = '".$this->W."', I = '".$this->I."', A = '".$this->A."', LD = '".$this->LD."' where id = '".$this->id."' ";
	$result = mysql_query($sql);
}

public function echoHTML(){

	echo "<tr><td>".$this->nombre."</td><td>".$this->habilidades."</td><td>".$this->coste."</td><td>".$this->equipo."</td><td>".$this->M."<td>".$this->WS."</td><td>".$this->BS."</td><td>".$this->S."</td><td>".$this->T."</td><td>".$this->W."</td><td>".$this->I."</td><td>".$this->A."</td><td>".$this->LD."</td><td><a href=\"../forms/form_aliados_plantilla.php?id=".$this->id."&funcion=1\"><img src=\"../img/delete.png\"  width=\"18\" height=\"18\" alt=\"Borrar\"/></a></td></tr>";
}

}
?>
