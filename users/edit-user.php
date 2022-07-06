<?php
require("../process/db.php");
include("../process/auth.php");
$user_id=$_REQUEST['user_id'];
$query = "SELECT * from users where user_id='".$user_id."'"; 
$result = mysqli_query($link, $query) or die ( mysqli_connect_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
  <html>
    <head>
        <title>Update User</title>
    <?php include_once '../includes/nav.php' ?>
    <div class="container">
    <div class="row">
        <h3 class="center">Update User</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
    $name = $_POST['name'];
    $department = $_POST['dept_id'];
    //$user_type = $_POST['user_type'];
$update="UPDATE users SET name='$name', dept_id='$department' WHERE user_id='$user_id'";
mysqli_query($link, $update) or die(mysqli_connect_error());
$status = "Record Updated Successfully. </br></br>
<a href='../users/manage-user.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>

<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
    <input name="id" type="hidden" value="<?php echo $row['user_id'];?>" />
    <div class="row">
    <div class="input-field col s12">
        <input type="text" class="validate" id="name" name="name" placeholder="Enter student name" value="<?php echo $row['name'];?>" required />
         <label for="name">User Name</label>
     </div>
    </div>
    

      <div class="row">
        <div class="input-field col s12">
          <select name="dept_id" id="department" required>
          <?php $dept_sql1 = mysqli_query($link, "SELECT * From departments JOIN users ON departments.dept_id = users.dept_id WHERE user_id=$user_id");
                $dept_sql2 = mysqli_query($link, "SELECT * From departments");
                $dept_row2 = mysqli_num_rows($dept_sql2);
                $dept_row1 = mysqli_fetch_array($dept_sql1);
            echo "<option value=".$dept_row1['dept_id']." selected>".$dept_row1['dept_name']."</option>";
              while ($dept_row2 = mysqli_fetch_array($dept_sql2)){
                echo "<option value=".$dept_row2['dept_id'].">".$dept_row2['dept_name']."</option>" ;
              }
            ?>
          </select>
          <label for="department">Department:</label>
        </div>
    </div>

 <!--   <div class="row">
        <div class="input-field col s12">
          <select name="usertype" id="user_type" required>
          <option value="<?php //echo $row['isAdmin']; ?>"><?php //echo $row['isAdmin']; ?></option>
          </select>
          <label for="user_type">isAdmin:</label>
        </div>
    </div> -->
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