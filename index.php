<?php
	include 'header.php';
	if($_SESSION["usuario"]=="") //Controlamos que exista el login
	{
	
	
	?>
	<div name="area_login" id="area_login" align="justify" class="area-login">
		<form action="login.php" method="post">
		<?php 
			if ($_GET["error"]=="failed1")
			{
		?>
				<p><font color="red">El usuario o contrase&ntilde;a no es correcto</font></p>
				<p>Pulsa <a href="index.php">Aqu&iacute;</a> para intentarlo de nuevo</div>
        
		<?php	
			}else{
		?>
		<center>Usuario</center>
		<center><input type="text" name="user" size="12"/></center>
		<center>Contrase&ntilde;a</center>
		<center><input type="password" name="pass" size="12"/></center>
		<div align=center>	<table border="0" cellpadding="0" cellspacing="0" width="100">
		<tr>
		<td><input type="submit" value="Entrar" /></td>

		<td>	<button type="button" value="Registrate" onclick="location.href='registro.php'">Registrate</button></td></tr>
		</table>
		
		
		</center>
		</form>
		</div>
		</div> 
	   

	<?php }
	}else{ //Aqui trabajamos ya con el usuario en su panel central
	
		include 'menu.php';
		
		
	}
    ?>
    
