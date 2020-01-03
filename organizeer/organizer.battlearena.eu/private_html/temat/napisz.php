<?
	/*
	echo 'POST<br>';
	print_r($_POST);
	
	echo '<br><br>GET<br>';
	print_r($_GET);
	echo '<br>';
	
	echo '<br><br>SESSION<br>';
	print_r($_SESSION);
	echo '<br>';
	*/
	
	$db = new Db();
	$db->connect();
	
	$firmy = array();
	$id = $_GET['uid'];
	$query = 	"SELECT imie, nazwisko, username FROM users where id = '$id'";
	$result = $db->query($query);
	
	
	while($row = $result->fetch_array())
		$rows[] = $row;
	
?>
<script type="text/javascript">
$(function(){
				$('.animated').autosize({append: "\n"});
			});
</script>

<div class="admin_panel">
	<div id="content">
	
	<? if(!$_POST)
	{
		?>
		<form method="POST" action="">
		<input type="text" name="tytul" placeholder="Tytuł tematu" required>
		<hr>
		<?
		foreach($rows as $row)
		{
			echo '<h3>Adresat : ['.$rows[0]["username"].']<i> '.$rows[0]["imie"].' '.$rows[0]["nazwisko"].'</i></h3>';
		}
		?>
		<hr>
		<textarea class="animated" name="tresc" data-autoresize placeholder="Treść wiadomości" required></textarea>
		<input type="submit" value="Wyślij"/>
		</form>
	<? } else { 
		echo '<h1>wyslane</h1>';
		$temat = $_POST['tytul'];
		$tresc = htmlspecialchars($_POST['tresc']);
		$uid = $_GET['uid'];
		$data = date("d-m-Y"); 
		
		$odpisujacy = 0;
		
		
		$db = new Db();
		$db->connect();
		
		$query = "INSERT INTO tematy(id, nazwa, osoba_kontaktowa, data, zakonczony) VALUES('', '$temat', '$uid', '$data', '0')";
		$db->query($query);
		
		$query = "SELECT id from `tematy` ORDER BY id DESC LIMIT 1";
		$result2 = $db->query($query);
		while($row2 = $result2->fetch_array())
		$id_tematy = $row2['id'];
		//$id_tematy = $id_tematy + 1;
		//echo $id_tematy;
		
		$query = "INSERT INTO tematy_dane(id, tematy_id, tresc, odpowiedz, data) VALUES('', '$id_tematy', '$tresc', '$odpisujacy', '$data')";
		$db->query($query);
	} ?>
	</div>
</div>