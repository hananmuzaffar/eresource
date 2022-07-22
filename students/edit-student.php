<?php
require_once"../process/db.php";
require_once"../process/auth.php";
include_once"../process/functions.php";
$rollno=$_REQUEST['rollno'];
$query = "SELECT * from students where stu_rollno=$rollno"; 
$result = mysqli_query($link, $query) or die ( mysqli_connect_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
  <html>
    <head>
        <title>Update Record</title>
    <?php include_once '../includes/nav.php' ?>
    <div class="container">
    <div class="row">
        <h3 class="center">Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$name = $_REQUEST['name'];
$course = $_REQUEST['course'];
$batch = $_REQUEST['batch'];

$update="UPDATE students SET stu_name = '$name', course_id = '$course' , batch = '$batch' WHERE stu_rollno = '$rollno'";
mysqli_query($link, $update);
$status = "Record Updated Successfully. </br></br>
<a href='../students/manage-student.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>

<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
    <input name="id" type="hidden" value="<?php echo $row['stu_id'];?>" />
    <div class="row">
    <div class="input-field col s12">
        <input type="text" class="validate" id="name" name="name" placeholder="Enter student name" value="<?php echo $row['stu_name'];?>" required />
         <label for="name">Student Name</label>
     </div>
    </div>
    
    <div class="row">
        <div class="input-field col s12">
            <input type="number" class="validate" id="rollno" name="rollno"  placeholder="Enter student roll no." value="<?php echo $row['stu_rollno'];?>" disabled required />
          <label for="rollno">Student Roll no.</label>
          <code class="red-text">Cannot be edited.</code>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <select name="course" id="course" required>
          <?php $course_sql1 = mysqli_query($link, "SELECT * From courses JOIN students ON courses.course_id = students.course_id WHERE stu_rollno=$rollno");
                $course_sql2 = mysqli_query($link, "SELECT * From courses");
                $course_row2 = mysqli_num_rows($course_sql2);
                $course_row1 = mysqli_fetch_array($course_sql1);
            echo "<option value=".$course_row1['course_id']." selected>".$course_row1['course_name']."</option>";
              while ($course_row2 = mysqli_fetch_array($course_sql2)){
                echo "<option value=".$course_row2['course_id'].">".$course_row2['course_name']."</option>" ;
              }
            ?>
          </select>
          <label for="course">Select Course:</label>
        </div>
    </div>
  
    <?php batch(); ?>
    
<div class="row">
          <button class="btn waves-effect waves-light" type="submit" value="Update">Update
            <i class="material-icons right">send</i>
  </button>
      </div>

</form>
<?php } ?>
</div>
</div>
</div>
<?php include_once '../includes/footer.php' ?>