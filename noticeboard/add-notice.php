<?php 
require_once "../process/auth.php";
require_once "../process/db.php";
include_once "../process/functions.php";
?>
<!DOCTYPE html>
  <html>
    <head>
        <title>Add new Notice</title>
    <?php include_once '../includes/nav.php' ?>
    <h3 align="center">Add New Notice</h3>
    <div class="container">
    <div class="row">
    <form class="col s12" id="form" action="../process/notice-add-process.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s12">
            <input type="text" class="validate count" id="name" name="name" placeholder="Enter Notice Title" autofocus required />
          <label for="name">Notice Title</label>
        </div>
      </div>

    <div class="row">
        <div class="input-field col s12">
            <select name="course" id="course" required>
                <option value="" disabled selected>-- select course --</option>
                <?php
                $course_sql = mysqli_query($link, "SELECT * From courses");
                $course_row = mysqli_num_rows($course_sql);
                while ($course_row = mysqli_fetch_array($course_sql)){
                    echo "<option value='". $course_row['course_id'] ."'>" .$course_row['course_name'] ."</option>" ;
                }
                ?>
            </select>   
            <label for="course">Select Course:</label>
        </div>
    </div>

    <!-- Batch Function -->
    <?php batch(); ?>
    
      <div class="row">
          <button class="btn waves-effect waves-light" type="submit" value="Upload">Add
            <i class="material-icons right">send</i>
  </button>
      </div>
    </form>
    <div id="err"></div>
  </div>
  </div>
<?php include_once '../includes/footer.php' ?>

