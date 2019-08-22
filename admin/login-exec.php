<?php 
require_once 'includes/init.php';
require_once 'includes/db_con.php';

if(isset($_POST) && !empty($_POST)){
$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM users WHERE password = '{$password}' AND status = 'ACTIVE' AND (
username = '{$username}' OR email = '{$username}')";

$result = db_query($con, $sql);
if($result && db_num_rows($result) > 0){
    $user = db_fetch_assoc($result);

    session_start();
    $_SESSION['user'] = $user;
    $ip=ip();
    $now=now();
    
$sql = "INSERT INTO login_logs SET user_id = '{$user['id']}',ip_address ='{$ip}', created_at='{$now}'";
db_query($con,$sql);
    header('location:index.php');

	}
	else{
		header('location:login.php?error=Incorrect username/email and password combination');
	}
}

else{

	header('location:login.php?error=Access Denied');
}
