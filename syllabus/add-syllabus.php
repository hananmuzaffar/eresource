<?php require_once "../process/auth.php";
require_once "../process/db.php";
include_once "../process/functions.php"?>
<!DOCTYPE html>
  <html>
    <head>
        <title>Add new Syllabus</title>
    <?php include_once '../includes/nav.php' ?>
    <h3 align="center">Add New Syllabus</h3>
    <div class="container">
    <div class="row">
    <form class="col s12" id="form" action="../process/syllabus-add-process.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s12">
            <input type="text" class="validate" id="name" name="name" placeholder="Enter Syllabus Title" autofocus required />
          <label for="name">Syllabus Title</label>
        </div>
      </div>

    <div class="row">
        <div class="input-field col s12">
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
    </div>

    <!-- Batch Function -->
    <?php batch(); ?>
       
    <div class="row">
        <div class="file-field input-field col s12 ">
            <div class="btn">
                <span>Syllabus (PDF only)</span>
                <input type="file" accept="application/pdf" name="syllabus" required>
            </div>
            <div class="file-path-wrapper">
                <input type="name" class="file-path validate" id="uploadSyllabus" />
                <label for="uploadSyllabus">Syllabus File</label>
            </div>
        </div>
    </div>
    
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

