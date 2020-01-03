
<script type="text/javascript">
$(function(){
				$('.animated').autosize({append: "\n"});
			});
</script>
<div class="admin_panel">
	<div id="content">
<?
	$nr_tematu = $_GET['nr_tematu'];
	//echo $nr_tematu;
	
	$db = new Db();
	$db->connect();
	
	if(!$_POST)
	{
		$query = 	"SELECT * FROM tematy t
					LEFT JOIN tematy_dane td ON td.tematy_id = t.id
					WHERE t.id = $nr_tematu";
		//echo $query;
		$result = $db->query($query);
		
		while($row = $result->fetch_array())
		{
			$rows[] = $row;
		}
		//print_r($rows[0]);
		$ok = $rows[0]['osoba_kontaktowa'];
		$o = $_SESSION['login_user'];
		$ag = 1;
		echo $ok.' '.$o;
		if(($ok == $o) OR ($o = $ag))
		{
		echo "<b>Temat : </b>".$rows[0]['nazwa']."<hr>";
		foreach($rows as $row)
		{
			if($row['odpowiedz'] == 0)
				echo '<div class="admin_panel" style="margin-bottom:10px;width:80%;"><div id="content">';
			else
				echo '<div class="admin_panel" style="margin-bottom:10px;width:80%;margin-left:20%;"><div id="content">';
			
			echo "<div><b>".$row['data']."</b></div>";
			echo '<hr>';
			echo '<div>'.$row['tresc'].'</div>';
			echo '</div></div>';
		}
		
		$zakonczony = $rows[0]['zakonczony'];
		}
		else
		{
			$zakonczony = 1;
			echo '<h1> Nie masz dostępu do danego tematu</h1>';
		}
	}
	if($zakonczony)
		echo "<div> <h1>Temat został zakończony, nie możesz w nim odpowiadać</h1></div>";
	else
	{		
		echo "<div> <h1>Odpowiedz</h1></div>";
		 if(!$_POST)
		{
			?>
			<form method="POST" action="">
			<textarea class="animated" name="tresc" data-autoresize placeholder="Treść odpowiedzi" required></textarea>
			<input type="submit" value="Wyślij"/>
			</form>
		<? 	}else { 
			echo '<h1>wyslane</h1>';
			echo '<a href="?id=temat&strona=zobacz&nr_tematu='.$nr_tematu.'"><input type="button" value="Powrót"/></a>';
			$tresc = htmlspecialchars($_POST['tresc']);
			$data = date("d-m-Y"); 
			
			if($_SESSION['rights'] == 1)
				$odpisujacy = 0;
			else
				$odpisujacy = 1;
			
			
			//$db = new Db();
			//$db->connect();
			
			$query = "INSERT INTO tematy_dane(id, tematy_id, tresc, odpowiedz, data) 
			VALUES('', '$nr_tematu', '$tresc', '$odpisujacy', '$data')";
			
			$db->query($query);
		}
	}

	if(!$_POST)
		$result->close();
	
	$db->close();
?>
	</div>
</div>