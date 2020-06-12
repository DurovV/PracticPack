<?php

include('linkdb.php');
class ff extends linkBd{ 
	function g(){

	$link = mysqli_connect($this->host,$this->user_db,$this->password_db,$this->database_db)
				or die(mysqli_error($link));
				
	$email = "vovandrion@mail.ru";
	$check_id = mysqli_query($link, "SELECT * FROM `user_acounts` WHERE email='".$email."'");
	$result = mysqli_fetch_assoc($check_id);
	print_r($result);


	
	echo $r;

}
}
$a = new ff;
$a -> link();
$a -> g();

?>