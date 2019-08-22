<?php 
require_once 'includes/init.php';
require_once 'includes/user-check.php';
require_once 'includes/db_con.php';

$u = $_GET['u'];
$sql = "DELETE FROM users WHERE username = '{$u}'";
db_query($con, $sql);

if(mysqli_affected_rows($con)> 0) {
	header('location:users.php?msg=user deleted');
}
else{
	header('location:users.php?error=Error while deleting please try again letter');
}