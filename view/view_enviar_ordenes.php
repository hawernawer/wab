<?
echo "<script type=\"text/javascript\" charset=\"utf-8\"> var conexiones = new Array(); var provincias_disponibles = new Array();";


$sql="select * from conexiones";
$result=mysql_query($sql);
$i =0;
while ($row = mysql_fetch_array($result)) {
			echo "conexiones[".$i."] = {0: '".$row["origen"]."', 1: '".$row["destino"]."' };";
			
			$i++;
};

$sql = "select * from puntos_por_provincia pp inner join provincias p on pp.provincia = p.id where pp.jugador = 1 and puntos > 0";
$result=mysql_query($sql);
$j = 0;
while ($row = mysql_fetch_array($result)) {
			echo "provincias_disponibles[".$j."] = {0: '".$row["jugador"]."', 1: '".$row["puntos"]."' , 2: '".$row["provincia"]."', 3: '".$row["nombre"]."', 4: '".$row["propietario"]."', 5: '".$row["campamento"]."', 6: '".$row["partisanos"]."', 7: '".$row["tipo"]."'      };";
			
			$i++;
};
		
echo "</script>";	
?>
<!DOCTYPE HTML>
<HTML lang="es">
<head>
	<!--TODO// Añadir ruta de hoja de estilo -->
	<link rel="stylesheet" type="text/css" href="" media="all">
	<meta charset="UTF-8" />
	<title>Ordenes</title>
	<!-- Debido a los fallos de sintaxis inciales y a un error en las rutas de google apis importe la libreria localmente, modificalo si lo crees necesario.-->
	<script type="text/javascript" src="js/jquery.js"></script>
	<!--Añadimos el modernizer para el CSS3 que tengas que hacer -->
	<script type="text/javascript" src="js/modernizr.js"></script>
	<script type="text/javascript" src="js/funcionesOrdenes.js"></script>


</head>
<!-- Class para el CSS-->
<div clas="formulario_ordenes" id="contenido">
	<!-- Inicio del formulario -->
	<form class="ordenes">
		
		<div class="seleccion">
			<!--Primer campo para seleccionar el tipo de orden, valor por defecto= primera opcion, en este caso movimiento terrestre, dejamos el id como tipos_ordenes ya que no venia especificado. -->
			<select  id="tipos_ordenes" > 
				<option value="0">Movimiento terrestre</option>
				<option value="1">Movimiento maritimo</option>
				<option value="2">Movimiento de aliados</option>
				<option value="3">Movimiento de heroes</option>
				<option value="4">Movimiento del lider</option>
			</select>
			<!--Boton de crear la orden, se le añade un name para el css y un id para JS. al pulsarlo ejecuta la funcion creaOrden con Jquery -->
			<input type="button" name="boton" id="boton_crea_orden" value="Crear nueva linea de orden"></input>
		</div>
		<!-- Dentro del div div_ordenes vamos a crear nuestras ordenes. -->
		<div class="fila ordenes" id="div_ordenes">
			<!--Ordenes a crear.-->
		</div>
		<input type="button" name="boton" id="boton_borra_orden" value="Borrar ultima linea de orden"></input>
	</form>
</div>
