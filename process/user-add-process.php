<?php include 'auth.php';
if ($_SESSION["isAdmin"] == 1) {
$name = $_POST['name'];
$username = $_POST['username'];
$department = $_POST['dept_id'];
$password = $_POST['password'];
$param_password = password_hash($password, PASSWORD_DEFAULT);
$user_type = $_POST['user_type'];

//include database configuration file
include_once 'db.php';

//insert form data in the database
$insert = $link->query("INSERT users (name,username,password,dept_id,isAdmin) VALUES ('".$name."','".$username."','".$param_password."','".$department."','".$user_type."')");
header('Location: ../users/manage-user.php');
}
else header('Location: ../index.php');
?>
