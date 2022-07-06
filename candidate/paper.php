<?php include '../candidate/stu-process/stu-auth.php';?>
<!DOCTYPE HTML>
<html>
<head>
<title>Papers</title>
<?php include_once 'stu-includes/stu-nav.php' ?>
<?php include "../process/db.php" ?>
<div class="container">
    <div class="row">
        <h3 class="center">Papers</h3>
    </div>
<?php
$course = $_SESSION["course_id"];
$sql = "SELECT * FROM papers WHERE course_id = $course ORDER BY paper_uploaded_on DESC"   ;
$rs_result = $link->query($sql);
?> 

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
            <th>Uploaded on</th>
        </tr>
    </thead>
<?php while($row = $rs_result->fetch_assoc()): ?> 
    <tbody>
        <tr>
            <td hidden><?php echo $row["paper_id"]; ?></td>

            <td><?php echo '<i class="fa-solid fa-file blue-text text-darken-4 left"></i>' . $row["paper_name"]; ?></td>

            <td><?php
                $batch_sql = mysqli_query($link, "SELECT * From batch JOIN papers ON batch.batch_id = papers.batch_id WHERE paper_id=".$row['paper_id']);
                $batch_row = mysqli_fetch_array($batch_sql);
                echo $batch_row['batch_name'];
            ?></td>

            <td><?php
            $course_sql = mysqli_query($link, "SELECT * From courses JOIN papers ON courses.course_id = papers.course_id WHERE paper_id=".$row['paper_id']);
            $course_row = mysqli_fetch_array($course_sql);
            echo $course_row['course_name'];
            ?></td>

            <td><?php echo $row["semester"]; ?></td>

            <td><?php echo $row["paper_type"]; ?></td>

            <td><?php echo $row["exam_year"]; ?></td>

            <td><?php $paper_uploaded_on= date('d/m/Y',strtotime($row['paper_uploaded_on'])); 
            echo $paper_uploaded_on;
            ?></td>

            <td><?php 
            $file = $row["paper_file"];
            echo "<a href='$file' target='_blank' download><i class='fa-solid fa-download tooltipped' data-position='top' data-tooltip='Download'></i></a>";?></td>
        </tr>
    </tbody>
<?php endwhile; ?> 
</table>

</div>
<?php include_once '../includes/footer.php' ?>