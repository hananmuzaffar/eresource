<?php include '../process/auth.php';
if($_SESSION["isAdmin"] == 1): ?>
<!DOCTYPE HTML>
<html>
<head>
<title>User Search Results</title>
<?php include_once '../includes/nav.php' ?>
<?php include "../process/db.php" ?>
<?php
$sql = "SELECT * FROM users";
if( isset($_GET['search']) ){
    $name = $username = mysqli_real_escape_string($link, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM users WHERE name LIKE '%$name%' or username LIKE '%$username'";
}
$result = $link->query($sql);
?>
<div class="container">
    <div class="row">
        <h4 class="center">Search Results for <strong><?php echo $_GET["search"]; ?></strong></h4>
    </div>
<?php include_once '../includes/user-search-form.php' ?>
<table>
<tr>
    <th hidden>ID</th>
    <th>Name</th>
    <th>Department</th>
</tr>
    </thead>
<?php 
 while($row = $result->fetch_assoc()) {
?> 
            <tr>
            <td hidden><?php echo $row["user_id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php
              $dept_sql = mysqli_query($link, "SELECT * From departments JOIN users ON departments.dept_id = users.dept_id WHERE user_id=".$row['user_id']);
              $dept_row = mysqli_fetch_array($dept_sql);
                echo $dept_row['dept_name'] ;
            ?></td>
            <!--<td><?php //echo $row["batch_id"]; ?></td>-->
            <td><?php echo "<a href='edit.php?user_id=" . $row['user_id'] ."'><i class='fa-solid fa-pen-to-square tooltipped' data-position='top' data-tooltip='Edit'></i></a>";?></td>
            <td><?php echo "<a href='./user-info.php?user_id=" . $row['user_id'] ."'><i class='fa-solid fa-eye tooltipped' data-position='top' data-tooltip='View'></i></a>";?></td>
            <td><?php echo "<a href='./delete-user.php?user_id=" . $row['user_id'] ."'><i class='fa-solid fa-trash-can tooltipped red-text' data-position='top' data-tooltip='Delete'></i></a>";?></td>
            </tr>
    <?php
};
?>
</table>
</div>
<?php include_once '../includes/add_button.php' ?>
<?php include_once '../includes/footer.php' ?>
<?php endif; ?>