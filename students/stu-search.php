<?php include '../process/auth.php';
if($_SESSION["isAdmin"] == 1): ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Student Search Results</title>
<?php include_once '../includes/nav.php' ?>
<?php include "../process/db.php" ?>
<?php
$sql = "SELECT * FROM students";
if( isset($_GET['search']) ){
    $name = $rollno = mysqli_real_escape_string($link, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM students WHERE stu_name LIKE '%$name%' or stu_rollno LIKE '$rollno'";
}
$result = $link->query($sql);
?>
<div class="container">
    <div class="row">
        <h4 class="center">Search Results for <strong><?php echo $_GET["search"]; ?></strong></h4>
    </div>
<?php include_once '../includes/stu-search-form.php' ?>
<table class="highlight">
<tr>
<th hidden>ID</th>
    <th>Roll no.</th>
    <th>Student name</th>
    <th>Course</th>
    <th>Batch</th>
<?php while($row = $result->fetch_assoc()): ?>
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
                echo $batch_row['batch_name'] ;
            ?></td>

            <td><?php echo "<a href='./edit-student.php?rollno=" . $row['stu_rollno'] ."'><i class='fa-solid fa-pen-to-square tooltipped' data-position='top' data-tooltip='Edit'></i></a>";?></td>
            <td><?php echo "<a href='./student-info.php?rollno=" . $row['stu_rollno'] ."'><i class='fa-solid fa-eye tooltipped' data-position='top' data-tooltip='View'></i></a>";?></td>
            <td><?php echo "<a href='./delete-student.php?rollno=" . $row['stu_rollno'] ."'><i class='fa-solid fa-trash-can tooltipped red-text' data-position='top' data-tooltip='Delete'></i></a>";?></td>
    </tr>
    <?php endwhile; ?>
</table>
</div>
<?php include_once '../includes/add_button.php' ?>
<?php include_once '../includes/footer.php' ?>
<?php endif; ?>