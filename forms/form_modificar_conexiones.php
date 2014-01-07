<?
include '../includes.php';
include '../classes/methods.php';


if($_POST){
	
	$sql = "INSERT INTO conexiones values ('".$_POST["origen"]."','".$_POST["destino"]."')";

	mysql_query($sql);
}
	header ('Location: ../view/view_comprobar_conexiones.php');

?>
