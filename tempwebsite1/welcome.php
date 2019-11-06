<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login1.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<?php

   $conn=mysqli_connect('localhost','root','') ;
   $db=mysqli_select_db($conn,'nitdatabase');
   $dev=htmlspecialchars($_SESSION["email"]);
   
   
   $que="select * from student where email='$dev'";
   $run= mysqli_query($conn, $que);
   
   
   while($row=mysqli_fetch_array($run))
   {
	$u_id  = $row['st_id'] ;
	$fname = $row['fname'];
    $lname = $row['lname'];
    $email =  $row['email'];
   
   ?>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b>. Welcome to  site of NIT portblair.</h1>
    </div>
    <p>
       <a href="profile.php?detail=<?php echo $u_id?>" class="btn btn-safe">Check Your Profile</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
	 <?php } ?>
</body>
</html>