<?php include "../process/auth.php";
require "../process/db.php";
require "../process/functions.php" ?>
<!DOCTYPE html>
  <html>
    <head>
        <title>Add new Paper</title>
    <?php include_once '../includes/nav.php' ?>
    <h3 align="center">Add New Paper</h3>
    <div class="container">
    <div class="row">
    <form class="col s12" id="form" action="../process/paper-add-process.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s12">
            <input type="text" class="validate" id="name" name="name" placeholder="Enter Paper Title" autofocus required />
          <label for="name">Paper Title</label>
        </div>
      </div>

    <div class="row">
        <div class="input-field col s12">
            <select name="course" id="course" required>
                <option value="" disabled selected>-- select course --</option>
                <?php
                $course_sql = mysqli_query($link, "SELECT * FROM courses");
                $course_row = mysqli_num_rows($course_sql);
                while ($course_row = mysqli_fetch_array($course_sql)){
                    echo "<option value='". $course_row['course_id'] ."'>" .$course_row['course_name'] ."</option>" ;
                }
                ?>
            </select>
            <label for="course">Select Course:</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <select name="semester" id="semester" required>
                <option value="" disabled selected>-- select semester --</option>
                <?php for($i=1;$i<=6;$i++) {
                  echo "<option value='$i'>$i</option>";
                } ?>
                
            </select>
            <label for="semester">Select Semester:</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
          <select name="batch" id="batch" required>
            <option value="" disabled selected>-- select batch --</option>
            <?php
              $batch_sql = mysqli_query($link, "SELECT * FROM batch");
              $batch_row = mysqli_num_rows($batch_sql);
              while ($batch_row = mysqli_fetch_array($batch_sql)){
                echo "<option value='". $batch_row['batch_id'] ."'>" .$batch_row['batch_name'] ."</option>" ;
              }
            ?>
          </select>
          <label for="batch">Select Batch:</label>
        </div>
    </div>
    
    <!-- year function -->
    <?php year(); ?>

    <div class="row">
        <div class="">
            <label for="paper_type">Paper Type:</label>
            <label><input class="with-gap" type="radio" name="paper_type" id="paper_type" value="Regular" required><span>Regular</span></label>
            <label><input class="with-gap" type="radio" name="paper_type" id="paper_type" value="Backlog" required><span>Backlog</span></label>
            
        </div>
    </div>
       
    <div class="row">
        <div class="file-field input-field col s12 ">
            <div class="btn">
                <span>Paper (PDF only)</span>
                <input type="file" accept="application/pdf" name="paper" required>
            </div>
            <div class="file-path-wrapper">
                <input type="name" class="file-path validate" id="uploadPaper" />
                <label for="uploadPaper">Paper File</label>
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

