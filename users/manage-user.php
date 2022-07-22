<?php include '../process/auth.php';
if($_SESSION["isAdmin"] == 1):?>
<!DOCTYPE HTML>
<html>
<head>
<title>Users</title>
<?php include_once '../includes/nav.php' ?>
<?php include "../process/db.php" ?>
<div class="container">
    <div class="row">
        <h3 class="center">Users</h3>
    </div>
<?php
$sql = "SELECT * FROM users ORDER BY USER_ID ASC";
$rs_result = $link->query($sql);
?> 
<?php include_once '../includes/user-search-form.php' ?>
<table class="centered">
  <thead>
<tr>
    <th hidden>ID</th>
    <th>Name</th>
    <th>Department</th>
    <th colspan="3">Action</th>

</tr>
    </thead>
<?php 
 while($row = $rs_result->fetch_assoc()):
?> 
            <tr>
            <td hidden><?php echo $row["user_id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php
              $dept_sql = mysqli_query($link, "SELECT * FROM departments JOIN users ON departments.dept_id = users.dept_id WHERE user_id=".$row['user_id']);
              $dept_row = mysqli_fetch_array($dept_sql);
                echo $dept_row['dept_name'] ;
            ?></td>
            <!--<td><?php //echo $row["batch_id"]; ?></td>-->
            <td><?php echo "<a href='edit-user.php?user_id=" . $row['user_id'] ."'><i class='fa-solid fa-pen-to-square tooltipped' data-position='top' data-tooltip='Edit'></i></a>";?></td>
            <td><?php echo "<a href='./user-info.php?user_id=" . $row['user_id'] ."'><i class='fa-solid fa-eye tooltipped' data-position='top' data-tooltip='View'></i></a>";?></td>
            <td><?php echo "<a href='./delete-user.php?user_id=" . $row['user_id'] ."'><i class='fa-solid fa-trash-can tooltipped red-text' data-position='top' data-tooltip='Delete'></i></a>";?></td>
            </tr>
<?php 
endwhile; 
?> 
</table>
</div>
<?php include_once '../includes/add_button.php' ?>
<?php include_once '../includes/footer.php' ?>
<?php endif; ?>