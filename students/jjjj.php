<?php include '../process/auth.php';
include '../process/db.php';
if($_SESSION["isAdmin"] == 1): ?>
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
<form action="" method="post">
<div class="row">
        <div class="input-field col l6 s12">
          <select name="course" id="batch" required>
            <option value="" disabled selected>-- select course --</option>
            <?php
              $course_sql = mysqli_query($link, "SELECT * From courses");
              $course_row = mysqli_num_rows($course_sql);
              while ($course_row = mysqli_fetch_array($course_sql)){
                echo "<option value='". $course_row['course_id'] ."'>" .$course_row['course_name'] ."</option>" ;
              }
            ?>
          </select>
          <label for="batch">Select Course:</label>
        </div>

        <div class="input-field col l6 s12">
          <select name="batch" id="batch" required>
            <option value="" disabled selected>-- select batch --</option>
            <?php
              $batch_sql = mysqli_query($link, "SELECT * From batch");
              $batch_row = mysqli_num_rows($batch_sql);
              while ($batch_row = mysqli_fetch_array($batch_sql)){
                echo "<option value='". $batch_row['batch_id'] ."'>" .$batch_row['batch_name'] ."</option>" ;
              }
            ?>
          </select>
          <label for="batch">Select Batch:</label>
        </div>
    </div>
    <div class="row center">
          <button class="btn waves-effect waves-light" type="submit" name="show" value="students">Show
            <i class="material-icons right">pageview</i>
  </button>
      </div>
</form>

<?php
/// edit data
if(isset($_REQUEST['course']) && $_REQUEST['batch'] && isset($_REQUEST['show'])){
    $course= $_REQUEST['course'];
    $batch = $_REQUEST['batch'];
    $query ="SELECT * FROM students WHERE course_id='$course' and batch_id=$batch";
    $result = $link->query($query);
    if($result->num_rows> 0){
      $students= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }else{
     $students=[];
    }
}
?>
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
<?php if(isset($students)>0): ?>
    
    <?php
       if(count($students)>0)
       {
    foreach ($students as $student) {
      $sn = 1;
     ?>
            <tr>
            <td hidden><?php echo $student["stu_id"]; ?></td>

            <td><?php echo $student["stu_rollno"]; ?></td>

            <td><?php echo $student["stu_name"]; ?></td>

            <td><?php $course_sql = mysqli_query($link, "SELECT * From courses JOIN students ON courses.course_id = students.course_id WHERE stu_rollno=".$student['stu_rollno']);
              $course_row = mysqli_fetch_array($course_sql);
                echo $course_row['course_name'];
                ?></td>

            <td><?php
              $batch_sql = mysqli_query($link, "SELECT * From batch JOIN students ON batch.batch_id = students.batch_id WHERE stu_rollno=".$student['stu_rollno']);
              $batch_row = mysqli_fetch_array($batch_sql);
                echo $batch_row['batch_name'];
            ?></td>

            <!--<td><?php //echo $row["batch_id"]; ?></td>-->
            <td><?php echo "<a href='./edit-student.php?rollno=" . $student['stu_rollno'] ."'><i class='fa-solid fa-pen-to-square tooltipped' data-position='top' data-tooltip='Edit'></i></a>";?></td>
            <td><?php echo "<a href='./student-info.php?rollno=" . $student['stu_rollno'] ."'><i class='fa-solid fa-eye tooltipped' data-position='top' data-tooltip='View'></i></a>";?></td>
            <td><?php echo "<a href='./delete-student.php?rollno=" . $student['stu_rollno'] ."'><i class='fa-solid fa-trash-can tooltipped red-text' data-position='top' data-tooltip='Delete'></i></a>";?></td>
            </tr>
     <?php
   $sn++; 
   }
}else{
    echo "<tr><td colspan='3'>No Data Found</td></tr>";
}
?>

<?php endif; ?>
</table>
</div>
<?php include_once '../includes/add_button.php';
include_once '../includes/footer.php';
endif; ?>