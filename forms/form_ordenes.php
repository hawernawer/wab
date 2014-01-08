<?
include '../includes.php';
include '../classes/methods.php';
$id = getLastOrden()+1;
$turno = getLastTurno();
$fecha = date();
$orden = new orden($turno,$id,$_POST["propietario"],$_POST["comentarios"],$fecha); 
$orden->insertBD();
//con esto ya tenemos la orden creada e insertada en la BD, ahora falta como tratar cada uno de los movs.
//la opcion A es crear tantos  $_POST como necesitemos y enviar el numero creado como otro
//elemento propio, de manera que sepamos cuantas vueltas tendria que dar el array
//es funcional, pero habria que investigar json o paso de objetos por XML o algo.
//ademas, cada linea de orden debe definir un tipo de los siguientes 4 con otra variable post
//mov tierra 0
//mov mar 1
//mov aliados 2
//mov heroes 3
//l mov del lider es un heroe, nos saltamos a la hora de guardar el dato
//las provincias intermedias
 //creamos 4 arrays y 4 banderas para guardar las ordenes.
 
$tierra = new Array();
$tierra_flag= false;
$mar = new Array();
$mar_flag = false;
$aliados = new Array();
$aliados_flag = false;
$heroes = new Array();
$heroes_flag = false;
$orden = getLastIdOrden();
for($i=0;$i++;$i<=$_POST["contador"]){
	switch($_POST["tipo".$i.""]){
			$orden++;
		case(0): //orden de tierra				
				$tierra[] = new mov_terr_orden($orden,$_POST["prov_origen".$i""],$_POST["prov_destino".$i""],$_POST["puntos".$i""],$_POST["campamento".$i""],$_POST["batalla".$i""],$_POST["partisanos".$i""]);
				$tierra_flag = true;
		break;
		case(1): //orden de mar
				$mar[]= new mov_mar_orden($orden,$_POST["prov_origen".$i""],$_POST["prov_destino".$i""],$_POST["puntos".$i""],$_POST["prov_extra".$i""],0):
				$mar_flag = true;
		break;
		case(2): //orden de aliados
				$aliados[] = new mov_aliados_orden($orden,$_POST["prov_origen".$i""],$_POST["prov_destino".$i""],$_POST["nombre".$i""]);
				$aliados_flag = true;
		break;
		case(3): //orden de heroes
				$heroes[] = new mov_heroes_orden($orden,$_POST["prov_origen".$i""],$_POST["prov_destino".$i""],$_POST["puntos".$i""],$_POST["nombre".$i""]);
				$heroes_flag = true;
		break;
		case(4)://orden de heroes(lider)
				$heroes[] = new mov_heroes_orden($orden,$_POST["prov_origen".$i""],$_POST["prov_destino".$i""],$_POST["puntos".$i""],$_POST["nombre".$i""]);
				$heroes_flag = true;
		default:
			echo "ERROR TIPO DE ORDEN INCORRECTO";
	}
}
if($tierra_flag){	// el id_orden esta mal, viene dado por el HTML, tiene que darse por la BD
	foreach($tierra_tmp in $tierra){
		$tierra_tmp->insertBD;
	}
}
if($mar_flag){
	foreach($mar_tmp in $mar){
		$mar_tmp->insertBD;
	}
}
if($aliados_flag){
	foreach($aliados_tmp in $aliados){
		$aliados_tmp->insertBD;
	}
}
if($heroes_flag){
	foreach($heroes_tmp in $heroes){
		$heroes_tmp->insertBD;
	}
}
//y ahora chequeamos si todo el mundo ha enviado sus ordenes para lanzar los eventos y todo eso
//despues vamos de vuelta a a pestaña principal
?>
