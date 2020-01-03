<?
	if(session_id() == '' || !isset($_SESSION)) {
		// session isn't started
		session_start();
	}
	if(isset($_GET['id']))
	{
		if($_GET['id'] != '' && ($_SESSION['login_user'] == ''))
		{
			echo 'Brak Dostępu';
			exit();
		}
	}
?>