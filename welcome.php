<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: DeptLogin.php");
    exit;
}
include './process/db.php';
?> 
<!DOCTYPE html>
<html>
<head>
    <title>Welcome <?php echo htmlspecialchars($_SESSION["name"]); ?> - eResource Management</title>
    <?php include_once './includes/nav.php' ?>
    <div class="container">
        <h3 class="center">Hi <span style="text-transform:capitalize;"><b><?php echo htmlspecialchars($_SESSION["name"]); ?></b>!</span>, Welcome to <span class="teal-text">ICSC eResources</span>.</h3>
        <br><br>
        <?php if($_SESSION["isAdmin"] == 1): ?>
        <div class="row" style="text-transform:uppercase;">
            <?php
                $count = mysqli_num_rows(mysqli_query($link, "SELECT * FROM students")); 
            ?>
            <a href="./students/manage-student.php"><div class="col s12 m6 l4 card-panel hoverable blue lighten-4 collection-item blue-text text-darken-3 z-depth-2"><i class="fas fa-graduation-cap fa-lg "></i> <span style='font-size:1.25rem'>Total Students</span><p style='font-size: 2rem;'><strong><?php echo $count; ?></strong></p></div></a>
            <?php
                $count = mysqli_num_rows(mysqli_query($link, "SELECT * FROM users")); 
            ?>
            <a href="./users/manage-user.php"><div class="col s12 m6 l4 card-panel hoverable red lighten-4 collection-item red-text text-darken-3 z-depth-2"><i class="fas fa-users fa-lg"></i> <span style='font-size:1.25rem'>Total Users</span><p style='font-size: 2rem;'><strong><?php echo $count; ?></strong></p></div></a>
            <?php
                $count = mysqli_num_rows(mysqli_query($link, "SELECT * FROM departments")); 
            ?>
            <a><div class="col s12 m6 l4 card-panel hoverable green lighten-4 collection-item green-text text-darken-3 z-depth-2"><i class="fas fa-solid fa-building fa-lg"></i> <span style='font-size:1.25rem'>Total Departments</span><p style='font-size: 2rem;'><strong><?php echo $count; ?></strong></p></div></a>
        </div>
        <br><br>
        <?php endif; ?>
        <div class="row" style="text-transform:uppercase;">
            <?php
            $sql = ($_SESSION["isAdmin"] == 1) ? "SELECT * FROM syllabus" : "SELECT * FROM syllabus WHERE user_id = ".$_SESSION['user_id'];
            $count = mysqli_num_rows(mysqli_query($link,$sql)); 
            ?>
            <a href="./syllabus/manage-syllabus.php"><div class="col s12 m6 l6 card-panel hoverable purple lighten-4 collection-item purple-text text-darken-3 z-depth-2"><i class="fas fa-solid fa-print fa-lg"></i> <span style='font-size:1.25rem'>Total Syllabuses Uploaded</span><p style='font-size: 2rem;'><strong><?php echo $count; ?></strong></p></div></a>
            <?php
                $sql = ($_SESSION["isAdmin"] == 1) ? "SELECT * FROM papers" : "SELECT * FROM papers WHERE user_id = ".$_SESSION['user_id'];
                $count = mysqli_num_rows(mysqli_query($link,$sql)); 
            ?>
            <a href="./papers/manage-paper.php"><div class="col s12 m6 l6 card-panel hoverable orange lighten-4 collection-item orange-text text-darken-3 z-depth-2"><i class="fas fa-solid fa-file-circle-question fa-lg"></i> <span style='font-size:1.25rem'>Total Papers Uploaded</span><p style='font-size: 2rem;'><strong><?php echo $count; ?></strong></p></div></a>
        </div>
    </div><br>
    <?php include_once './includes/add_button.php' ?>
    <?php include_once './includes/footer.php' ?>