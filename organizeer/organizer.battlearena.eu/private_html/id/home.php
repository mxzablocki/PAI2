<script type="text/javascript" src="id/login.js"></script>
<?php
session_start();

if(empty($_SESSION['login_user']))
{
	//echo 0;
?>

<div id="box" class="panel">
<div class="admin_panel">
	<h1>Organizer - system komunikacji międzyoddziałowej z kalendarzem </h1>
	<div id="add_err"></div>
	<form action="" method="post">
		<input type="text" placeholder="Login" id="username" class="logowanie">
		<input type="password" placeholder="Hasło" id="password" class="logowanie">
		
		<div class="g-recaptcha" data-sitekey="6LeapTcUAAAAAEbxnkNwvwAnpw4uyB2DN5Kf_7t3"></div>
		<input type="button" id="login" value="Login" class="logowanie">
		<div id="error"></div> 
	</form>
	<div class="admin_panel_bottom"></div>
</div>
</div>
<?php
}else{
	//echo 1;
@include('id/loggedin.php');
}?>
