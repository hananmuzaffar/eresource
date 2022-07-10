<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: DeptLogin.php");
    exit;
}
 
// Include config file
require "./process/db.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Passwords did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE user_id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["user_id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: DeptLogin.php");
                exit();
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
 
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
<?php include_once 'includes/nav.php' ?>
    <div class="container">
        <div class="container">
        <h2 class="center">Reset Password</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="input-field col s12 <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <i class="fas fa-key prefix"></i>
                <input type="password" name="new_password" class="validate" id="new_password" value="<?php echo $new_password; ?>" autofocus>
                <label for="new_password">New Password</label>
                <span class="help-block red-text"><?php echo $new_password_err; ?></span>
            </div>
            <div class="input-field col s12 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <i class="fas fa-key prefix"></i>
                <input type="password" name="confirm_password" class="validate" id="confirm-password">
                <label for="confirm-password">Confirm New Password</label>
                <span class="help-block red-text"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="input-field center">
                <button class="btn waves-effect waves-light" type="submit" value="Submit">Change</button>
                <a class="btn waves-effect waves-light red lighten-2" href="welcome.php">Cancel</a>
            </div>
        </form>
    </div>
    </div>
    <?php include_once 'includes/add_button.php' ?>
    <?php include_once 'includes/footer.php' ?>