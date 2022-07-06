<?php include '../process/auth.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Syllabus Search Results</title>
<?php include_once '../includes/nav.php' ?>
<?php include "../process/db.php" ?>
<?php
$sql = "SELECT * FROM syllabus";
if( isset($_GET['search']) ){
    $name  = $course = mysqli_real_escape_string($link, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM syllabus JOIN courses ON syllabus.course_id = courses.course_id WHERE syllabus_name LIKE '%$name%' or syllabus.course_id LIKE '%$course'";
}
$result = $link->query($sql);
?>
<div class="container">
    <div class="row">
        <h4 class="center">Search Results for <strong><?php echo $_GET["search"]; ?></strong></h4>
    </div>
<?php include_once '../includes/syllabus-search-form.php' ?>
<table>
    <thead>
        <tr>
            <th hidden>ID</th>
            <th hidden>ID</th>
            <th>Title</th>
            <th>Batch</th>
            <th>Course</th>
            <th>Uploaded by</th>
            <th>Uploaded on</th>
        </tr>
    </thead>
<?php
while($row = $result->fetch_assoc()){
    ?>
    <tbody>

    </tbody>
    <tr>
        <td hidden><?php echo $row["syllabus_id"]; ?></td>

            <td><?php echo $row["syllabus_name"]; ?></td>

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

            <td><?php
            $uploader_sql = mysqli_query($link, "SELECT * From users JOIN syllabus ON users.user_id = syllabus.user_id WHERE syllabus_id=".$row['syllabus_id']);
            $uploader_row = mysqli_fetch_array($uploader_sql);
            echo $uploader_row['name'];
            ?></td>

            <td><?php $syl_uploaded_on= date('d/m/Y',strtotime($row['syl_uploaded_on'])); 
            echo $syl_uploaded_on;
            ?><td>

            <!-- <td><?php //echo "<a href='./edit-syllabus.php?id=" . $row['syllabus_id'] ."'><i class='fa-solid fa-pen-to-square tooltipped' data-position='top' data-tooltip='Edit'></i></a>";?></td> -->
            <td><?php echo "<a href='../syllabuses/".$row['syllabus_file']."?id=" . $row['syllabus_id'] ."' target='_blank'><i class='fa-solid fa-eye tooltipped' data-position='top' data-tooltip='View'></i></a>";?></td>
            <td><?php echo "<a href='./delete-syllabus.php?id=" . $row['syllabus_id'] ."'><i class='fa-solid fa-trash-can tooltipped red-text' data-position='top' data-tooltip='Delete'></i></a>";?></td>
    </tr>
    <?php
}
?>
</table>
</div>
<?php include_once '../includes/add_button.php' ?>
<?php include_once '../includes/footer.php' ?>