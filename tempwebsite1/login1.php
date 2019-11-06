
     <?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username;
	$password;
    // Check if username is empty
    if(empty($_POST["email"])){
        $username_err = "Please enter email.";
    } else{
        $username = $_POST["email"];
    }
    
    // Check if password is empty
    if(empty($_POST["password1"])){
        $password_err = "Please enter your password.";
    } else{
        $password = $_POST["password1"];
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT st_id, password1, email FROM student WHERE email = '$username'";
		$result=mysqli_query($link, $sql);
		
		if($result){
			$resultArray=mysqli_fetch_assoc($result);
			
			if($password == $resultArray['password1']){
				// Password is correct, so start a new session
				session_start();
				
				// Store data in session variables
				$_SESSION["loggedin"] = true;
				$_SESSION["st_id"] = $id;
				$_SESSION["email"] = $username;                            
				
				// Redirect user to welcome page
				header("location: welcome.php");
			} else{
				// Display an error message if password is not valid
				$password_err = "The password you entered was not valid.";
				echo $password_err;
			}
			
		}else{
			echo mysqli_error($link);
		}
        
        /*if($stmt = mysqli_prepare($link, $sql)){
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
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["st_id"] = $id;
                            $_SESSION["email"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }*/
    
    // Close connection
    mysqli_close($link);
}else{
	echo "error";
}
}else{
	echo "err";
}
?>