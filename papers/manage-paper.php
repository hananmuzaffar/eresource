<?php include '../process/auth.php';?>
<!DOCTYPE HTML>
<html>
<head>
<title>Papers</title>
<?php include_once '../includes/nav.php' ?>
<?php include "../process/db.php" ?>
<div class="container">
    <div class="row">
        <h3 class="center">Papers</h3>
    </div>
<?php
$user_id = $_SESSION["user_id"];
$sql = ($_SESSION["isAdmin"] == 1) ? "SELECT * FROM papers ORDER BY paper_uploaded_on DESC" : "SELECT * FROM papers WHERE user_id = $user_id ORDER BY paper_uploaded_on DESC"   ;
$rs_result = $link->query($sql);
?> 
<?php include_once '../includes/paper-search-form.php' ?>
<table class="centered">
  <thead>
        <tr>
            <th hidden>Paper ID</th>
            <th>Title</th>
            <th>Batch</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Type</th>
            <th>Year</th>
            <th>Uploaded by</th>
            <th>Uploaded on</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
<?php while($row = $rs_result->fetch_assoc()): ?> 
    <tbody>
        <tr>
            <td hidden><?php echo $row["paper_id"]; ?></td>

            <td><?php echo $row["paper_name"]; ?></td>

            <td><?php echo $row['batch']; ?></td>

            <td><?php
            $course_sql = mysqli_query($link, "SELECT * From courses JOIN papers ON courses.course_id = papers.course_id WHERE paper_id=".$row['paper_id']);
            $course_row = mysqli_fetch_array($course_sql);
            echo $course_row['course_name'];
            ?></td>

            <td><?php echo $row["semester"]; ?></td>

            <td><?php echo $row["paper_type"]; ?></td>

            <td><?php echo $row["exam_year"]; ?></td>

            <td><?php
            $uploader_sql = mysqli_query($link, "SELECT * From users JOIN papers ON users.user_id = papers.user_id WHERE paper_id=".$row['paper_id']);
            $uploader_row = mysqli_fetch_array($uploader_sql);
            echo $uploader_row['name'];
            ?></td>

            <td><?php $paper_uploaded_on= date('d/m/Y',strtotime($row['paper_uploaded_on'])); 
            echo $paper_uploaded_on;
            ?></td>

            
            <td><?php //echo "<a href='".$row['paper_file']."?id=" . $row['paper_id'] ."' target='_blank'><i class='fa-solid fa-eye tooltipped' data-position='top' data-tooltip='View'></i></a>";
            $file = $row["paper_file"];
            echo "<a href='$file' target='_blank'><i class='fa-solid fa-eye tooltipped' data-position='top' data-tooltip='View'></i></a>";
            ?></td>
            
            <td><?php echo "<a href='./delete-paper.php?id=" . $row['paper_id'] ."'><i class='fa-solid fa-trash-can tooltipped red-text' data-position='top' data-tooltip='Delete'></i></a>";?></td>
        </tr>
    </tbody>
<?php endwhile; ?> 
</table>

</div>
<?php include_once '../includes/add_button.php' ?>
<?php include_once '../includes/footer.php' ?>