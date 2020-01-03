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
				
	$query = 	"SELECT f.active, f.id, f.nazwa FROM firmy f ORDER BY f.id ASC;";
	$result_firmy = $db->query($query);
	while($row_firmy = $result_firmy->fetch_array())
	{
		$rows_firmy[] = $row_firmy;
	}
	foreach($rows_firmy as $row_firmy)
	{
		$tmp = array($row_firmy['id'],$row_firmy['nazwa'],$row_firmy['active']);
		array_push($firmy, $tmp);
	}
	echo '<table style="width:100%;text-align:center;" class="firmy">
	<tr><td>ID</td><td>Nazwa firmy</td><td>Ilość przypisanych osób</td><td>Zobacz firmę</td></tr>';
	/*foreach($rows_firmy as $row_firmy)
	{
		array_push($firmy, $row_firmy['nazwa']);
		//print_r( $row_firmy);
		echo '<tr>';
		echo '<td>'.$firmy['id'].'</td>';
		echo '<td>'.$row_firmy['nazwa'].'</td>';
		echo '<td>'.$row_firmy['LUF'].'</td>';
		echo '<td><a href="?id=firmy&strona=podglad&fid='.$row_firmy['id'].'">Podgląd</a></td>';
		echo '</tr>';
	}*/
	
	foreach($firmy as $firma){
		$wf = $firma[0];
		$query ="SELECT active, count(firmy) LUF from users where firmy LIKE CONCAT('%',$wf,'%')";
		//echo $query;
		$result = $db->query($query);
		$row = $result->fetch_array();
		echo '<tr>';
		echo '<td class="id_firmy"><x>'.$firma[0].'</x></td>';
		echo '<td><b>'.$firma[1].'</b></td>';
		if($firmy[$firma[0]-1][2])
		{
			echo '<td class="przypisane_osoby"><x>'.$row['LUF'].'</x></td>';
			echo '<td><a href="?id=firmy&strona=podglad&fid='.$firma[0].'">Podgląd</a></td>';
		}
		else
		{
			echo '<td class="przypisane_osoby"><x>Wyłączona</x></td>';
			echo '<td><a href="?id=firmy&strona=firma_wlacz&fid='.$firma[0].'">Włącz firmę</a></td>';
		}
		echo '</tr>';
	}
	echo '</table>';

	$result_firmy->close();
	
	$db->close();
?>
	</div>
</div>