<?php
    require_once "../process/auth.php";
    if($_SESSION["isAdmin"] == 1) {
    require_once "../process/db.php" ;
    $rollno = $_REQUEST['rollno'];
    $query = "DELETE FROM students WHERE stu_rollno=$rollno"; 
    $result = mysqli_query($link, $query);
    header("Location: manage-student.php");
}
?>