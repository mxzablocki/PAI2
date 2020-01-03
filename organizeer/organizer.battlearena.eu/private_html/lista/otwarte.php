<?php
	session_start();
	
	$zakonczony = $_GET['zakonczony'];
	$db = new Db();    
	$db->connect();
	
	$uid = $_SESSION['login_user'];
	$sid = $_SESSION['rights'];
	
	if(!$zakonczony)
	{
		if($sid == 1)
			$query = "SELECT t.*, u.email, u.username FROM tematy t left join users  u on t.osoba_kontaktowa = u.id WHERE t.zakonczony = '0' ORDER BY t.id DESC";
		else
			$query = "SELECT t.*, u.email, u.username FROM tematy t left join users  u on t.osoba_kontaktowa = u.id WHERE osoba_kontaktowa = '$uid' AND t.zakonczony = '0' ORDER BY t.id DESC";
	}
	else
	{
		if($sid == 1)
			$query = "SELECT t.*, u.email, u.username FROM tematy t left join users  u on t.osoba_kontaktowa = u.id WHERE zakonczony = 1 ORDER BY t.id DESC";
		else
			$query = "SELECT t.*, u.email, u.username FROM tematy t left join users  u on t.osoba_kontaktowa = u.id WHERE zakonczony = 1 AND osoba_kontaktowa = '$uid' ORDER BY t.id DESC";
	}
	$result = $db->query($query);
	
?>
<div class="admin_panel">
	<div id="content">
		<?php
			while($row = $result->fetch_array())
			{
				$rows[] = $row;
			}
			
			
			echo '<table id="lprac">';
			echo '<tr><td>';
			echo "ID";
			echo '</td><td>';
			echo "Temat";
			echo '</td><td>';
			echo "Adresat";
			echo '</td><td>';
			echo "Mejl osoby do kontaktu";
			echo '</td><td>';
			echo "Data";
			echo '</td><td>';
			echo "Akcje";
			echo '</td></tr>';
			
			foreach($rows as $row)
			{
				if($row['zakonczony'])
					echo '<tr style="background-color:rgba(0,200,0,0.3);"><td>';
				else
					echo '<tr><td>';
				echo $row['id'];
				echo '</td><td>';
				echo $row['nazwa'];
				echo '</td><td>';
				echo $row['username'];
				echo '</td><td>';
				echo $row['email'];
				echo '</td><td>';
				echo $row['data'];
				echo '</td><td>';
				echo '<a href="?id=temat&strona=zakoncz&nr_tematu='.$row['id'].'">Zamknij</a>';
				echo '</td></tr>';
				
			}
			
			echo '</table>';
			
			$result->close();
			
			$db->close();
		?>
	</div>
</div>