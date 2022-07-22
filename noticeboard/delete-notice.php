<?php
    require_once "../process/auth.php";
    require_once "../process/db.php" ;
    $id = $_REQUEST['id'];
    $query = "DELETE FROM notices WHERE notice_id=$id"; 
    $result = mysqli_query($link, $query);
    header("Location: manage-notice.php");
?>