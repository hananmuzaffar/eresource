<?php include '../process/auth.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Paper Search Results</title>
<?php include_once '../includes/nav.php' ?>
<?php include "../process/db.php" ?>
<?php
$sql = "SELECT * FROM papers";
if( isset($_GET['search']) ){
    $name  = $year = mysqli_real_escape_string($link, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM papers WHERE paper_name LIKE '%$name%' or exam_year LIKE '%$year'";
}
$result = $link->query($sql);
?>
<div class="container">
    <div class="row">
        <h4 class="center">Search Results for <strong><?php echo $_GET["search"]; ?></strong></h4>
    </div>
<?php include_once '../includes/paper-search-form.php' ?>
<table class="centered">
  <thead>
        <tr>
            <th hidden>Paper ID</th>
            <th>Title</th>
            <th>Batch</th>
            <th>Course</th>
            <th>Type</th>
            <th>Year</th>
            <th>Uploaded by</th>
            <th>Uploaded on</th>
        </tr>
    </thead>
<?php while($row = $result->fetch_assoc()): ?> 
    <tbody>
        <tr>
            <td hidden><?php echo $row["paper_id"]; ?></td>

            <td><?php echo $row["paper_name"]; ?></td>

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

            <td><?php echo $row["paper_type"]; ?></td>

            <td><?php echo $row["exam_year"]; ?></td>

            <td><?php
            $uploader_sql = mysqli_query($link, "SELECT * From users JOIN papers ON users.user_id = papers.user_id WHERE paper_id=".$row['paper_id']);
            $uploader_row = mysqli_fetch_array($uploader_sql);
            echo $uploader_row['name'];
            ?></td>

            <td><?php $paper_uploaded_on= date('d/m/Y',strtotime($row['paper_uploaded_on'])); 
            echo $paper_uploaded_on;
            ?><td>

            <!-- <td><?php //echo "<a href='./edit-paper.php?id=" . $row['paper_id'] ."'><i class='fa-solid fa-pen-to-square tooltipped' data-position='top' data-tooltip='Edit'></i></a>";?></td> -->
            <td><?php echo "<a href='".$row['paper_file']."?id=" . $row['paper_id'] ."' target='_blank'><i class='fa-solid fa-eye tooltipped' data-position='top' data-tooltip='View'></i></a>";?></td>
            <td><?php echo "<a href='./delete-paper.php?id=" . $row['paper_id'] ."'><i class='fa-solid fa-trash-can tooltipped red-text' data-position='top' data-tooltip='Delete'></i></a>";?></td>
        </tr>
    </tbody>
<?php endwhile; ?> 
</table>
</div>
<?php include_once '../includes/add_button.php' ?>
<?php include_once '../includes/footer.php' ?>