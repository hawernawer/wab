<?
include '../includes.php';
include '../classes/methods.php';
if($_POST){
	$aliados = new aliados($_POST y poner todos las variables);
	$aliados->updateBD;
}else{
	echo "SECCIÓN PROHÍBIDA";
}
?>
