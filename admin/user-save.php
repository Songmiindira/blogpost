<?php 

require_once 'includes/init.php';
require_once 'includes/user-check.php';
require_once 'includes/db_con.php';


if(isset($_POST) && !empty($_POST)){
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = sha1($_POST['password']);
$address = $_POST['address'];
$contact = $_POST['contact'];
$type = $_POST['type'];
$status = $_POST['status'];

$now = now();
$msg = '';

$sql = "SET first_name ='{$first_name}',"
			."middle_name = '{$middle_name}',"
			."last_name = '{$last_name}',"
			."email = '{$email}',"
			."username = '{$username}',"
			."address = '{$address}',"
			."contact = '{$contact}',"
			."type = '{$type}',"
			."status = '{$status}',"
			."updated_at = '{$now}'";

	if(isset($_POST['id']) && !empty($_POST['id'])){
			$id = $_POST['id'];

			$sql= $sql."WHERE id = '{$id}'";

			 $msg = 'User updated';

			if(isset($_POST['password']) && !empty($_POST['password'])){
				$o_password = sha1($_POST['o_password']);
				$query = "SELECT slug FROM users WHERE id= '{$id}' AND password= '{$o_password}'";
				$result = db_query($con, $sql);

				if($result && db_num_rows($result)> 0){
					$sql = $sql.",password = '{$password}'";
				}
				else{
					$user = db_fetch_assoc($result);
					header('location:user-edit.php?u='.$user['username'].'&error=Old password doesnt match our records. please try again later.');
				}
			}	

			// $sql= $sql."WHERE id = '{$id}'";

			// $msg = 'User updated';	
		}
			else{

				$sql = "INSERT INTO users ".$sql." created_at = '{$now}', password = '{$password}'";
			   $msg = 'User Added';
			}



			if(db_query($con, $sql)){
				header('location:users.php?msg='.$msg);
			}
else{

header('location:user-add.php?error=Problem While Saving the data.please try again!');
}


}
else{
	header('location:user-add.php?error=Problem While Saving the data.please try again!');
}
