<? 
include 'sql_data.php';

for($i=76;$i<88;$i++){
	for($j=1;$j<5;$j++){
		$sql ="Insert into puntos_por_provincia values (".$j.",0,".$i.")";
		$result=mysql_query($sql);
	}
}
?>
