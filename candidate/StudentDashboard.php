<?php
    require '../candidate/stu-process/stu-auth.php';
    require '../process/db.php';
    $course = $_SESSION["course_id"];
    $batch = $_SESSION["batch_id"];
?> 
<!DOCTYPE html>
    <html>
        <head>
            <title><?php echo htmlspecialchars($_SESSION["stu_name"]); ?>'s Dashboard - eResource Management</title>
            <?php include_once 'stu-includes/stu-nav.php' ?>
            <div class="container">
                <h3 class="center">Hi <span style="text-transform:capitalize;"><b><?php echo htmlspecialchars($_SESSION["stu_name"]); ?></b>!</span>, Welcome to <span class="teal-text">ICSC eResources</span>.</h3>
                <br><br>
                <div class="row" style="text-transform:uppercase;">
                
                    <?php
                    $syl_sql = "SELECT * FROM syllabus WHERE course_id = $course AND batch_id = $batch";
                    $syl_count = mysqli_num_rows(mysqli_query($link,$syl_sql)); 
                    ?>
                    <a href="syllabus.php"><div class="col s12 m6 l6 card-panel hoverable purple lighten-4 collection-item purple-text text-darken-3 z-depth-2"><i class="fas fa-solid fa-print fa-lg"></i> <span style='font-size:1.25rem'>Total Syllabuses Uploaded</span><p style='font-size: 2rem;'><strong><?php echo $syl_count; ?></strong></p></div></a>
                
                    <?php
                    $paper_sql ="SELECT * FROM papers WHERE course_id = $course";
                    $paper_count = mysqli_num_rows(mysqli_query($link,$paper_sql)); 
                    ?>
                    <a href="paper.php"><div class="col s12 m6 l6 card-panel hoverable orange lighten-4 collection-item orange-text text-darken-3 z-depth-2"><i class="fas fa-solid fa-print fa-lg"></i> <span style='font-size:1.25rem'>Total Papers Uploaded</span><p style='font-size: 2rem;'><strong><?php echo $paper_count; ?></strong></p></div></a>
                </div>
            </div>
            <br>
            <?php include_once '../includes/footer.php' ?>