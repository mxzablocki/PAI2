<div class="admin_panel">
	<div id="content">
	<!--<input type="text" placeholder="Szukaj po nazwie"><br>-->
<?	
	$db = new Db();
	$db->connect();
	
	$firmy = array();
	
	$query = 	"SELECT * FROM firmy where active = 1";
	$result_firmy = $db->query($query);
	while($row_firmy = $result_firmy->fetch_array())
	{
		$rows_firmy[] = $row_firmy;
	}
	print_r($rows[0]);
	foreach($rows_firmy as $row_firmy)
	{
		array_push($firmy, $row_firmy['nazwa']);
	}
	
	$query = 	"SELECT * FROM users u where active = 1";
	//echo $query;
	$result = $db->query($query);
	
	while($row = $result->fetch_array())
	{
		$rows[] = $row;
	}
if(!isset($_GET['uid']))
{
	echo "<b>Lista użytkowników</b><hr>";
	foreach($rows as $row)
	{
		$companies = explode(",",$row['firmy']);
		echo '<div class="admin_panel" style="margin-bottom:10px;"><div id="content">';
		echo "<div>Nazwa użytkownika : <b>".$row['username']."</b><a href='?id=personel&strona=osoba_usun&uid=".$row['id']."' style='float:right;'>Usuń użytkownika</a></div>";
		echo '<hr>';
		if($row['firmy'])
		{
			echo '<div style="display:block;margin-top:20px;text-align:center;"><b>Przypisano do firm:</b></br></div><div style="margin-left:5%;">';
			foreach($companies as $i =>$key) {
			$i >0;
				echo $firmy[$key-1].'</br>';

			}
			echo '</div>';
		}
		else
			echo '<div><b style="display:block;margin-top:20px;text-align:center;">Przypisano do firm:</b></br> <b>Brak Przypisanych firm dla użytkownika</b></div>';
		echo '</div></div>';
	}

	$result->close();
	
	$db->close();
	
}
else
{
	$uid = $_GET['uid'];
			
	$query = "UPDATE users SET active = '0' WHERE id = '$uid';";
	
	$db->query($query);
	
	echo '<h1> Pomyślnie wyłączono użytkownika '.$nazwa.'</h1>';
}
?>
	</div>
</div>