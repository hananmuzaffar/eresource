<?php include "../process/auth.php";
if($_SESSION["isAdmin"] == 1): ?>
<!DOCTYPE HTML>
<html>
<head>
<title>User Info</title>
<?php include_once '../includes/nav.php' ?>
<?php include "../process/db.php" ?>
<div class="container">
    <div class="row">
<?php
if (isset($_GET['user_id'])) {
$id = $_GET['user_id'];
$sql = "SELECT * FROM users WHERE user_id= $id";
    if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo '<h3 class="center">User Information</h3>';
        while($row = mysqli_fetch_array($result)){
                echo '<div class="section">' ;
                echo '<font style="font-size:20px"><b>User ID: </b></font>' . $row['user_id']  ;
                echo '</div>
                    <div class="divider"></div>
                        <div class="section">
                        <fieldset>' ;
                echo '<legend>User Details</legend>' ;
                echo '<font style="font-size:20px"><b>Name: </b></font>' . $row['name'] ;
                echo '<br><font style="font-size:20px"><b>Username: </b></font><code>' . $row['username'] . '</code>';
                $dept_sql = mysqli_query($link, "SELECT * From departments JOIN users ON departments.dept_id = users.dept_id WHERE user_id=$id");
                $dept_row = mysqli_fetch_array($dept_sql);
                echo '<br><font style="font-size:20px"><b>Department: </b></font>' . $dept_row['dept_name'] ;
                echo '<br><font style="font-size:20px"><b>UserType: </b></font>';
                if($row["isAdmin"] == 1) {echo "Admin";}
                else {echo "Faculty";}
                echo '</fieldset>
                </div>';
                    
        }
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }}
}
?>
</div>
</div>
<?php include_once '../includes/footer.php' ?>
<?php endif; ?>