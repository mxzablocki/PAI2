<div class="admin_panel">
	<div id="content">
	<!--<input type="text" placeholder="Szukaj po nazwie"><br>-->
<?	
	$db = new Db();
	$db->connect();
	
	$firmy = array();
	$osoby_przypisane = array();
	
	/*$query = 	"SELECT f.id, f.nazwa, u.firmy, count(u.firmy) as LUF FROM firmy f, users u
				WHERE u.firmy LIKE CONCAT('%',f.id,'%')
				GROUP BY f.nazwa ORDER BY f.id ASC;";*/
				
	$query = 	"SELECT f.id, f.nazwa FROM firmy f WHERE active = 1 ORDER BY f.id ASC;";
	$result_firmy = $db->query($query);
	while($row_firmy = $result_firmy->fetch_array())
	{
		$rows_firmy[] = $row_firmy;
	}
	foreach($rows_firmy as $row_firmy)
	{
		$tmp = array($row_firmy['id'],$row_firmy['nazwa']);
		array_push($firmy, $tmp);
	}
if(!isset($_GET['fid']))
{
	echo '<table style="width:100%;text-align:center;" class="firmy">
	<tr><td>ID</td><td>Nazwa firmy</td><td>Ilość przypisanych osób</td><td>Zobacz firmę</td></tr>';
	
	
	foreach($firmy as $firma){
		$wf = $firma[0];
		$query ="SELECT count(firmy) LUF from users where firmy LIKE CONCAT('%',$wf,'%')";
		//echo $query;
		$result = $db->query($query);
		$row = $result->fetch_array();
		echo '<tr>';
		echo '<td class="id_firmy"><x>'.$firma[0].'</x></td>';
		echo '<td><b>'.$firma[1].'</b></td>';
		echo '<td class="przypisane_osoby"><x>'.$row['LUF'].'</x></td>';
		echo '<td><a href="?id=firmy&strona=firma_modyfikuj&fid='.$firma[0].'">Modyfikuj</a></td>';
		echo '</tr>';
	}
	echo '</table>';

	$result_firmy->close();
	
	$db->close();
	
}
else
{
	$fid = $_GET['fid'];
	if(empty($_POST))
	{
		
		//print_r($firmy);
?>
		<form method="post" action="">
			<input type="text" name="nazwa" placeholder="<? echo $firmy[$fid-1][1]; ?>" required/>
			<input type="submit" value="Zmień nazwę"/>
			<a href="?id=firmy&strona=firma_modyfikuj"><input type="button" value="Anuluj"/></a>
		</form>
<?
	}else{
		print_r($_POST);
		if(isset($_POST['nazwa']))
		{
			$nazwa = $_POST['nazwa'];
			//echo $nazwa;
			
			$query = "UPDATE firmy SET nazwa = '$nazwa' WHERE id = '$fid';";
			
			$db->query($query);
			
			echo '<h1> Pomyślnie zmodyfikowano firmę '.$nazwa.'</h1>';
		}
	}
}
?>
	</div>
</div>