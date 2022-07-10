<?php
include("../process/auth.php");
    require("../process/db.php");
    $id = $_REQUEST['id'];
    $query = "DELETE FROM notices WHERE notice_id=$id"; 
    $result = mysqli_query($link, $query);
    header("Location: manage-notice.php");
?>