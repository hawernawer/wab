<?
		echo "<div name=\"area_login\" id=\"menu\" align=\"justify\" class=\"menu\">";
		echo "<center>Bienvenido ".$_SESSION[nombre]."</center>";
		echo "<br><center><a href='ordenes.php'>Ordenes</a></center>";
		echo "<br><center><a href='recursos.php'>Recursos</a></center>";
		echo "<br><center><a href='mapa.php'>Mapa</a></center>";
		echo "<br><center><a href='provincias.php'>Provincias</a></center>";
		echo "<br><center><a href='batallas.php'>Batallas</a></center>";
		echo "<br><center><a href='tropas_especiales.php'>Tropas especiales</a></center>";
		echo "<br><center><a href='resumen.php'>Ver resumen</a></center>";
		echo "<br><center><a href='logout.php'>Desconectar</a></center>";
		echo "</div>";
?>
