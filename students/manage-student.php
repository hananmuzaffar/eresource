<?php include '../process/auth.php';
if($_SESSION["isAdmin"] == 1):?>
<!DOCTYPE HTML>
<html>
<head>
<title>Students</title>
<?php include_once '../includes/nav.php' ?>
<?php include "../process/db.php" ?>
<div class="container">
    <div class="row">
        <h3 class="center">Students</h3>
    </div>
<?php
$sql = "SELECT * FROM students ORDER BY stu_id ASC";
$rs_result = $link->query($sql);
?> 
<?php include_once '../includes/stu-search-form.php' ?>
<table class="centered">
  <thead>
<tr>
    <th hidden>ID</th>
    <th>Roll no.</th>
    <th>Student name</th>
    <th>Course</th>
    <th>Batch</th>
</tr>
    </thead>
<?php 
 while($row = $rs_result->fetch_assoc()): ?> 
            <tr>
            <td hidden><?php echo $row["stu_id"]; ?></td>

            <td><?php echo $row["stu_rollno"]; ?></td>

            <td><?php echo $row["stu_name"]; ?></td>

            <td><?php $course_sql = mysqli_query($link, "SELECT * From courses JOIN students ON courses.course_id = students.course_id WHERE stu_rollno=".$row['stu_rollno']);
              $course_row = mysqli_fetch_array($course_sql);
                echo $course_row['course_name'];
                ?></td>

            <td><?php
              $batch_sql = mysqli_query($link, "SELECT * From batch JOIN students ON batch.batch_id = students.batch_id WHERE stu_rollno=".$row['stu_rollno']);
              $batch_row = mysqli_fetch_array($batch_sql);
                echo $batch_row['batch_name'];
            ?></td>

            <td><?php echo "<a href='./edit-student.php?rollno=" . $row['stu_rollno'] ."'><i class='fa-solid fa-pen-to-square tooltipped' data-position='top' data-tooltip='Edit'></i></a>";?></td>
            <td><?php echo "<a href='./student-info.php?rollno=" . $row['stu_rollno'] ."'><i class='fa-solid fa-eye tooltipped' data-position='top' data-tooltip='View'></i></a>";?></td>
            <td><?php echo "<a href='./delete-student.php?rollno=" . $row['stu_rollno'] ."'><i class='fa-solid fa-trash-can tooltipped red-text' data-position='top' data-tooltip='Delete'></i></a>";?></td>
            </tr>
<?php endwhile; ?> 
</table>
</div>
<?php include_once '../includes/add_button.php';
include_once '../includes/footer.php';
endif; ?>