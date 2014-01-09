<?
function getConexiones($origen){
	$sql = "SELECT destino FROM conexiones where origen = '".$origen."'";
	$result = mysql_query($sql);
	$conexiones = Array();
	while($row=mysql_fetch_array($result)){
		$conexiones[]= new conexiones($origen,$row["destino"]);
	
	}
	return $conexiones;
}
function getConexionesLider($origen){
	$conex = getConexiones($origen);
	
	//ahora tengo que recorrer el array y volver a lanzar el metodo tantas veces
	//como destinos encuentre en la primera y en la segunda iteracion
	//revisar porque en los eventos maritimos pasaba algo parecido y alo mejor 
	//se debe hacer una funcion reutilizable, estudialo
}
/**********************************FUNCIONES PROVINCIAS*/
function getProvinciasDB(){ 
		$Puntos_de_provincia = getPuntosporProvinciaBD();
		$Provincias = Array();
		$sql="select * from provincias";
		$result = mysql_query($sql);
	
			while($row=mysql_fetch_array($result)){
				$i = 1;
				$Provincias[] = new Provincia($row["id"],$row["nombre"],$row["accidente_geografico"],$row["propietario"],$row["partisanos"],$row["campamento"],$row["tipo"],$row["x"],$row["y"],$row["comentarios"],$Puntos_de_provincia[$i]);
				$i++;
			}	
			
	
	
}
function getPuntosporProvinciaBD(){
	$sqlpuntos="select * from puntos_por_provincia";
	$resultPuntos = mysql_query($sqlpuntos);
	$prov_actual=0;
	$temp_array = Array();
	$temp_puntos;
	$global_puntos = Array();
	$cont=0;
	while($rowPuntos=mysql_fetch_array($resultPuntos)){
			if($rowPuntos["provincia"]!=$prov_actual){
				$temp_puntos = new Puntos_por_provincia($temp_array,$prov_actual+1);
				$global_puntos[] = $temp_puntos;	
				$prov_actual=$rowPuntos["provincia"];
				$temp_array[$rowPuntos["jugador"]] = $rowPuntos["puntos"];
			}else{
				$temp_array[$rowPuntos["jugador"]] = $rowPuntos["puntos"];
			}
	}
		return $global_puntos;
	
}
function modificarPuntosDeJugadorEnProvincia($jugador,$provincia,$puntos){
	
	$sql="update puntos_por_provincia SET puntos = '".$puntos."' WHERE jugador = '".$jugador."' and provincia = '".$provincia."'";
	echo $sql."<br>";
	$result = mysql_query($sql);

}
function getPuntosJugadorEnProvincia($jugador,$provincia){
	$sql = "SELECT puntos from puntos_por_provincia where jugador = '".$jugador."' and provincia = '".$provincia."'";
	$result = mysql_query($sql);
		if(!$result || !mysql_num_rows($result) ){
			return 0;
		}else{
			return mysql_result($result,0);
		}
	
}
function getPuntosporProvinciaEspecificaBD($Provincia){
	$sqlpuntos="select * from puntos_por_provincia";
	$resultPuntos = mysql_query($sqlpuntos);
	$prov_actual=0;
	$temp_array = Array();
	$temp_puntos;
	$global_puntos = Array();
	$cont=0;
	while($rowPuntos=mysql_fetch_array($resultPuntos)){
			if($rowPuntos["provincia"]!=$prov_actual){
				$temp_puntos = new Puntos_por_provincia($temp_array,$prov_actual+1);
				$global_puntos[] = $temp_puntos;	
				$prov_actual=$rowPuntos["provincia"];
				$temp_array[$rowPuntos["jugador"]] = $rowPuntos["puntos"];
			}else{
				$temp_array[$rowPuntos["jugador"]] = $rowPuntos["puntos"];
			}
	}
		return $global_puntos[$Provincia];

	}
	
function getPropietarioProvincia($provincia){
	$sql = "SELECT propietario FROM provincias where id = '".$provincia."'";
	$propietario= mysql_query($sql);
	return mysql_result($propietario,0);
}
/**********************************************FIN FUNCIONES PROVINCIAS*/

function batallas_por_heroe($nombre){
	$sql = "SELECT id_batalla from heroes_por_batalla where nombre = '".$nombre."'";
	/*devolver un array con un fetch con el listado de batallas*/
}

function getLastOrden(){
	$sql = "SELECT MAX(id) FROM ordenes";
	$turno= mysql_query($sql);
	return mysql_result($turno,0);

}
/***************************FUNCIONES HEROES**********************************/
function cambiarProvinciaHeroe($id,$provincia){
	$sql = "UPDATE heroes set provincia = '".$provincia."' where id = '".$id."'";
	mysql_query($sql);

}
function cambiarProvinciaAliado($id,$provincia){
	$sql = "UPDATE aliados set provincia = '".$provincia."' where id = '".$id."'";
	mysql_query($sql);

}

function getHeroesSinLiderPorJugador($jugador){
	$sql = "SELECT id from heroes where propietario = '".$jugador."' and lider = 0";
	mysql_query($sql);
	$heroes = Array();
	while($row=mysql_fetch_array($result)){
		$heroes[]= $row["id"];
	
	}
		return $heroes;
}

function getLiderEnProvincia($provincia,$jugador){
	$sql = "SELECT id from heroes where propietario = '".$jugador."' and provincia = '".$provincia."'";
	$result = mysql_query($sql);
	$heroes = Array();
	while($row=mysql_fetch_array($result)){
		$heroes[]= $row["id"];
	
	}
		return $heroes;
}
function borrarHeroe($id_heroe){
	$turno = getLastTurno();
	$sql = "UPDATE heroes set turno_muerte = '".$turno."' , propietario = 0 where id= '".$id_heroe."'";
	mysql_query($sql);
}

/***************************FIN FUNCIONES HEROES******************************/
/***************************FUNCIONES ALIADOS_PLANTILLA***********************/
function getAliadosPlantilla(){
	$aliados = Array();
	$sql = "SELECT * FROM aliados_plantilla";
	$result= mysql_query($sql);
	
	while($row=mysql_fetch_array($result)){
			$aliados[] = new aliados_plantilla($row["id"],$row["nombre"],$row["habilidades"],$row["coste"],$row["equipo"],$row["M"],$row["WS"],$row["BS"],$row["S"],$row["T"],$row["W"],$row["I"],$row["A"],$row["LD"]);
				
	}
	return $aliados;
}
function getLastIdAliadosPlantilla(){
	$sql = "SELECT MAX(id) FROM aliados_plantilla";
	$id= mysql_query($sql);
	return mysql_result($id,0);
}
function getCabeceraHTMLAliadoPlantilla(){
	echo "<tr><td>Nombre</td><td>Habilidades</td><td>Coste</td><td>Equipo</td><td>M</td><td>WS</td><td>BS</td><td>S</td><td>T</td><td>W</td><td>I</td><td>A</td><td>LD</td><td>Borrar</td></tr>";
	
}
function deleteAliadoPlantillaPorId($id){
	$sql = "DELETE FROM aliados_plantilla where id = '".$id."'"; 
	$result = mysql_query($sql);

}

/***************************FIN FUNCIONES ALIADOS_PLANTILLA***********************/
/***************************FUNCIONES HEROES_PLANTILLA***********************/

function getLastIdHeroesPlantilla(){
	$sql = "SELECT MAX(id) FROM heroe_plantilla";
	$id= mysql_query($sql);
	
	return mysql_result($id,0);
}
function getHeroesPlantilla(){
	$heroes = Array();
	$sql = "SELECT * FROM heroe_plantilla";
	$result= mysql_query($sql);
	while($row=mysql_fetch_array($result)){
			$heroes[] = new heroe_plantilla($row["id"],$row["nombre"],$row["habilidades"],$row["coste"],$row["equipo"],$row['imperio'],$row["M"],$row["WS"],$row["BS"],$row["S"],$row["T"],$row["W"],$row["I"],$row["A"],$row["LD"]);
				
	}
	return $heroes;
}
function getCabeceraHTMLHeroePlantilla(){
	echo "<tr><td>Nombre</td><td>Habilidades</td><td>Coste</td><td>Equipo</td><td>Imperio</td><td>M</td><td>WS</td><td>BS</td><td>S<td>T</td><td>W</td><td>I</td><td>A</td><td>LD</td><td>Borrar</td></tr>";
	
}
function deleteHeroePlantillaPorId($id){
	$sql = "DELETE FROM heroe_plantilla where id = '".$id."'"; 
	$result = mysql_query($sql);

}
/***************************FIN FUNCIONES HEROES_PLANTILLA***********************/
/***************************FUNCIONES IMPERIO************************************/

function getNombreImperio($imp){
	$sql ="SELECT imperio from imperio where id='".$imp."'";
	$imperio= mysql_query($sql);
	return mysql_result($imperio,0);
	
}
function imprimirValuesSelectImperio(){
	$sql = "SELECT * FROM imperio";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)){
		echo "<option value=\"".$row["id"]."\">".$row["imperio"]."</option>";
	}	
}
/***************************FIN FUNCIONES IMPERIO********************************/
/***************************FUNCIONES ORDENES************************************/
function getLastIdOrden(){
	$sql = "SELECT max(id_orden) from ordenes";
	$orden = mysql_query($sql);
	return mysql_result($orden,0);
}
function realizarDesembarcos(){
	$turno = getLastTurno();
	//hacemos maritimos
	$sql = "SELECT * from mov_mar_orden WHERE turno = '".$turno."' and realizado = 0";
	$result = mysql_query($sql);

	while($row=mysql_fetch_array($result)){
		realizarMovMaritimos($row["id"],$row["propietario"],1);
	}
	//ahora de heroes
	$sql = "SELECT * from mov_heroes_orden WHERE turno = '".$turno."' and realizado = 0";
	$result = mysql_query($sql);

	while($row=mysql_fetch_array($result)){
		realizarMovHeroes($row["id"],$row["propietario"],1);
	}
	//ahora de aliados
	$sql = "SELECT * from mov_aliados_orden WHERE turno = '".$turno."' and realizado = 0";
	$result = mysql_query($sql);

	while($row=mysql_fetch_array($result)){
		realizarMovAliados($row["id"],$row["propietario"],1);
	}
}
function realizarMovimientos($id,$jugador){
	realizarMovTerrestres($id,$jugador);
	realizarMovMaritimos($id,$jugador,0);
	realizarMovHeroes($id,0);
	realizarMovAliados($id,0);
}
//CAMPAMENTO 0 = NO CAMPAMENTO
//CAMPAMENTO 1 = EVENTUAL
//CAMPAMENTO 2 = CIUDAD
function crearCampamento($provincia,$camp,$jugador){
	if($camp==1){
		$sql = "UPDATE provincias set campamento = 'Campamento eventual' where id = '".$provincia."'";
	}elseif($camp==2){
		$sql = "UPDATE provincias set campamento = 'Ciudad' where id = '".$provincia."'";
		CambiarPuntosProvincia($jugador,100,1,$provincia); //restamos los 100 puntos que vale el camp
	}
	mysql_query($sql);
}
//PARTISANOS 0 = NO PARTISANOS
//PARTISANOS 1 = PARTISANOS

function crearPartisanos($provincia,$jugador){
	$sql = "UPDATE provincias set partisanos = '1' where id = '".$provincia."'";
	CambiarPuntosProvincia($jugador,125,1,$provincia); //restamos los 125 puntos que valen los partisanos
	mysql_query($sql);

}
function realizarMovTerrestres($id,$jugador){
	$sql = "SELECT * from mov_terr_orden where id_orden ='".$id."'";
	$result = mysql_query($sql);
	$tmp_puntos_origen = 0;
	$tmp_puntos_destino = 0;
	while ($row = mysql_fetch_array($result)){
	
		CambiarPuntosProvincia($jugador,$row["puntos"],1,$row["prov_origen"]); //restamos puntos en origen
		CambiarPuntosProvincia($jugador,$row["puntos"],0,$row["prov_destino"]); //sumamos puntos en destino
		if($row["campamento"]!=0){
			crearCampamento($row["prov_destino"],$row["campamento"],$jugador);
		}
		if($row["partisanos"]!=0){
			crearPartisanos($row["prov_destino"],$jugador);
		}

	}
}
function realizarMovMaritimos($id,$jugador,$desembarco){
	/* desembarco = 0 NO se puede desembarcar
	 * desembarco = 1 SI se puede desembarcar
	 * 
	 * */
	$sql = "SELECT * from mov_mar_orden where id_orden ='".$id."' and realizado = 0";
	$result = mysql_query($sql);
	$tmp_puntos_origen = 0;
	$tmp_puntos_destino = 0;
	while ($row = mysql_fetch_array($result)){
			if($row["prov_destino"]>75 and $desembarco == 0){
			//marcamos la orden como realizada
			$sql = "UPDATE mov_mar_orden set realizado = 1 where id_orden= '".$row["id_orden"]."' AND prov_origen = '".$row["prov_origen"]."' AND prov_destino = '".$row["destino"]."'";
			mysql_query($sql);
			CambiarPuntosProvincia($jugador,$row["puntos"],1,$row["prov_origen"]); //restamos puntos en origen
			CambiarPuntosProvincia($jugador,$row["puntos"],0,$row["prov_destino"]); //sumamos puntos en destino
		}elseif($desembarco = 1){
			$sql = "UPDATE mov_mar_orden set realizado = 1 where id_orden= '".$row["id_orden"]."' AND prov_origen = '".$row["prov_origen"]."' AND prov_destino = '".$row["destino"]."'";
			mysql_query($sql);
			CambiarPuntosProvincia($jugador,$row["puntos"],1,$row["prov_origen"]); //restamos puntos en origen
			CambiarPuntosProvincia($jugador,$row["puntos"],0,$row["prov_destino"]); //sumamos puntos en destino		
		}
	}
}

function realizarMovHeroes($id,$desembarco){
	/*
	 * desembarco = 0 NO , 1 = SI
	 * */
	$sql = "SELECT * from mov_heroes_orden where id_orden ='".$id." and realizado = 0'";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)){
		if(($row["prov_origen"]>75&&$row["prov_destino"]<76) && $desembarco == 0){
			//no se hace
		}elseif($desembarco == 1 || $row["prov_origen"<76 || $row["prov_destino"]>75){
			cambiarProvinciaHeroe($row["id"],$row["prov_destino"]);
			$sql = "UPDATE mov_heroes_orden set realizado = 1 where id_orden= '".$row["id_orden"]."' AND prov_origen = '".$row["prov_origen"]."' AND prov_destino = '".$row["destino"]."'";
		}
	}
}
function realizarMovAliados($id,$desembarco){
	$sql = "SELECT * from mov_aliados_orden where id_orden ='".$id."' and realizado = 0";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)){
		if(($row["prov_origen"]>75&&$row["prov_destino"]<76) && $desembarco == 0){
			//no se hace
		}elseif($desembarco == 1 || $row["prov_origen"<76 || $row["prov_destino"]>75){
				cambiarProvinciaAliado($row["id"],$row["prov_destino"]);
				$sql = "UPDATE mov_aliados_orden set realizado = 1 where id_orden= '".$row["id_orden"]."' AND prov_origen = '".$row["prov_origen"]."' AND prov_destino = '".$row["destino"]."'";
		}	
	}
}
//ESTA ESTA MAL, EL DESTINO SE TENDRA QUE CAMBIAR DE VERDAD. 
/**
 * Los casos en los que tengo que hacer una modificacion de destino de provincia son:
 * 
 * evento 3: elq ue desembarca aleatoriamente
 * evento 4: el que vuelve a la provincia anterior
 * evento 6: no se puede desembarcar! (este es el unico con mamoneo porque hay que mover de una provincia de tierra a una provincia de mar y que no se vea afectado por el evento de tierra
 * ademas que tendríamos que borrar cualquier batalla que se de! ( o generar las batallas post aleatorios mas bien...)
 * 
 * 
 * hay que buscar la provincia dodne se da el evento, y revisar las mov_mar_orden en busca de esa provincia.
 * 
 * Una vez la tengamos deberiamos actuar segun el evento.
 */
 
 
function cambiarDestinoEvento($provincia,$jugador,$turno){
	//primero tenemos que sacar todas las id_orden del turno
	
	$sql = "SELECT id_orden from ordenes where turno = '".$turno."'";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)){
		//Ahora recorremos esas id_orden en busca de prov_origen y los puntos que se han movido, para hacer un rollback de ellos
		$sql = "SELECT puntos,prov_destino FROM mov_mar_orden where id_orden = '".$row["id_orden"]."' and prov_origen = '".$provincia."' ";
		$result2 = mysql_query($sql);
		//	CambiarPuntosProvincia($propietario,$puntos_jugador,1,$total[$prov_azar]); //restamos puntos en origen

		CambiarPuntosProvincia($jugador,mysql_result($result2,0),1,mysql_result($result2,1));  //restamos puntos en destino original
		CambiarPuntosProvincia($jugador,mysql_result($result2,0),0,$provincia);   //sumamos puntos en origen original
		
	}
	
	
}

/***************************FIN FUNCIONES ORDENES********************************/
/***************************FUNCIONES PROVINCIAS*********************************/

function comprobarPropietario($prov,$prop){
	$sql = "SELECT propietario from provincias where id = '".$prov."'";
	$tmp = mysql_query($sql);
	if($tmp == $prop){
		return true;
	}else{
		return false;
	}
}
function CambiarPuntosProvincia($jugador,$puntos,$operacion,$provincia){
//0 es una suma
//1 es una resta
	$tmp_puntos = getPuntosJugadorEnProvincia($jugador,$provincia);
	if($operacion == 0){
		$tmp_puntos = $tmp_puntos + $puntos;
		echo $jugador.$provincia.$tmp_puntos."<br>";
		modificarPuntosDeJugadorEnProvincia($jugador,$provincia,$tmp_puntos);
	}elseif($operacion == 1){
		$tmp_puntos = $tmp_puntos - $puntos;
		echo $jugador.$provincia.$tmp_puntos."<br>";
		modificarPuntosDeJugadorEnProvincia($jugador,$provincia,$tmp_puntos);
	}
}
function getCampamentoProvincia($provincia){
	$sql ="SELECT campamento from provincias where id='".$provincia."'";
	$campamento= mysql_query($sql);
	return mysql_result($campamento,0);
}
//ESTE METODO HAY QUE PROBARLO PQ NO ME CREO NI YO QUE FURULE XD
function getPuntosEspecialesProvinciaJugador($jugador){
	//$key = array_search('green', $array); // $key = 2;
	$sql = "SELECT coste,provincia from heroes where jugador = '".$jugador."'";
	$result = mysql_query($sql);
	$puntos_en_provincia = Array();
	$provincias_final = Array();
	while($row=mysql_fetch_array($result){
		
		$puntos_en_provincia[][0] = $row["provincia"];
		$puntos_en_provincia[][1] = $row["coste"];
	}
	$sql = "SELECT coste,provincia from aliados where jugador = '".$jugador."'";
	$result = mysql_query($sql);

	while($row=mysql_fetch_array($result){	
		$key = array_search($row["provincia"],$puntos_en_provincia);
		if($key==FALSE){
			$puntos_en_provincia[][0] = $row["provincia"];
			$puntos_en_provincia[][1] = $row["coste"];
		}else{
			$puntos_en_provincia[$key][0] = $row["provincia"];
			$puntos_en_provincia[$key][1] = $puntos_en_provincia[$key][1]+$row["coste"];
		}
		
		
		$coste[$row["provincia"]] = $coste[$row["provincia"]]+$row["coste"];
	}
	foreach($puntos_en_provincia as $puntos){
		if($puntos[1]>299){
			$provincias_final[] = $puntos;
		}
	}
	return $puntos;
}
//EN ESTAS DOS FUNCIONES HAY QUE COMPROBAR QUE EL MERGE FUNCIONA Y QUE PASAR SI DEVUELVE NULL
function getProvinciasMaritimasJugador($jugador){ 
	$provincias = Array();
	$sql = "SELECT provincia from puntos_por_provincia where jugador = '".$jugador."' and provincia > 75 and puntos > 0";
	$result = mysql_query($sql);
	while($row=mysql_fetch_array($result)){
		$provincias[]= $row["provincia"];
	
	}
		$prov_especiales = getPuntosEspecialesProvinciaJugador($jugador);
		return array_unique(array_merge($provincias,$prov_especiales), SORT_REGULAR);
		

}
function getProvinciasTerrestresJugador($jugador){
	$provincias = Array();
	$sql = "SELECT id from provincias where propietario = '".$jugador."' and campamento <2 and id < 76";
	$result = mysql_query($sql);
	while($row=mysql_fetch_array($result)){
		$provincias[]= $row["id"];
	
	}
		$prov_especiales = getPuntosEspecialesProvinciaJugador($jugador);
		return array_unique(array_merge($provincias,$prov_especiales), SORT_REGULAR);

}
function getCapitalesJugador($jugador){
	$provincias = Array();
	$sql = "SELECT id from provincias where propietario = '".$jugador."' and campamento = 2";
	$result = mysql_query($sql);
	while($row=mysql_fetch_array($result)){
		$provincias[]= $row["id"];
	
	}
		return $provincias;

}
function actualizarPuntosProvinciaPorcentaje($provincia,$porcentaje){
	$sql = "UPDATE puntos_por_provincia set puntos = puntos * ".$porcentaje." where provincia = '".$provincia."'";
	mysql_query($sql);
}
function getProvinciasCosteras($provincia){
	$conexiones = Array();
	
	
	$sql = "SELECT destino from conexiones where origen = '".$provincia."'";
	$result = mysql_query($sql);
	while($row=mysql_fetch_array($result)){
		$conexiones[]= $row["destino"];
	
	}
		return $conexiones;
}
function cambiarPropietario($prov_azar,$enemigo_azar){
	$sql = "UPDATE provincias set propietario = '".$enemigo_azar."' WHERE id = '".$prov_azar."'";
	mysql_query($sql);
}

/***********************FIN FUNCIONES PROVINCIAS*********************************/

function getLastIdHeroes(){
	$sql = "SELECT MAX(id) FROM heroes";
	$id= mysql_query($sql);
	return mysql_result($id,0);
}

function getLastIdAliados(){
	$sql = "SELECT MAX(id) FROM aliados";
	$id= mysql_query($sql);
	return mysql_result($id,0);
}
function batallas_por_aliado($nombre){
	$sql = "SELECT id_batalla from aliados_por_batalla where nombre = '".$nombre."'";
	/*devolver un array con un fetch con el listado de batallas*/
}
/***************************FUNCIONES RECURSOS***********************/
function CambiarRecursos($jugador,$recursos,$operacion){
//if operacion 0 es una suma
//if operacion 1 es una resta
	$sql = "SELECT recursos from jugador where id = '".$jugador."'";
	
	$puntos_jugador = mysql_result(mysql_query($sql),0);
	if($operacion==0){
		$puntos_jugador = $puntos_jugador + $recursos;
	}elseif($operacion==1){
		$puntos_jugador = $puntos_jugador - $recursos;

	} 
	$sql = "UPDATE jugador set recursos = '".$puntos_jugador."' where id = ".$jugador."";
	mysql_query($sql);
}
/***************************FIN FUNCIONES RECURSOS***********************/
/***************************FUNCIONES DE TURNO***************************/
function getLastTurno(){
	$sql = "SELECT MAX(turno) FROM estado";
	$turno= mysql_query($sql);
	return mysql_result($turno,0);

}

function avanzarTurnoActual(){
	$last_turno = getLastTurno();
	$sql = "SELECT estado FROM TURNO where turno = '".$last_turno."'";
	$result = mysql_query($sql);
	
	switch($result){
		case 0:
		case 1:
		case 2:
				$estado_final = $result + 1;
				$sql = "UPDATE estado set estado = '".$estado_final."' where turno = '".$last_turno."'";
				$result = mysql_query($sql);
		case 3:
				findeTurno();
			
			break;
	
	}
}	
/***************************FIN FUNCIONES DE TURNO***********************/

?>
