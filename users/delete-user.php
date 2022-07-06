<?php
include("../process/auth.php");
if($_SESSION["isAdmin"] == 1) {
    require("../process/db.php");
    $id = $_REQUEST['user_id'];
    $query = "DELETE FROM users WHERE user_id=$id"; 
    $result = mysqli_query($link, $query);
    header("Location: manage-user.php");
}
?>