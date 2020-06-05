<?php

include('linkdb.php');

class login extends linkBd{

	function log(){

		$link = mysqli_connect($this->host,$this->user_db,$this->password_db,$this->database_db)
				or die(mysqli_error($link));

		if(isset($_POST['email']) and isset($_POST['password'])){

			$email = $_POST['email'];
			$password = $_POST['password'];
			$password = md5($password."aisruifgo9egoiehrugeiporjg9jthpgioerdnpiguerio09u45fh434h09fg093420t0gbhui9rwhfg21fi34yqfgqgjwbe4780g34fgmpoierjh");
			$check_email = mysqli_query($link, "SELECT * FROM user_acounts WHERE email LIKE '%".$email."%'");
			if ($check_email->num_rows > 0){
				$check_password = mysqli_query($link, "SELECT * FROM user_acounts WHERE password LIKE '%".$password."%'");
				if ($check_password->num_rows > 0){
					$_SESSION['loged_user'] = $email;
					header('Location:http://maket/mainStudent.html');
					exit();
				}
				else{
					echo "Всё хуйня, давай по новой";
				}
				}
			else
			{
				echo "Всё хуйня";
			}
			
		}

	}
}

if (isset($_POST['enter_log'])){
	$a = new login;
	$a -> link();
	$a -> log();
}
?>