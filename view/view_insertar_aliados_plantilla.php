<?
include '../includes.php';
include '../classes/methods.php';
 ?>
<HTML>
	
	<div id="principal">
		<fieldset>
			<Legend>Listado de aliados insertados</Legend>
			<table border=1>
			<? $aliados = getAliadosPlantilla();
					getCabeceraHTMLAliadoPlantilla();
				foreach($aliados as $aliado_plantilla_tmp){
					$aliado_plantilla_tmp->echoHTML();
				
				}
			 ?>
			 </table>
		</fieldset>
	<form action="../forms/form_aliados_plantilla.php" method="POST">
		<fieldset>
			<Legend>Insercion de aliados</Legend>
			Nombre:	<input type="text" name="nombre" id="itnombre">	
			Habilidades: <input type="text" name="habilidades" id="ithabilidades">
			Coste: <input type="text" name="coste" id="itcoste">
			Equipo: <input type="text" name="equipo" id="itequipo"><br>
			M: <input type="text" name="M" id="itM" size=1> WS : <input type="text" name="WS" id="itWS" size=1>
			BS: <input type="text" name="BS" id="itBS" size=1> S: <input type="text" name="S" id="itS" size=1>
			T: <input type="text" name="T" id="itT" size=1> W: <input type="text" name="W" id="itW" size=1>
			I: <input type="text" name="I" id="itI" size=1> A: <input type="text" name="A" id="itA" size=1>
			LD: <input type="text" name="LD" id="itLD" size=1>
			<input type="hidden" name="funcion" value="0">
		</fieldset>
			<input type="submit" value="Enviar" />
			
	</form>
	</div>
</HTML>
<? ?>
