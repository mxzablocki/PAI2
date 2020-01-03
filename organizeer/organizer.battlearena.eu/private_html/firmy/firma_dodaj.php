<?

?>

<div class="admin_panel">
	<div id="content">
		<? //print_R( $_POST );
			if(empty($_POST))
			{
		?>
				<form method="post" action="">
					<input type="text" name="nazwa" placeholder="Nazwa firmy"/>
					<input type="submit" value="Dodaj firmę"/>
				</form>
		<?
			}else{
				//print_r($_POST);
				if(isset($_POST['nazwa']))
				{
					$nazwa = $_POST['nazwa'];
					//echo $nazwa;
					
					$query = "INSERT INTO firmy(id, nazwa) VALUES('', '$nazwa')";
					$db = new Db();
					$db->connect();
					
					$db->query($query);
					
					echo '<h1> Pomyślnie dodano firmę '.$nazwa.'</h1>';
				}
			} ?>
	
	
	</div>
</div>