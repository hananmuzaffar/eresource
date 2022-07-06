<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["stu_loggedin"]) || $_SESSION["stu_loggedin"] !== true){
    header("location: ../candidate/StuLogin.php");
    exit;
}
?>