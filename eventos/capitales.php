<?
include '../includes.php';
include '../classes/methods.php';
include 'dados.php';
define ("TIPOE",4);
$tirada;
for($propietario=1;$propietario<3;$propietario++){
	//por ahora hacemos un 1 to 4, deberiamos hacer un recorrido real, sobre el ID de jugadores
	$provincias = getCapitalesJugador($propietario);
	foreach($provincias as $provincia) {
		$tirada = getD6()+getD6()+getD6();
		realizarTiradaCapital($tirada,$provincia,$propietario);
	}
}	
function realizarTiradaCapital($tirada,$provincia,$propietario){
	switch($tirada){
			case -1:
			case 0:
			case 1:
			case 2:
			case 3:
				eventoTraidores($provincia,$propietario);
				break;
			case 4:
				eventoMagnicidio($provincia,$propietario);
				break;
			case 5:
				eventoRevueltasImperio($provincia);
				break;
			case 6:
				eventoRumoresCiudad($provincia);
				break;
			case 7:
			case 8:
				eventoEscenario($provincia,$propietario);
				break;
			case 9:
			case 10:
			case 11:
			case 12:
			case 13:
				eventoSinNovedad($provincia);
				break;
			case 14:
				eventoExploradores($provincia,$propietario);
				break;
			case 15:
				eventoTodosAmamosLider($provincia,$propietario);
				break;
			case 16:
				eventoEyeOfTheTiger($provincia);
				break;
			case 17:
				eventoSeHaceMayor($provincia,$propietario);
				break;
			case 18:
				eventoTodosQueremosSer($provincia,$propietario);
				break;
		}
}
function eventoTraidores($provincia,$propietario){
	global $turno;
	$total = getProvinciasTerrestresJugador($propietario);
	$prov_azar = rand(0,count($total)-1);
	$enemigo_azar = rand(1,4);

	$conexiones= getConexiones($provincia);
	$prov_destino_azar = rand(0,count($conexiones)-1);
	$puntos_jugador = getPuntosJugadorEnProvincia($propietario,$provincia);

	cambiarPropietario($total[$prov_azar],$enemigo_azar);
	CambiarPuntosProvincia($propietario,$puntos_jugador,1,$total[$prov_azar]); //restamos puntos en origen
	CambiarPuntosProvincia($propietario,$puntos_jugador,0,$conexiones[$prov_destino_azar]); //sumamos puntos en destino
	actualizarEventoProvincia($provincia,TIPOE,3,$turno,$turno);

}
function eventoTraidorEjercito($provincia,$propietario){
	global $turno;
	CambiarRecursos($propietario,100,1);
	perderHeroeAleatorio($propietario);
	actualizarEventoProvincia($provincia,TIPOE,4,$turno,$turno);
	
}
function eventoRevueltasImperio($provincia,$propietario){
	global $turno;
	$provincias = getProvinciasTerrestresJugador($propietario);
	$provincia_aleatoria = rand(0,count($provincias)-1);
	
	eventoAltercadosCiudad($provincias[$provincia_aleatoria]);
	actualizarEventoProvincia($provincia,TIPOE,5,$turno,$turno);

}
function eventoRumoresCiudad($provincia,$propietario){
	global $turno;
	$tirada = getD6()+getD6()+getD6()-1;
    realizarTiradaCapital($tirada,$provincia,$propietario);
	actualizarEventoProvincia($provincia,TIPOE,6,$turno,$turno);

}
function eventoEscenario($provincia,$propietario){
	global $turno;
	//ESTE ES EL ULTIMO QUE HARE
	crearEventoEscenario($propietario);
	actualizarEventoProvincia($provincia,TIPOE,7,$turno,$turno);

}
function eventoExploradores($provincia,$propietario){
	global $turno;
	crearEventoPendiente($propietario,$provincia,TIPOE,14,0);
	actualizarEventoProvincia($provincia,TIPOE,14,$turno,0);
}
function eventoTodosAmamosLider($provincia,$propietario){
	global $turno;
	$provincias = getProvinciasTerrestresJugador($propietario);
	$provincia_aleatoria = rand(0,count($provincias)-1);
	crearPartisanos($provincias[$provincia_aleatoria],$propietario);//Esto habrá que loguearlo..
	CambiarRecursos($propietario,100,0);
	actualizarEventoProvincia($provincia,TIPOE,15,$turno,$turno);

}
function eventoEyeOfTheTiger($provincia){
	global $turno;
	crearEventoPendiente($propietario,$provincia,TIPOE,16,1);
	actualizarEventoProvincia($provincia,TIPOE,16,$turno,0);
}
function eventoSeHaceMayor($provincia,$propietario){
	
	global $turno;
	crearEventoPendiente($propietario,$provincia,TIPOE,17,1);
	CambiarRecursos($propietario,100,0);
	actualizarEventoProvincia($provincia,TIPOE,17,$turno,0);
}
function eventoTodosQueremosSer($provincia,$propietario){
	global $turno;
	CambiarRecursos($propietario,300,0);
	crearEventoPendiente($propietario,$provincia,TIPOE,18,1);
	actualizarEventoProvincia($provincia,TIPOE,18,$turno,0);
}

function perderHeroeAleatorio($propietario){
	global $turno;
	$heroes = getHeroesSinLiderPorJugador($propietario);
	if($heroes!=null){
		$aleatorio = rand(0,count($heroes)-1);
		//TANTO EN ESTA COMO EN TODAS LAS ALEATORIAS; HAY QUE COMPROBAR ANTES QUE 
		//QUE EL JUGADOR TENGA HEROES Y ESAS COSILLAS
		borrarHeroe($heroes[$aleatorio]);
	}
}

?>
