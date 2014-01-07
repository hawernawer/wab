<?
include '../includes.php';
include '../classes/methods.php';
$turno = getLastTurno();
$sql = "SELECT * from ordenes WHERE turno = '".$turno."'";
$result = mysql_query($sql);

while($row=mysql_fetch_array($result)){
	realizarMovimientos($row["id"],$row["propietario"]);

}
?>
