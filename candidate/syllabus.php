<?php include '../candidate/stu-process/stu-auth.php';?>
<!DOCTYPE HTML>
<html>
<head>
<title>Syllabuses</title>
<?php include_once 'stu-includes/stu-nav.php' ?>
<?php include "../process/db.php" ?>
<div class="container">
    <div class="row">
        <h3 class="center">Syllabus</h3>
    </div>
<?php
$course = $_SESSION["course_id"];
$batch = $_SESSION["batch_id"];
$sql = "SELECT * FROM syllabus WHERE course_id = $course AND batch_id = $batch ORDER BY syl_uploaded_on DESC"   ;
$rs_result = $link->query($sql);
?> 

<table class="centered">
  <thead>
        <tr>
            <th hidden>Syllabus ID</th>
            <th>Title</th>
            <th>Batch</th>
            <th>Course</th>
            <th>Uploaded on</th>
        </tr>
    </thead>
<?php while($row = $rs_result->fetch_assoc()): ?> 
    <tbody>
        <tr>
            <td hidden><?php echo $row["syllabus_id"]; ?></td>

            <td><?php echo '<i class="fa-solid fa-file blue-text text-darken-4 left"></i>' . $row["syllabus_name"]; ?></td>

            <td><?php
                $batch_sql = mysqli_query($link, "SELECT * From batch JOIN syllabus ON batch.batch_id = syllabus.batch_id WHERE syllabus_id=".$row['syllabus_id']);
                $batch_row = mysqli_fetch_array($batch_sql);
                echo $batch_row['batch_name'];
            ?></td>

            <td><?php
            $course_sql = mysqli_query($link, "SELECT * From courses JOIN syllabus ON courses.course_id = syllabus.course_id WHERE syllabus_id=".$row['syllabus_id']);
            $course_row = mysqli_fetch_array($course_sql);
            echo $course_row['course_name'];
            ?></td>

            <td><?php $syl_uploaded_on= date('d/m/Y',strtotime($row['syl_uploaded_on'])); 
            echo $syl_uploaded_on;
            ?></td>

            <td><?php 
            $file = $row["syllabus_file"];
            echo "<a href='$file' target='_blank' download><i class='fa-solid fa-download tooltipped' data-position='top' data-tooltip='Download'></i></a>";?></td>
        </tr>
    </tbody>
<?php endwhile; ?> 
</table>

</div>
<?php include_once '../includes/footer.php' ?>