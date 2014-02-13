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
		$result = $db->getAll("SELECT * FROM users");
			for($i = 0; $i < count($result); $i++)
			{
				if($result[$i]['name'] == $nickname)
					{
						echo "Error. Nickname already used!";
						exit();
					}elseif($result[$i]['email'] == $email)
							{
								echo "Error. E-mail already used!";
								exit();
							}
							else{
								$sql = "INSERT INTO users (name, email, wallet_nxt, password) VALUES (?s, ?s, ?s, ?s)";
								$db->query($sql,$nickname,$email,$wallet,$password);
								sleep(2);
								header("location: index.php");
								break 1;
							}
			}	
		}
?>