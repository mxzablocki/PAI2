<div class="admin_panel">
	<div id="content">
	<!--<input type="text" placeholder="Szukaj po nazwie"><br>-->
<?	
	
	$db = new Db();
	$db->connect();
	$fid = $_GET['fid'];
			
			$query = "UPDATE firmy SET active = '1' WHERE id = '$fid';";
			
			$db->query($query);
			
			echo '<h1> Pomyślnie włączono firmę nr '.$fid.'</h1>';
			echo '<a href="?id=firmy&strona=lista_firm"><input type="button" value="Powrót"></a>';
?>
	</div>
</div>