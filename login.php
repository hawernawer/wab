<?php
/*
 *MySQL database will be created in 1 minute. Use these details for your PHP scripts:

$mysql_host = "mysql3.000webhost.com";
$mysql_database = "a9284159_wab";
$mysql_user = "a9284159_wab";
$mysql_password = "c0cac0la" 
 * 
 * 
 * */
?>

<?php
	 include 'header.php';
		/*
		 * $dbhost='mysql3.000webhost.com';
			$dbuser='a9284159_wab';
		$dbpass='c0cac0la';
		$bd=mysql_connect($dbhost,$dbuser,$dbpass) or die;
		mysql_select_db("a9284159_wab",$bd);
		 * */
		$sql="select * from jugador where nombre='".$_POST["user"]."'";
		
		$result=mysql_query($sql);
		echo $sql;
		echo mysql_error();
		
		if ($row=mysql_fetch_array($result))
		{
           	if ($row["pass"]==md5($_POST["pass"]))
				{
					$_SESSION["usuario"]=$row["id"];
					$_SESSION["nombre"]=$_POST["nombre"];

					header ("Location:index.php");
					//aqui realmente haremos el header a mapa.php para que lo primero que se vea sea el mapa general
				}
				else
				{
					header ("Location:index.php?error=failed1");
					//echo $_POST["mail"]."Contraseña mala";
				}
		}
		else
		{
			//echo mysql_error();
			header ("Location:index.php?error=failed2");
			//echo $_POST["mail"]."Ni entro ni na";
			//echo $_POST["pass"];
		}?>
