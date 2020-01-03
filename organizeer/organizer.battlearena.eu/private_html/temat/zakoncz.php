<div class="admin_panel">
	<div id="content">
<?
	$nr_tematu = $_GET['nr_tematu'];
	//echo $nr_tematu;
	
	$db = new Db();
	$db->connect();
	
	$query = 	"SELECT * FROM tematy t
				LEFT JOIN tematy_dane td ON td.tematy_id = t.id
				WHERE t.id = $nr_tematu";
	//echo $query;
	$result = $db->query($query);
	while($row = $result->fetch_array())
	{
		$rows[] = $row;
	}
	echo "<b>Temat : </b>".$rows[0]['nazwa']."<hr>";
	echo "<div>Został zakończony</div>";
	
	
	$query = 	"UPDATE tematy SET zakonczony = 1
				WHERE id = $nr_tematu";
	//echo $query;
	$db->query($query);

	$result->close();
	
	$db->close();
?>
<p>Zostaniesz przekierowany na stronę główną za <span id="count">5</span> sekund</p>

<script type="text/javascript">

window.onload = function(){

(function(){
  var counter = 5;

  setInterval(function() {
    counter--;
    if (counter >= 0) {
      span = document.getElementById("count");
      span.innerHTML = counter;
    }
    // Display 'counter' wherever you want to display it.
    if (counter === 0) {
        window.location.replace("/");
        clearInterval(counter);
    }

  }, 1000);

})();

}

</script>
	</div>
</div>