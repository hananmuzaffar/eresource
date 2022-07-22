<?php require '../process/db.php';
include '../process/auth.php'; 
if($_SESSION["isAdmin"] == 1):
include '../process/functions.php'; ?>

<!DOCTYPE html>
  <html>
    <head>
      <title>Add new Student</title>
      <?php include_once '../includes/nav.php' ?>
      
      <h3 align="center">Add New Student</h3>
        <div class="container">
          <div class="row">
            <form class="col s12" id="form" action="../process/student-add-process.php" method="post" enctype="multipart/form-data">
            
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" class="validate" id="name" name="name" placeholder="Enter student name" autofocus required />
                  <label for="name">Student name</label>
                </div>
              </div>
      
              <div class="row">
                <div class="input-field col s12">
                  <input type="number" class="validate count" id="rollno" name="rollno"  placeholder="Enter student roll no." required />
                  <label for="rollno">Student Roll no.</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <input type="number" class="validate count" id="stu_phone" name="stu_phone" data-length="10" maxlength="10" minlength="10"  placeholder="Enter student phone number" required />
                  <label for="stu_phone">Student Phone Number</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <textarea class="materialize-textarea" id="stu_address" name="stu_address" placeholder="Enter student address"></textarea>
                  <label for="stu_address">Student Address</label>
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
                    } ?>
                  </select>
                  <label for="batch">Select Course:</label>
                </div>
              </div>

              <!-- Batch Function -->
              <?php batch(); ?>

              <div class="row">
                <div class="input-field col s12">
                  <input type="text" class="validate" id="password" name="password" placeholder="Enter student password" required />
                  <label for="password">Student Password</label>
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
        <?php endif; ?>