<?php
session_start();

include('linkdb.php');
//include('login.php');

class chenges_profile extends linkBd{
	function chenge(){

		$name = $_POST['new_name'];
		$email = $_POST['new_email'];
		$password = $_POST['new_password'];

		$link = mysqli_connect($this->host,$this->user_db,$this->password_db,$this->database_db)
				or die(mysqli_error($link));

		$id = $_SESSION['loged_user'];
		print_r($_SESSION['loged_user']);

		if (strlen($name) > 0){
			$chenge_name = mysqli_query($link, "UPDATE `user_acounts` SET `user_name`= '$name' WHERE `user_id` = '$id'");
			echo 1;
		}
		if(strlen($password) > 8 or strlen($password) < 16){
			$password = md5($password."aisruifgo9egoiehrugeiporjg9jthpgioerdnpiguerio09u45fh434h09fg093420t0gbhui9rwhfg21fi34yqfgqgjwbe4780g34fgmpoierjh");
			$chenge_password = mysqli_query($link, "UPDATE `user_acounts` SET `password` = '$password' WHERE `user_id` = '$id' ");
		}
		if($email){
			$chenge_email = mysqli_query($link, "UPDATE `user_acounts` SET `email` = '$email' WHERE `user_id` = '$id' ");	
		}

	}
}

if(isset($_POST['enter_chenge'])){
	$a = new chenges_profile;
	$a -> link();
	$a -> chenge();
}



?>