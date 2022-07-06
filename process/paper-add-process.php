<?php include 'auth.php' ?>
<?php
$valid_extensions = array('pdf'); // valid extensions
$path = "../resources/papers/"; // upload directory
if($_FILES['paper'])
{
$paper = $_FILES['paper']['name'];
$tmp = $_FILES['paper']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($paper, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_paper_file = rand(1000,1000000)."-".$paper;
// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_paper_file); 
if(move_uploaded_file($tmp,$path)) 
{




$name = $_POST['name'];
$course = $_POST['course'];
$batch = $_POST['batch'];
$semester = $_POST['semester'];
$exam_year = $_POST['year'];
$paper_type = $_POST['paper_type'];
$uploader = $_SESSION['user_id'];
$uploaded_on = date("Y-m-d");


//include database configuration file
include_once 'db.php';

//insert form data in the database
$insert = $link->query("INSERT INTO papers (paper_name,batch_id,course_id,semester,exam_year,paper_type,paper_file,user_id,paper_uploaded_on) VALUES ('".$name."','".$batch."','".$course."','".$semester."','".$exam_year."','".$paper_type."','".$path."','".$uploader."','".$uploaded_on."')");
header('Location: ../papers/manage-paper.php');
}
} 
else 
{
echo 'invalid';
}
}
?>
