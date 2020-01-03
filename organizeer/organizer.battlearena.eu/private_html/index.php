<?php
	error_reporting(1); 
	@$id=$_GET['id'];
	@$strona=$_GET['strona'];
	session_start();
	require_once('./zabezpieczenia/safe.php');
	require_once('./funkcje/db_connect.php');
	require_once('./funkcje/szyfrator.php');
	//print_r($_SESSION);
	header('Content-Type: text/html; charset=utf-8');
?>

	<?
	//<!--<div class="info">//print_r($_SESSION);echo $_GET[id].' '; echo $_GET['strona'];	
	
	//$szyfrator = new szyfr();
	//echo $szyfrator->szyfruj("1q2w3e");
	//echo $szyfrator->deszyfruj("RVVvb3RxNk9vVXJ0ZWJ3K2ZMOVc5UT09");

	//</div>-->
	?>
<html lang="pl-PL">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		
		<!-- Style -->
			<link rel="stylesheet" type="text/css" media="all" href="style/style.css" />
			<link rel="stylesheet" type="text/css" href="style/media-queries.css" />
			<link rel="stylesheet" type="text/css" href="style/header.css" />
			<link rel="stylesheet" type="text/css" href="style/menu.css" />
			<link rel="stylesheet" type="text/css" href="style/tresc.css" />
			<link rel="stylesheet" type="text/css" href="style/admin_panel.css" />
			<link rel="stylesheet" type="text/css" href="style/error.css" />
			<link rel="stylesheet" type="text/css" href="style/post.css" />
			<link rel="stylesheet" type="text/css" href="style/logowanie.css" />
			<link rel="stylesheet" type="text/css" href="style/tematy.css" />
		<!-- Style KONIEC -->
		
		<!-- Skrypty -->
			<script src='https://www.google.com/recaptcha/api.js'></script>		
			<script type="text/javascript" src="style/js/jquery-1.10.2.min.js"></script>
			<script type="text/javascript" src="style/js/jquery.backstretch.min.js"></script>
			<script type="text/javascript" src="style/js/textarea.js"></script>
			<script type="text/javascript" src="style/js/powiadomienia_w_przegladarkach.js"></script>
			<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
			<script type="text/javascript">
				$.backstretch("obrazy/tlo/<?PHP echo rand(1,5); ?>.jpg");
			</script>
		<!-- Skrypty KONIEC -->
	</head>
	
	<body>
		<div class="scanlines"></div>
		<!-- Header -->
		<div class="header-wrapper opacity">
			<div class="menu-wrapper-top"><div class="menu-wrapper">
				<div id="menu" class="menu">
					<ul id="tiny">
						<li><a <?php if(empty($_GET['id']) || ($_GET['id'] == id))echo 'class="active"'?> href="<?php $_SERVER['PHP_SELF'] ?>?id="><? if($_SESSION[login_user])echo "Menu"; else echo "Logowanie"; ?></a></li>
						<?if($_SESSION['rights']==3){?><li class="pra"><a <?php if(($_GET['id'] == pracownicy))echo 'class="active"'?> href="<?php $_SERVER['PHP_SELF'] ?>?id=pracownicy&strona=lista">Pracownicy</a></li>
						<li class="mag"><a <?php if(($_GET['id'] == magazyn))echo 'class="active"'?> href="<?php $_SERVER['PHP_SELF'] ?>?id=magazyn">Magazyn</a></li>
						<li class="nor"><a <?php if(($_GET['id'] == normy))echo 'class="active"'?> href="<?php $_SERVER['PHP_SELF'] ?>?id=normy">Normy</a></li>
						<?if($_SESSION['login_user']){?><li class="log right"><a href="<?php $_SERVER['PHP_SELF'] ?>?id=id&strona=logout">Wyloguj</a></li><?}?>
						<?}?>
					</ul>
				</div>
			</div></div>
		</div>
		<!-- Header KONIEC -->
		
		<!-- Menu -->
			
		<!-- Menu KONIEC -->
		<div class="wrapper"><!-- Begin Intro -->
<!-- Begin Blog Grid -->
<div class="blog-wrap">
		<!-- Treść -->
		<?php
			if (mysqli_connect_errno()) {
				@include('id/mysql.php');
			}
			else if(empty($_GET['id']) and(empty($_GET['strona'])) || ($_GET['id'] == id) and(empty($_GET['strona'])))
				@include('id/home.php');
			else if((($_GET['id'] == id) and (!empty($_GET['strona']))) || ((empty($_GET['id'])) and (!empty($_GET['strona']))))
			{
				if(file_exists('id/'.$strona.'.php'))
					@include('id/'.$strona.'.php');			
				else
					@include('id/brak.php');
			}
			else if(($_GET['id']) and(empty($_GET['strona'])))
			{
				if(file_exists($_GET['id'].'/home.php'))
					@include($_GET['id'].'/home.php');
				else
					@include('id/brak.php');
			}
			else if(($_GET['id']) and (!empty($_GET['strona'])))
			{
				if(file_exists($_GET['id'].'/'.$strona.'.php'))
					@include($_GET['id'].'/'.$strona.'.php');			
				else
					@include('id/brak.php');
			}
			else			
				@include('id/brak.php');
			
		?>
		<!-- Treść KONIEC -->
	
	</div></div>
	</body>
</html>