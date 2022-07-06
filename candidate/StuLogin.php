<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["stu_loggedin"]) && $_SESSION["stu_loggedin"] === true){
    header("location: StudentDashboard.php");
    exit;
}
 
// Include config file
require_once "../process/db.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter roll no..";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty($_POST["password"])){
        $password_err = "Please enter your password.";
    } else{
        $password = $_POST["password"];
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT stu_id,stu_name,stu_rollno,stu_password,course_id,batch_id FROM students WHERE stu_rollno = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $name, $username, $hashed_password, $course, $batch);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["stu_loggedin"] = true;
                            $_SESSION["stu_id"] = $id;
                            $_SESSION["stu_rollno"] = $username;   
                            $_SESSION["stu_name"] = $name;
                            $_SESSION["course_id"] = $course;
                            $_SESSION["batch_id"] = $batch;                     
                            
                            // Redirect user to welcome page
                            header("location: StudentDashboard.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered is not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with roll no. $username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<?php include_once '../includes/login-nav.php' ?>
<main>
        <div class="container">
            <div class="container">
                <br>
                <div class="center">
        <h3 class="col s12 m12 l12 card-panel orange lighten-4 collection-item orange-text text-darken-3">Student Login</h3>
        </div>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="input-field col s12 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <i class="fas fa-user prefix"></i>
                <input type="number" name="username" class="validate" id="username" value="<?php echo $username; ?>" placeholder="Enter roll no." required />
                <label for="username">Rollno</label>
                <span class="help-block red-text"><?php echo $username_err; ?></span>
            </div>
            <br>
            <div class="input-field col s12 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <i class="fas fa-lock prefix"></i>
                <input type="password" name="password" class="validate" id="password" placeholder="Enter password" required />
                <label for="password">Password</label>
                <span class="help-block red-text"><?php echo $password_err; ?></span>
            </div>
            <br>
            <div class="input field center">
            <button class="btn waves-effect waves-light" type="submit" value="Login"><i class="fas fa-sign-in-alt left fa-lg"></i> Login </button>
            </div>
        </form>
    </div>
    </div>
    </main>
<?php include_once '../includes/footer.php' ?>