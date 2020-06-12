<?php

include('linkdb.php');

class new_rights extends linkdb{


	function db_name(){

		$id = $_SESSION['loged_user'];

		$db_name = mysqli_query($link, "SELECT * FROM `user_rights` WHERE user_id = '$id' ");
		$db_name = $db_name['db_name'];

	

		function updete_moder(){

			$link = mysqli_connect($this->host,$this->user_db,$this->password_db,$this->database_db)
					or die(mysqli_error($link));

			$new_moder = $_POST['new_moder'];
			$check_Moder_In_Db = mysqli_query($link, "SELECT * FROM `user_acounts` WHERE email = '$new_moder' ");
			$id_moder = mysqli_fetch_assoc($check_Moder_In_Db);
			$id_moder = $id_moder['user_id'];
			if($id_moder){
				$result = mysqli_query($link, "INSERT INTO `user_rights` VALUES('$id_moder', '$db_name', NULL, 1, NULL, NULL)");
			}
			else{
				echo "Ошибка, Модератор не добавлен.";
			}

		}


		function delete_moder(){

			$link = mysqli_connect($this->host,$this->user_db,$this->password_db,$this->database_db)
					or die(mysqli_error($link));

			$del_moder = $_POST['del_moder'];
			$check_Moder_In_Db = mysqli_query($link, "SELECT * FROM `user_acounts` WHERE email = '$del_moder' ");
			$id_moder = mysqli_fetch_assoc($check_Moder_In_Db);
			$id_moder = $id_moder['user_id'];
			if($id_moder){
				$result = mysqli_query($link, "DELETE FROM 'user_rights' WHERE user_id = '$id_moder', db_name = '$db_name' ");
			}
			else{
				echo ("Ошибка, Модератор не удалён.")
			}

		}

		function updete_user(){

			$link = mysqli_connect($this->host,$this->user_db,$this->password_db,$this->database_db)
					or die(mysqli_error($link));

			$new_user = $_POST['new_user'];
			$check_User_In_Db = mysqli_query($link, "SELECT * FROM `user_acounts` WHERE email = '$new_user' ");
			$id_n_user = mysqli_fetch_assoc($check_User_In_Db);
			$id_n_user = $id_n_user['user_id'];
			if($id_n_user){
				$result = mysqli_query($link, "INSERT INTO `user_rights` VALUES('$id_n_user', '$db_name', NULL, NULL, 1, NULL)");
			}
			else{
				echo "Ошибка, Модератор не добавлен.";
			}

		}


		function delete_user(){

			$link = mysqli_connect($this->host,$this->user_db,$this->password_db,$this->database_db)
					or die(mysqli_error($link));

			$del_user = $_POST['del_user'];
			$check_User_In_Db = mysqli_query($link, "SELECT * FROM `user_acounts` WHERE email = '$del_user' ");
			$id_n_user = mysqli_fetch_assoc($check_User_In_Db);
			$id_n_user = $id_n_user['user_id'];
			if($id_moder){
				$result = mysqli_query($link, "DELETE FROM 'user_rights' WHERE user_id = '$id_n_user', db_name = '$db_name' ");
			}
			else{
				echo ("Ошибка, Модератор не удалён.")
			}

		}

}
}

$a = new new_rights;
$a -> link();
$a -> db_name();
if (isset($_POST['ent_up'])){
	$a -> updete_moder();
}
if (isset($_POST['ent_del'])){
	$a -> delete_moder();
}
if (isset($_POST['ent_up_user'])){
	$a -> updete_user();
}
if (isset($_POST['ent_del_user'])){
	$a -> delete_user();
}

?>