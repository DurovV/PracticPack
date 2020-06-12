<?php
	
include ('linkdb.php');

class Autoris extends linkBd{



	public function Sin_in(){

		$link = mysqli_connect($this->host,$this->user_db,$this->password_db,$this->database_db)
			or die(mysqli_error($link));

		$user_name = htmlentities(mysqli_real_escape_string($link,$_POST['name']));
		$password = $_POST['password'];
		$password = md5($password."aisruifgo9egoiehrugeiporjg9jthpgioerdnpiguerio09u45fh434h09fg093420t0gbhui9rwhfg21fi34yqfgqgjwbe4780g34fgmpoierjh");
		$password = htmlentities(mysqli_real_escape_string($link,$password));			
		$email = htmlentities(mysqli_real_escape_string($link,$_POST['email']));


		$query = "INSERT INTO user_acounts VALUES(NULL, '$password','$user_name','$email')";

		$result = mysqli_query($link, $query)
			or die("ощибка" . mysqli_error($link));
		if ($result){
			$_SESSION['loged_user'] = $email;
			header('Location:http://maket/Start_page.html');
			exit();
		}
		
	}

	public function check(){

		$link = mysqli_connect($this->host,$this->user_db,$this->password_db,$this->database_db)
			or die(mysqli_error($link));

		if(isset($_POST['name'])
				and isset($_POST['password'])
				and isset($_POST['email'])
				and isset($_POST['rep_password']))
		{
			if($password == $rep_password){

				$len = strlen($password);
				if ($len < 8 or $len > 16){

					$email = $_POST['email'];
					$result = mysqli_query($link,"SELECT * FROM user_acounts WHERE email LIKE '%".$email."%'");
					if ($result->num_rows > 0){
						echo "Всё херня, давай по новой";
					}
					else{
						$a = new Autoris;
						$a -> Sin_in();
					}

				}
			}
		}
	}
}
if (isset($_POST['enter_Sin'])){
	$a = new Autoris;
	$a -> link();
	$a -> check();
}
?>