<?
include '../includes.php';
include '../classes/methods.php';
include 'dados.php';
define ("TIPOE",2);
$tirada;//ESTE ESTA MAL; NO HAY PROPIETARIOS EN PROVINCIAS MARITIMAS; SOLO PROVINCIAS CON PUNTOS!!
for($propietario=1;$propietario<3;$propietario++){
	//por ahora hacemos un 1 to 4, deberiamos hacer un recorrido real, sobre el ID de jugadores
	$provincias = getProvinciasMaritimasJugador($propietario);
	foreach($provincias as $provincia) {
		
		//$tirada = getD6()+getD6()+getD6();
		$tirada = 3;
		echo "Tirada ".$tirada."Para la provincia: ".$provincia."<br>";
		switch($tirada){
			case 3:
				eventoTemporalDestructor($provincia);
				break;
			case 4:
				eventoRegresamosaCasa($provincia);
				break;
			case 5:
				eventoPiratas($provincia);
				break;
			case 6:
				eventoMareaBaja($provincia);
				break;
			case 7:
			
			case 9:
			case 10:
			case 11:
			case 12:
			case 13:
			case 14:
				eventoSinNovedad($provincia);
				break;
			case 15:
				eventoVientosaFavor($provincia);
				break;
			case 16:
				eventoTesoroOculto($provincia);
				break;
			case 17:
				eventoAliadosInesperados($provincia);
				break;
			case 18:
				eventoAliadosDeElite($provincia);
				break;
		}
	}
}	

/*
 * 
 * 
 * DEBERIAMOS VER SI LO DE CAMBIAR DESTINO ES BUENA IDEA
 * 
 * SEGUN EL ORDEN VISTO ANTES LOS ALEATORIOS SON DESPUES DE LOS MOVIMIENTOS , 
 * ASI QUE DEBERIA MOVERSE TODO, NO ESPERAR A REALIZAR LA ORDEN!!!
 * 
 * */

function eventoTemporalDestructor($provincia){
	global $turno;
	$conexiones = getProvinciasCosteras($provincias);
	$length = count($conexiones);
	$aleatorio = rand(1,$length);
	
	//el parametro 0 es que no hay que hacer comprobaciones antes de cambiar destino
	cambiarDestinoEvento($provincia,$aleatorio,$turno,0);
	//aqui se cambia el destino del evento en la orden
	//eso si, los heroes y aliados continuan su movimiento (al menos por ahora)
	
	
	actualizarPuntosProvinciaPorcentaje($provincia,0.75);
	actualizarEventoProvincia($provincia,TIPOE,3,$turno,$turno);
	
}	
function eventoRegresamosaCasa($provincia){
	global $turno;
	//el parametro 0 es que no hay que hacer comprobaciones antes de cambiar destino
	cambiarDestinoEvento($provincia,$provincia,$turno,0);
	actualizarEventoProvincia($provincia,TIPOE,4,$turno,$turno);

}
function eventoPiratas($provincia){
	global $turno;
	actualizarPuntosProvinciaPorcentaje($provincia,0.85);
	actualizarEventoProvincia($provincia,TIPOE,5,$turno,$turno);
}
function eventoMareaBaja($provincia){
	global $turno;
	//el parametro 1 es para comprobar que
	//el destino solo se bloquea si es una provincia inferior a la 76
	cambiarDestinoEvento($provincia,$provincia,$turno,1);
	actualizarEventoProvincia($provincia,TIPOE,6,$turno,$turno);
}
function eventoVientosaFavor($provincia){
	global $turno;
	//el parametro 2 es para indicar que se realiza el movimiento que esté en mov_extra
	cambiarDestinoEvento($provincia,$provincia,$turno,2);
	actualizarEventoProvincia($provincia,TIPOE,15,$turno,$turno);

}
function eventoTesoroOculto($provincia){
	global $turno;
	CambiarRecursos($propietario,50,0);
	actualizarEventoProvincia($provincia,TIPOE,16,$turno,$turno);
}
function eventoAliadosInesperados($provincia){
	global $turno;

	crearEventoPendiente($propietario,$provincia,TIPOE,17);

	actualizarEventoProvincia($provincia,TIPOE,17,$turno,-2);
}
function eventoAliadosDeElite($provincia){
	global $turno;

	crearEventoPendiente($propietario,$provincia,TIPOE,18);
	actualizarEventoProvincia($provincia,TIPOE,18,$turno,-2);
}
?>
