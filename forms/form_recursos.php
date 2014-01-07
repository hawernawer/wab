<?
include '../includes.php';
include '../classes/methods.php';
//este form va de forma parecida al de las ordenes
//con un indice para cada recurso.

// son campos turno propietario provincia y puntos. 
//Al llegar aqui ya se han hecho en JS las comprobaciones de que quien sea tiene puntos 
//suficientes para ejecutar estos recursos,  asi que aqui solamente los insertamos en la bd
$turno = getLastTurno();
$recursos = new Array();
$resta=0;
$jugador = $_POST["jugador"];


if($_POST["acumular_recursos"]==false){
	for($i=0;$i++;$i<$_POST["contador"]){
		$recursos[] = new recursos($turno,$jugador,$_POST["provincia".$i""],$_POST["puntos".$i""]);
	}
}
	//despues de crear los recursos normales, creamos uno a la provincia 0
	//con el total de puntos restantes de este turno no asignados
	//esta es la forma que tenemos de llevar un conteo del acumulado restante en cada
	//uno de los turnos. Cuando tratemos los recursos automaticamente
	//el contenido de la provincia 0 del turno en cuestión se sumará al jugador solamente
	//el resto se restaran del jugador y se sumaran a la provincia en cuestión
	
	$recursos = new recursos($turno,$jugador,0,$_POST["sumando"]); 

foreach($recursos_tmp in $recursos){
			$recurso_tmp->insertBD;
	}

?>
