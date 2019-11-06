<?php
    $conn=mysqli_connect('localhost','root','') ;
	if(!$conn)
	{
		echo 'Not connected to server';
	}
	if(!mysqli_select_db($conn,'nitdatabase')){
		echo 'Database not selected';
	}
	$fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $password = $_POST['password1'];
    $mobileno = $_POST['num'];
    $score = $_POST['score'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $hobbies = $_POST['hobbies'];
	
	$check=mysqli_query($conn, "SELECT * FROM student WHERE password1='$password' AND email='$email'");
	
	if(!$check || mysqli_num_rows($check)>0){
		echo "Someone already registered!";
	}
	
	else{
		$insert="INSERT INTO student (fname,lname,address,password1,num,score,dob,email,gender,hobbies) VALUES ('".mysqli_real_escape_string($conn, $fname)."','".mysqli_real_escape_string($conn, $lname)."','".mysqli_real_escape_string($conn,$address)."','".mysqli_real_escape_string($conn, $password)."','".mysqli_real_escape_string($conn,$mobileno)."','".mysqli_real_escape_string($conn,$score)."','".mysqli_real_escape_string($conn,$dob)."','".mysqli_real_escape_string($conn,$email)."','".mysqli_real_escape_string($conn,$gender)."','".mysqli_real_escape_string($conn, $hobbies)."')";
		echo "Successfully registered";
		mysqli_query($conn,$insert) or die(mysqli_error($conn));
		mysqli_close($conn);
	}

	
	
?>