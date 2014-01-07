<html>
	<head><title>de conexiones</title> </head>
	<body>
		<div id="provincias">
			<form action="../forms/form_modificar_conexiones.php" method="POST">
				<select id ="origen" name = "origen">
				
				</select>
				<input type="text" id="destino" size=2 name = "destino"/>
				<input type="submit" value="Add provincia" />
			</form>
			<div id="resultados">
				
			</div>
			<div id="cambiar">
				<img src="../img/map.png"> 
			</div>
		</div>
	</body>
</html>
<?php


	

		$dbhost='mysql.hostinger.es';
		$dbuser='u273414799_wabu';
		$dbpass='c0cac0la';
		$bd=mysql_connect($dbhost,$dbuser,$dbpass) or die;
		mysql_select_db("u273414799_wab",$bd);
		
		
		$conexiones = array();
		

	
		$sql="select * from conexiones";
		
		$result=mysql_query($sql);
		$i =0;
		echo "<script type=\"text/javascript\" charset=\"utf-8\"> var conexiones = new Array(); var provincias = new Array();";
		while ($row = mysql_fetch_array($result)) {
			echo "conexiones[".$i."] = {0: '".$row["origen"]."', 1: '".$row["destino"]."' };";
			
			$i++;
		};
		
		$sql2 = "select id,nombre from provincias";
		$result2 = mysql_query($sql2);
		$i = 0;
		while ($row = mysql_fetch_array($result2)){
			echo "provincias[".$i."] ='".$row["id"]." - ".$row["nombre"]."';";
			$i++;
		}
		
		echo "</script>";
?>
<script type="text/javascript">
var htmliner = "";
for (var i =0;i<provincias.length;i++){
	htmliner = htmliner + "<option value="+provincias[i]+">"+provincias[i]+"</option>";
}
document.getElementById("origen").innerHTML = htmliner;

var selectmenu=document.getElementById("origen")
selectmenu.onchange=function(){ //run some code when "onchange" event fires
 var chosenoption=this.options[this.selectedIndex].value; //this refers to "selectmenu"
 imprimirOpciones(chosenoption);
 
}
function imprimirOpciones (origen) {
  var i;
  var lista="Provincias con las que conecta: <br>";
  for (i=0;i<conexiones.length;i++){
  	if(conexiones[i][0]==origen){
  		lista= lista+conexiones[i][1]+"<br>";
  	}
  	
  }
  document.getElementById("resultados").innerHTML = lista;

}
</script>
