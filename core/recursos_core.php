<?
include '../includes.php';
include '../classes/methods.php';
$turno = getLastTurno();
$sql = "SELECT * from recursos WHERE turno = '".$turno."'";
$result = mysql_query($sql);
	while($row=mysql_fetch_array($result)){
		
		if($row["provincia"]==0){//0 significa que acumula recursos
			CambiarRecursos($row["propietario"],$row["puntos"],0);
		}else{ //lo que falta por hacer es que todo esto vaya en un bucle de mysql_fetch_array
			/*$puntos_tmp = getPuntosJugadorEnProvincia($row["jugador"],$row["provincia"]) + $row["puntos"];
			modificarPuntosDeJugadorEnProvincia($row["propietario"],$row["provincia"],$puntos_tmp);*/
			CambiarPuntosProvincia($row["propietario"],$row["puntos"],0,$row["provincia"]); //sumamos puntos a la provincia

	}
				
	
	
}
?>
