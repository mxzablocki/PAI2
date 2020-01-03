<div class="admin_panel">
	<div id="content">
	<input type="text" placeholder="Szukaj po nazwie użytkownika"> <input type="text" placeholder="Szukaj po nazwie oddziału"><br>
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
	
	$query = 	"SELECT * FROM users u left join rights r on u.privilige = r.id where active = 1";
	//echo $query;
	$result = $db->query($query);
	
	while($row = $result->fetch_array())
	{
		$rows[] = $row;
	}
	echo "<b>Lista użytkowników</b><hr>";
	foreach($rows as $row)
	{
		$companies = explode(",",$row['firmy']);
		echo '<div class="admin_panel" style="margin-bottom:10px;"><div id="content">';
		echo "<div>Nazwa użytkownika : <b>".$row['username']."</b><a href='?id=temat&strona=napisz&uid=".$row['id']."' style='float:right;'>Rozpocznij nowy temat</a></div>";
		echo '<hr>';
		echo '<div style="overflow:hidden">';
		echo '<div class="one-half">Imię :<b>'.$row['imie'].'</b></br> Nazwisko : <b>'.$row['nazwisko'].'</b></div>';
		echo '<div class="one-half last">Email :<b>'.$row['email'].'</b></br> <b>Prawa dostępu : '.$row['nazwa'].'</b></div>';
		echo '</div>';
		if($row['firmy'])
		{
			echo '<div style="display:block;margin-top:20px;text-align:center;"><b>Przypisano do oddziału:</b></br></div><div style="margin-left:5%;">';
			foreach($companies as $i =>$key) {
			$i >0;
				echo $firmy[$key-1].'</br>';

			}
			echo '</div>';
		}
		else
			echo '<div><b style="display:block;margin-top:20px;text-align:center;">Przypisano do oddziału:</b></br> <b>Brak Przypisanych oddziałów dla użytkownika</b></div>';
		echo '</div></div>';
	}

	$result->close();
	
	$db->close();
?>
	</div>
</div>