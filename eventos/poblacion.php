<?
include '../includes.php';
include '../classes/methods.php';
include 'dados.php';
define ("TIPOE",3);
$tirada;
for($propietario=1;$propietario<3;$propietario++){
	//por ahora hacemos un 1 to 4, deberiamos hacer un recorrido real, sobre el ID de jugadores
	$provincias = getProvinciasTerrestresJugador($propietario);
	foreach($provincias as $provincia) {
		
		$tirada = getD6()+getD6()+getD6();
		//echo $tirada."para la provincia.".$provincia."<br>";
		switch($tirada){
			case 3:
				eventoDisturbiosIncontrolados($provincia);
				break;
			case 4:
				eventoMagnicidio($provincia,$propietario);
				break;
			case 5:
				eventoSaqueoMinas($provincia,$propietario);
				break;
			case 6:
				eventoAltercadosCiudad($provincia);
				break;
			case 7:
			case 8:
			case 9:
			case 10:
			case 11:
			case 12:
			case 13:
			case 14:		
			case 15:
				eventoSinNovedad($provincia);
				break;
			case 16:
				eventoOfrendaDioses($provincia,$propietario);
				break;
			case 17:
				eventoComercioProductivo($provincia,$propietario);
				break;
			case 18:
				eventoNativosAdoran($provincia,$propietario);
				break;
		}
	}
}	
function eventoDisturbiosIncontrolados($provincia){
	global $turno;
	actualizarPuntosProvinciaPorcentaje($provincia,0.80);
	actualizarEventoProvincia($provincia,TIPOE,3,$turno,$turno);
	
}
function eventoMagnicidio($provincia,$jugador){
	global $turno;
	$lideres = getLiderEnProvincia($provincia,$jugador);
	if(count($lideres)==1){
		borrarHeroe($lideres[0]);
	}elseif(count($lideres)>1){
		//		aleatorio pa ver cual borramos
		$heroe_a_borrar = rand(0,count($lideres)-1);
		borrarHeroe($lideres[$heroe_a_borrar]);
	}
		crearEventoPendiente($propietario,$provincia,TIPOE,18,0);
		actualizarEventoProvincia($provincia,TIPOE,4,$turno,0);

	
}
function eventoSaqueoMinas($provincia,$propietario){
	global $turno;
	CambiarRecursos($propietario,100,1);
	actualizarEventoProvincia($provincia,TIPOE,5,$turno,$turno);

}

function eventoOfrendaDioses($provincia,$propietario){
	global $turno;
	CambiarRecursos($propietario,50,0);
	actualizarEventoProvincia($provincia,TIPOE,16,$turno,$turno);
}
function eventoComercioProductivo($provincia,$propietario){
	global $turno;
	CambiarRecursos($propietario,100,0);
	actualizarEventoProvincia($provincia,TIPOE,17,$turno,$turno);
}
function eventoNativosAdoran($provincia,$propietario){
	global $turno;
	crearEventoPendiente($propietario,$provincia,TIPOE,18,1);
	actualizarEventoProvincia($provincia,TIPOE,18,$turno,-2);
}
	

?>
