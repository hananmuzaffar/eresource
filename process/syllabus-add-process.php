<?php include 'auth.php' ?>
<?php
$valid_extensions = array('pdf'); // valid extensions
$path = "../resources/syllabuses/"; // upload directory
if($_FILES['syllabus'])
{
$syllabus = $_FILES['syllabus']['name'];
$tmp = $_FILES['syllabus']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($syllabus, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_syllabus = rand(1000,1000000)."-".$syllabus;
// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_syllabus); 
if(move_uploaded_file($tmp,$path)) 
{




$name = $_POST['name'];
$course = $_POST['course'];
$batch = $_POST['batch'];
$uploader = $_SESSION['user_id'];
$uploaded_on = date("Y-m-d");


//include database configuration file
include_once 'db.php';

//insert form data in the database
$insert = $link->query("INSERT INTO syllabus (syllabus_name,batch_id,course_id,syllabus_file,user_id,syl_uploaded_on) VALUES ('".$name."','".$batch."','".$course."','".$path."','".$uploader."','".$uploaded_on."')");
header('Location: ../syllabus/manage-syllabus.php');
}
} 
else 
{
echo 'invalid';
}
}
?>
