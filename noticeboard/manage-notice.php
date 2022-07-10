<?php include '../process/auth.php';?>
<!DOCTYPE HTML>
<html>
<head>
<title>Notices</title>
<?php include_once '../includes/nav.php' ?>
<?php include "../process/db.php" ?>
<div class="container">
    <div class="row">
        <h3 class="center">Notices</h3>
    </div>
<?php
$user_id = $_SESSION["user_id"];
$sql = ($_SESSION["isAdmin"] == 1) ? "SELECT * FROM notices ORDER BY notice_uploaded_on DESC" : "SELECT * FROM notices WHERE user_id = $user_id ORDER BY notice_uploaded_on DESC"   ;
$rs_result = $link->query($sql);
?> 
<table class="centered">
  <thead>
        <tr>
            <th hidden>Notice ID</th>
            <th>Notice</th>
            <th>Batch</th>
            <th>Course</th>
            <th>Uploaded by</th>
            <th>Uploaded on</th>
        </tr>
    </thead>
<?php while($row = $rs_result->fetch_assoc()): ?> 
    <tbody>
        <tr>
            <td hidden><?php echo $row["notice_id"]; ?></td>

            <td><strong><?php echo $row["notice"]; 
            // echo substr($row["notice"], 0, 50) . " ...";?></strong></td>

            <td><?php
                $batch_sql = mysqli_query($link, "SELECT * From batch JOIN notices ON batch.batch_id = notices.batch_id WHERE notice_id=".$row['notice_id']);
                $batch_row = mysqli_fetch_array($batch_sql);
                echo $batch_row['batch_name'];
            ?></td>

            <td><?php
            $course_sql = mysqli_query($link, "SELECT * From courses JOIN notices ON courses.course_id = notices.course_id WHERE notice_id=".$row['notice_id']);
            $course_row = mysqli_fetch_array($course_sql);
            echo $course_row['course_name'];
            ?></td>

            <td><?php
            $uploader_sql = mysqli_query($link, "SELECT * From users JOIN notices ON users.user_id = notices.user_id WHERE notice_id=".$row['notice_id']);
            $uploader_row = mysqli_fetch_array($uploader_sql);
            echo $uploader_row['name'];
            ?></td>

            <td><?php $notice_uploaded_on= date('d/m/Y',strtotime($row['notice_uploaded_on'])); 
            echo $notice_uploaded_on;
            ?></td>
            
            <td><?php echo "<a href='./delete-notice.php?id=" . $row['notice_id'] ."'><i class='fa-solid fa-trash-can tooltipped red-text' data-position='top' data-tooltip='Delete'></i></a>";?></td>
        </tr>
    </tbody>
<?php endwhile; ?> 
</table>

</div>
<?php include_once '../includes/add_button.php' ?>
<?php include_once '../includes/footer.php' ?>