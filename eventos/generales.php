<?


include '../includes.php';
include '../classes/methods.php';
include 'dados.php';
define ("TIPOE",1);
$tirada; //ESTE SON SIEMPRE 4 tiradas, 1 por cada jugador
for($propietario=0;$propietario<1;$propietario++){
	$provincia = getD100();
	$tirada = getD6()+getD6()+getD6();
	echo "Tirada ".$tirada."Para la provincia: ".$provincia."<br>";

	switch($tirada){
		case 3:
			eventoTerremoto($provincia);
			break;
		case 4:
			eventoHordasBarbaras($provincia);
			break;
		case 5:
			eventoPeste($provincia);
			break;
		case 6:
			eventoHambruna($provincia);
			break;
		case 7:
			eventoSequia($provincia);
			break;
		case 8:
			eventoDesertores($provincia,$propietario);
			break;
		case 9:
		case 10:
		case 11:
		case 12:
		case 13:
			eventoSinNovedad($provincia);
			break;
		case 14:
			eventoMinaOculta($provincia,$propietario);
			break;
		case 15:
			eventoGranFestival($provincia,$propietario);
			break;
		case 16:
			eventoRefuerzos($provincia,$propietario);
			break;
		case 17:
			eventoDioses($provincia,$propietario);
			break;
		case 18:
			eventoVictis($provincia,$propietario);
			break;
	}
}
function eventoTerremoto($provincia){
	global $turno;
	if($provincia < 76){
		$camp_original = getCampamentoProvincia($provincia);
		$sql = "UPDATE provincias set campamento = '0' where id = '".$provincia."'";	
		mysql_query($sql);
	}	
	actualizarPuntosProvinciaPorcentaje($provincia,0.5);
	actualizarEventoProvincia($provincia,TIPOE,3,$turno,$turno);

}

function eventoHordasBarbaras($provincia){
	global $turno;
	if($provincia < 76){
		$camp_original = getCampamentoProvincia($provincia);
		if($camp_original == 2) {
			$sql = "UPDATE provincias set campamento = '1' where id = '".$provincia."'";
			mysql_query($sql);
		}else{
			actualizarPuntosProvinciaPorcentaje($provincia,0.8);
		}
	}else{
			actualizarPuntosProvinciaPorcentaje($provincia,0.8);

	}
	actualizarEventoProvincia($provincia,TIPOE,4,$turno,$turno);

}

function eventoPeste($provincia){
	global $turno;
	actualizarPuntosProvinciaPorcentaje($provincia,0.8);
	actualizarEventoProvincia($provincia,TIPOE,5,$turno,$turno);

}
function eventoHambruna($provincia){
	global $turno;
	actualizarPuntosProvinciaPorcentaje($provincia,0.9);
	actualizarEventoProvincia($provincia,TIPOE,6,$turno,$turno);

}
function eventoSequia($provincia){
	global $turno;
	actualizarPuntosProvinciaPorcentaje($provincia,0.95);
	actualizarEventoProvincia($provincia,TIPOE,7,$turno,$turno);

}
function eventoDesertores($provincia,$propietario){
	global $turno;

		if($provincia < 76){
			actualizarEventoProvincia($provincia,TIPOE,8,$turno,0);
			crearEventoPendiente($propietario,$provincia,TIPOE,8,0);

		}else{
			actualizarEventoProvincia($provincia,TIPOE,8,$turno,0);

		}
}

function eventoMinaOculta($provincia){
	global $turno;
	if($provincia < 76){
		$propietario = getPropietarioProvincia($provincia);
		CambiarRecursos($propietario,50,0);
	}
	actualizarEventoProvincia($provincia,TIPOE,14,$turno,$turno);

}
function eventoGranFestival($provincia){
	global $turno;
	if($provincia < 76){
		$propietario = getPropietarioProvincia($provincia);
		CambiarRecursos($propietario,100,0);
	}
	actualizarEventoProvincia($provincia,TIPOE,15,$turno,$turno);

}
function eventoRefuerzos($provincia){
	global $turno;
	if($provincia < 76){
		$propietario = getPropietarioProvincia($provincia);
		CambiarRecursos($propietario,200,0);
	}
	actualizarEventoProvincia($provincia,TIPOE,16,$turno,$turno);

}
function eventoDioses($provincia,$propietario){
	global $turno;
	crearEventoPendiente($propietario,$provincia,TIPOE,17,1);
	actualizarEventoProvincia($provincia,TIPOE,17,$turno,-2);

}
function eventoVictis($provincia,$propietario){
	global $turno;
	crearEventoPendiente($propietario,$provincia,TIPOE,18,1);
	actualizarEventoProvincia($provincia,TIPOE,18,$turno,-2);

}
?>
