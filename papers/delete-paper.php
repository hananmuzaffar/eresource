<?php
include("../process/auth.php");
    require("../process/db.php");
    $id = $_REQUEST['id'];
    $query = "DELETE FROM papers WHERE paper_id=$id"; 
    $result = mysqli_query($link, $query);
    header("Location: manage-paper.php");
?>