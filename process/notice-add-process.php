<?php include 'auth.php' ?>
<?php
$title = $_POST['name'];
$course = $_POST['course'];
$batch = $_POST['batch'];
$uploader = $_SESSION['user_id'];
$uploaded_on = date("Y-m-d");


//include database configuration file
include_once 'db.php';

//insert form data in the database
$insert = $link->query("INSERT INTO notices (notice,batch_id,course_id,user_id,notice_uploaded_on) VALUES ('".$title."','".$batch."','".$course."','".$uploader."','".$uploaded_on."')");
header('Location: ../noticeboard/manage-notice.php');
?>
