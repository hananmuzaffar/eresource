<?php require '../process/db.php';
include '../process/auth.php'; 
if($_SESSION["isAdmin"] == 1): ?>

<!DOCTYPE html>
  <html>
    <head>
        <title>Add new User</title>
    <?php include_once '../includes/nav.php' ?>
    <h3 align="center">Add New User</h3>
    <div class="container">
    <div class="row">
    <form class="col s12" id="form" action="../process/user-add-process.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s12">
            <input type="text" class="validate" id="name" name="name"  placeholder="Enter name" autofocus required />
          <label for="name">Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
            <input type="text" class="validate" id="username" name="username"  placeholder="Enter username" required />
          <label for="username">Username</label>
        </div>
      </div>
        
    <div class="row">
        <div class="input-field col s12">
          <select name="dept_id" id="department" required>
            <option value="" disabled selected>-- select department --</option>
            <?php
              $sql = mysqli_query($link, "SELECT * From departments");
              $row = mysqli_num_rows($sql);
              while ($row = mysqli_fetch_array($sql)){
                echo "<option value='". $row['dept_id'] ."'>" .$row['dept_name'] ."</option>" ;
              }
            ?>
          </select>
          <label for="department">Select Department:</label>
        </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input type="text" class="validate" id="password" name="password" placeholder="Enter user password" required />
        <label for="password">User Password</label>
      </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
          <select name="user_type" id="user_type" required>
            <option value="" disabled selected>-- select usertype --</option>
            <option value="1">Admin</option>
            <option value="0">Faculty</option>
          </select>
          <label for="user_type">Usertype:</label>
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

