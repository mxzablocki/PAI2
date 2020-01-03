<?
	$db = new Db();
	$db->connect();
	
	$firmy = array();
	$role = array();
	
	$query = "SELECT * FROM firmy";
	$result_firmy = $db->query($query);
	while($row_firmy = $result_firmy->fetch_array())
	{
		$rows_firmy[] = $row_firmy;
	}
	foreach($rows_firmy as $row_firmy)
	{
		array_push($firmy, $row_firmy['nazwa']);
	}
	
	//print_r($firmy);
	
	
	$query = "SELECT * FROM rights";
	$result_role = $db->query($query);
	while($row_role = $result_role->fetch_array())
	foreach($result_role as $row_role)
	{
		array_push($role, $row_role['nazwa']);
	}
	
	//print_r($role);
?>

<div class="admin_panel">
	<div id="content">
	<? //print_R( $_POST );
		if(empty($_POST))
		{
	?>
		Dodaj nowego użytkownika do organizatora
		
		<div>
			<form method="post" action="">
				<h1> hasło dla nowego użytkownika : Organizer </h1>
				<div><label>Wysłać email do użytkownika z danymi logowania ?</label><input type="checkbox" name="send"></div>
				<div><label>Login</label><input type="text" name="login" required /></div>
				<div><label>Imię</label><input type="text" name="imie" required /></div>
				<div><label>Nazwisko</label><input type="text" name="nazwisko" required /></div>
				<div><label>Email</label><input type="text" name="email" required /></div>
				<div>
					Przypisana rola
					<select name="prawa" required>
		<?
			
						foreach($role as $id => $nazwa) {
							$id2 = $id+1;
							echo '<option value="' . $id2 . '">' . $nazwa . '</option>';
						}
						
		?>
					</select>
				</div>
				<div>
					Przypisane firmy
					<select name="firmy[]" multiple required>
		<?
			
						foreach($firmy as $id => $nazwa) {
							echo '<option value="' . $id . '">' . $nazwa . '</option>';
						}
						
		?>
					</select>
				</div>
				<input type="submit" value="wyślij"/>
			</form>
		</div>
		<? } else {
			$szyfrator = new szyfr();
			$login = $_POST['login'];
			$email = $_POST['email'];
			$prawa = $_POST['prawa'];
			$firmy = implode(",",$_POST['firmy']);
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$haslo = $szyfrator->szyfruj('Organizer');
			$query = "INSERT INTO users(id, username, password, email, privilige, firmy, imie, nazwisko) 
			VALUES('', '$login', '$haslo', '$email', '$prawa', '$firmy', '$imie', '$nazwisko')";
			$db->query($query);
			echo 'Osoba poprawnie dodana';
			//print_r($_POST);
		} ?>
	</div>
</div>