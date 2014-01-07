<?

class Provincia{ 
 private $id;
 private $nombre;
 private $accidente_geografico;
 private $propietario;
 private $partisanos;
 private $campamento;
 private $tipo;
 private $x;
 private $y;
 private $comentarios;
 private $puntos;
 
 public function __construct($Id,$Nombre,$Acc,$Prop,$Part,$Camp,$Tip,$X,$Y,$Com,$Pun){
	$this->id=$Id;
	$this->nombre=$Nombre;
	$this->accidente_geografico=$Acc;
	$this->propietario=$Prop;
	$this->partisanos=$Part;
	$this->campamento=$Camp;
	$this->tipo=$Tip;
	$this->x=$X;
	$this->y=$Y;
	$this->comentarios=$Com;
	$this->puntos=$Pun;
 }
 public function getId() {
	return $this->id;
	
 }
 public function getNombre() {
	 return $this->nombre;
 }
 public function getAccidente_geografico(){
	return $this->accidente_geografico;
 }
 public function getPropietario(){
	
	return $this->propietario;
 }
 public function setPropietario($Propietario){
	 $this->propietario =$Propietario;
 }
 public function getPartisanos(){
	return $this->partisanos;
 }
 public function setPartisanos($Partisanos){
	 $this->partisanos = $Partisanos;
 }
 public function getTipo(){
	return $this->tipo;
 }
 public function getX(){
	return $this->x;
 }
 public function getY(){
	return $this->y;
 }
 public function getComentarios(){
	return $this->comentarios;
 }
 public function setComentarios($Comentarios){
	$this->comentarios=$Comentarios;
 }
 public function getPuntos(){
	return $this->puntos;
 }
 public function setPuntos($Puntos){
	$this->puntos=$Puntos;
 }

}



?>
