<?php include '../process/auth.php';?>
<!DOCTYPE HTML>
<html>
<head>
<title>Syllabuses</title>
<?php include_once '../includes/nav.php' ?>
<?php include "../process/db.php" ?>
<div class="container">
    <div class="row">
        <h3 class="center">Syllabuses</h3>
    </div>
<?php
$user_id = $_SESSION["user_id"];
$sql = ($_SESSION["isAdmin"] == 1) ? "SELECT * FROM syllabus ORDER BY syl_uploaded_on DESC" : "SELECT * FROM syllabus WHERE user_id = $user_id ORDER BY syl_uploaded_on DESC"   ;
$rs_result = $link->query($sql);
?> 
<?php include_once '../includes/syllabus-search-form.php' ?>
<table class="centered">
  <thead>
        <tr>
            <th hidden>Syllabus ID</th>
            <th>Title</th>
            <th>Batch</th>
            <th>Course</th>
            <th>Uploaded by</th>
            <th>Uploaded on</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
<?php while($row = $rs_result->fetch_assoc()): ?> 
    <tbody>
        <tr>
            <td hidden><?php echo $row["syllabus_id"]; ?></td>

            <td><?php echo $row["syllabus_name"]; ?></td>

            <td><?php echo $row['batch']; ?></td>

            <td><?php
            $course_sql = mysqli_query($link, "SELECT * From courses JOIN syllabus ON courses.course_id = syllabus.course_id WHERE syllabus_id=".$row['syllabus_id']);
            $course_row = mysqli_fetch_array($course_sql);
            echo $course_row['course_name'];
            ?></td>

            <td><?php
            $uploader_sql = mysqli_query($link, "SELECT * From users JOIN syllabus ON users.user_id = syllabus.user_id WHERE syllabus_id=".$row['syllabus_id']);
            $uploader_row = mysqli_fetch_array($uploader_sql);
            echo $uploader_row['name'];
            ?></td>

            <td><?php $syl_uploaded_on= date('d/m/Y',strtotime($row['syl_uploaded_on'])); 
            echo $syl_uploaded_on;
            ?></td>
           
           <td><?php $file = $row["syllabus_file"];
            echo "<a href='$file' target='_blank'><i class='fa-solid fa-eye tooltipped' data-position='top' data-tooltip='View'></i></a>";
            ?></td>
            
            <td><?php echo "<a href='./delete-syllabus.php?id=" . $row['syllabus_id'] ."'><i class='fa-solid fa-trash-can tooltipped red-text' data-position='top' data-tooltip='Delete'></i></a>";?></td>
        </tr>
    </tbody>
<?php endwhile; ?> 
</table>

</div>
<?php include_once '../includes/add_button.php' ?>
<?php include_once '../includes/footer.php' ?>