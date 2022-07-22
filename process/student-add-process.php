<?php include 'auth.php';
if ($_SESSION["isAdmin"] == 1) {
$name = $_POST['name'];
$rollno = $_POST['rollno'];
$phone = $_POST['stu_phone'];
$address = $_POST['stu_address'];
$course = $_POST['course'];
$batch = $_POST['batch'];
$password = $_POST['password'];
$param_password = password_hash($password, PASSWORD_DEFAULT);

//include database configuration file
include_once 'db.php';

//insert form data in the database
$insert = $link->query("INSERT INTO students (stu_name,stu_rollno,stu_phone,stu_address,course_id,batch,stu_password) VALUES ('".$name."','".$rollno."','".$phone."','".$address."','".$course."','".$batch."','".$param_password."')");
header('Location: ../students/manage-student.php');
}
else header('Location: ../index.php');
?>
