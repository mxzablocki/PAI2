<?php
session_start();
require_once('./../funkcje/db_connect.php');
require_once('./../funkcje/szyfrator.php');
$db = new Db();    
$szyfrator = new szyfr();
if(isset($_POST['response']))
{
	//$_SESSION['response'] = $_POST['response'];
	if($_POST['response']>0)
	{
		if(isset($_POST['username']) && isset($_POST['password']))
		{
			$db->connect();
			$username=$_POST['username'];
			$password=$szyfrator->szyfruj($_POST['password']);
			$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND active = 1";
			$result = $db->query($query);
			$row=$result->fetch_array(MYSQLI_ASSOC);
			$count = $result->num_rows;
			if($count==1)
			{
				$_SESSION['login_user']=$row['id'];
				$_SESSION['username']=$row['username'];
				$_SESSION['rights']=$row['privilige'];
			}
		}
	}
}

?>