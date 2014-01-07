<?php
$turno = getLastTurno();
function getD6(){
	return rand(1,6);
}
function getD100(){
	return rand(1,100);
}
function getD4(){
	return rand(1,4);
}
function eventoSinNovedad($provincia){
	global $turno;
	actualizarEventoProvincia($provincia,0,0,$turno,$turno);
}
function actualizarEventoProvincia($provincia,$tipoE,$numeroE,$turno_inicio,$turno_fin){
	$sql = "INSERT into eventos_por_provincia values ('".$provincia."','".$turno_inicio."','".$turno_fin."','".$numeroE."','".$tipoE."') on duplicate key update turno_fin = '".$turno_fin."', numeroE = '".$numeroE."', tipoE = '".$tipoE."' ";
	echo $sql."<br>";
	mysql_query($sql);
	
}
	

function crearEventoPendiente($propietario,$provincia,$tipoE,$numeroE,$tipo){
	global $turno;
	
	//TIPO ES 0 batallas 1 recursos
	$sql = "INSERT into eventos_pendientes (propietario,provincia_evento,turno_creacion,tipoE,numeroE,realizado) values ('".$propietario."','".$provincia."','".$turno."','".$tipoE."','".$numeroE."',0)";
	mysql_query($sql);
}
function eventoAltercadosCiudad($provincia){
	//HACER LUEGO
	$puntos = getPuntosporProvinciaEspecificaBD($provincia);
	actualizarEventoProvincia($provincia,TIPOE,6,$turno,$turno);

}
?>
