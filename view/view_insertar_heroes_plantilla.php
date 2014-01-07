<?
include '../includes.php';
include '../classes/methods.php';

 ?>
<HTML>
	
	<div id="principal">
		<fieldset>
			<Legend>Listado de heroes insertados</Legend>
			<table border=1>
			<? $heroes = getHeroesPlantilla();
					getCabeceraHTMLHeroePlantilla();
				foreach($heroes as $heroe_plantilla_tmp){
					$heroe_plantilla_tmp->echoHTML();
				
				}
			 ?>
			 </table>
		</fieldset>
	<form action="../forms/form_heroes_plantilla.php" method="POST">
		<fieldset>
			<Legend>Insercion de heroes</Legend>
			Nombre:	<input type="text" name="nombre" id="itnombre">	
			Habilidades: <input type="text" name="habilidades" id="ithabilidades">
			Coste: <input type="text" name="coste" id="itcoste">
			Equipo: <input type="text" name="equipo" id="itequipo"><br>
			M: <input type="text" name="M" id="itM" size=1> WS : <input type="text" name="WS" id="itWS" size=1>
			BS: <input type="text" name="BS" id="itBS" size=1> S: <input type="text" name="S" id="itS" size=1>
			T: <input type="text" name="T" id="itT" size=1> W: <input type="text" name="W" id="itW" size=1>
			I: <input type="text" name="I" id="itI" size=1> A: <input type="text" name="A" id="itA" size=1>
			LD: <input type="text" name="LD" id="itLD" size=1>
			Imperio: <select name="imperio"><?imprimirValuesSelectImperio();?></select><br>
			<input type="hidden" name="funcion" value="0">
		</fieldset>
			<input type="submit" value="Enviar" />
			
	</form>
	</div>
</HTML>
<? ?>
