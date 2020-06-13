<?php

include('linkdb.php');

class loginAdmin extends linkBd{

	function log_Ad(){

		$link = mysqli_connect($this->host,$this->user_db,$this->password_db,$this->database_db)
				or die(mysqli_error($link));

		if(isset($_POST['name']) and isset($_POST['password'])){

			$name = $_POST['name'];
			$name = htmlentities($name);
			$password = $_POST['password'];

			//шифрование пароля 
			$password = md5($password."aisruifgo9egoiehrugeiporjg9jthpgioerdnpiguerio09u45fh434h09fg093420t0gbhui9rwhfg21fi34yqfgqgjwbe4780g34fgmpoierjh");

			//проверека на наличие email в бд
			$check = mysqli_query($link, "SELECT * FROM `admins` WHERE name='".$name."'");
			$user = mysqli_fetch_assoc($check);

			if ($user)
			{
				//проверка на наличие пароля в бд
				$check_id = $user['id'];
				$check_password = mysqli_query($link, "SELECT password FROM `admins` WHERE id ='".$check_id."'");
				$check_password = mysqli_fetch_assoc($check_password);

				if ($check_password['password'] == $password)
				{
					$_SESSION['loged_Admin'] = $check_id;

					header('Location:http://maket/AdminPanel.html');
					exit();
				}
				
				else{
					echo "Не правильно набран пароль";
				}
			}
			else
			{
				echo "Не правильно набран email";
			}
			
		}

	}
}

if (isset($_POST['enter_log'])){
	$a = new loginAdmin;
	$a -> link();
	$a -> log_Ad();
}
?>