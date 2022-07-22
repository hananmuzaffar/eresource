<?php include "../process/auth.php";
if($_SESSION["isAdmin"] == 1): ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Student Info</title>
<?php include_once '../includes/nav.php' ?>
<?php include "../process/db.php" ?>
<div class="container">
    <div class="row">
<?php
if (isset($_GET['rollno'])) {
$rollno = $_GET['rollno'];
$sql = "SELECT * FROM students WHERE stu_rollno= $rollno";
    if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo '<h3 class="center">Student Information</h3>';
        while($row = mysqli_fetch_array($result)){
                echo '<div class="section">' ;
                echo '<font style="font-size:20px"><b>Student ID: </b></font>' . $row['stu_id']  ;
                echo '</div>
                    <div class="divider"></div>
                        <div class="section">
                        <fieldset>' ;
                echo '<legend>Student Details</legend>' ;
                echo '<font style="font-size:20px"><b>Student Name: </b></font>' . $row['stu_name'];
                echo '<br><font style="font-size:20px"><b>Student Roll no.: </b></font>' . $row['stu_rollno'];
                echo '<br><font style="font-size:20px"><b>Student Phone no.: </b></font>' . $row['stu_phone'];
                echo '<br><font style="font-size:20px"><b>Student Address: </b></font>' . $row['stu_address'];

                $course_sql = mysqli_query($link, "SELECT * From courses JOIN students ON courses.course_id = students.course_id WHERE stu_rollno=".$row['stu_rollno']);
                $course_row = mysqli_fetch_array($course_sql);
                echo '<br><font style="font-size:20px"><b>Course: </b></font>' . $course_row['course_name'];

                echo '<br><font style="font-size:20px"><b>Batch: </b></font>' . $row['batch'];

                echo '</fieldset>
                </div>';
                    
        }
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }}
}
?>
</div>
</div>
<?php include_once '../includes/footer.php' ?>
<?php endif; ?>