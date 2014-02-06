<?php
$nickname = $_POST['nickname'];
$email = $_POST['email'];
$wallet = $_POST['wallet'];
$password = hash('sha256', $_POST['password']);
if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/",$nickname))
	{
	echo "Invalid characters in the name!";
	exit();	
	}
	else
		{
		include_once 'lib/safemysql.class.php';
		$db = new SafeMySQL();
		$sql = "INSERT INTO users (name, email, wallet_nxt, password) VALUES (?s, ?s, ?s, ?s)";
		$db->query($sql,$nickname,$email,$wallet,$password);
		sleep(2);
		header ("location: index.php");
		}
?>