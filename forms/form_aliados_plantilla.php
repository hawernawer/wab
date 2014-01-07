<?
include '../includes.php';
include '../classes/methods.php';


//la forma de crear esto es recibir por POST los valores de un objeto heroes_plantilla
//entonces crearemos el objeto y depende de lafuncion que se quiera hacer

//create 0  delete  1 o update  2

// haremos la funcion antes mencionada
if($_POST){
	
	$id = 1+getLastIdAliadosPlantilla();																									
	$plantilla = new aliados_plantilla($id,$_POST["nombre"],$_POST["habilidades"],$_POST["coste"],$_POST["equipo"],$_POST["M"],$_POST["WS"],$_POST["BS"],$_POST["S"],$_POST["T"],$_POST["W"],$_POST["I"],$_POST["A"],$_POST["LD"]);

	if($_POST["funcion"]==0){
		$plantilla->insertBD();
	}else{
		echo "Error, funcion vale: !!".$_POST["funcion"];
		header ('Location: ../view/view_insertar_aliados_plantilla.php?error=nodata');
	}
	
	
}elseif($_GET){
	
	if($_GET["funcion"]==1){
		deleteAliadoPlantillaPorId($_GET["id"]);
	}else{
		echo "Error, funcion vale: !!".$_GET["funcion"];
		header ('Location: ../view/view_insertar_aliados_plantilla.php?error=nodata');
	}
		

	
}
	header ('Location: ../view/view_insertar_aliados_plantilla.php');

?>
