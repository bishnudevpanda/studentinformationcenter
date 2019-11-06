<?php
$conn=mysqli_connect('localhost','root','') ;
 $db=mysqli_select_db($conn,'nitdatabase');
 $edit_record=$_GET['edit'];
 $que="select * from student where st_id='$edit_record'";
 $run= mysqli_query($conn, $que);
 while($row=mysqli_fetch_array($run))
	 $u_id = $row[st_id];
	 $fname = $row['fname'];
    $lname = $row['lname'];
    $address = $row['address'];
    $password = $row['password1'];
    $mobileno = $row['num'];
    $score = $row['score'];
    $dob = $row['dob'];
    $email = $row['email'];
    $gender = $row['gender'];
    $hobbies = $row['hobbies'];


?>
<!DOCTYPE html>
<html>
<head>
	     <title>Updating the student information</title>
		 <link rel="stylesheet" href="register.css">
		 <script  type = "text/javascript" >
		
			
			
			function validation(){

			var user = document.getElementById('user').value;
			var user2 = document.getElementById('user2').value;
			var pass = document.getElementById('pass').value;
			var confirmpass = document.getElementById('conpass').value;
			var mobileNumber = document.getElementById('mobileNumber').value;
			var emails = document.getElementById('emails').value;
			var score= document.getElementById('score').value;
			var user3 = document.getElementById('user3').value;
			var dobi = document.getElementById('dobi').value;





			if(user == ""){
				document.getElementById('username1').innerHTML =" ** Please fill the First name field";
				return false;
			}
			if((user.length <= 2) || (user.length > 20)) {
				document.getElementById('username1').innerHTML =" ** Username lenght must be between 2 and 20";
				return false;	
			}
			if(!isNaN(user)){
				document.getElementById('username1').innerHTML =" ** only characters are allowed";
				return false;
			}
			
			
			
			if(user2 == ""){
				document.getElementById('username2').innerHTML =" ** Please fill the Last name field";
				return false;
			}
			if((user2.length <= 2) || (user.length > 20)) {
				document.getElementById('username2').innerHTML =" ** Username lenght must be between 2 and 20";
				return false;	
			}
			if(!isNaN(user2)){
				document.getElementById('username2').innerHTML =" ** only characters are allowed";
				return false;
			}
			
			if(user3 == ""){
				document.getElementById('username3').innerHTML =" ** Please fill the address field";
				return false;
			}
			
			








			if(pass == ""){
				document.getElementById('passwords').innerHTML =" ** Please fill the password field";
				return false;
			}
			if((pass.length <= 5) || (pass.length > 20)) {
				document.getElementById('passwords').innerHTML =" ** Passwords lenght must be between  5 and 20";
				return false;	
			}


			if(pass!=confirmpass){
				document.getElementById('confrmpass').innerHTML =" ** Password does not match the confirm password";
				return false;
			}



			if(confirmpass == ""){
				document.getElementById('confrmpass').innerHTML =" ** Please fill the confirmpassword field";
				return false;
			}




			if(mobileNumber == ""){
				document.getElementById('mobileno').innerHTML =" ** Please fill the mobile Number field";
				return false;
			}
			if(isNaN(mobileNumber)){
				document.getElementById('mobileno').innerHTML =" ** user must write digits only not characters";
				return false;
			}
			if(mobileNumber.length!=10){
				document.getElementById('mobileno').innerHTML =" ** Mobile Number must be 10 digits only";
				return false;
			}
			
			if(score == ""){
				document.getElementById('jeescore').innerHTML =" ** Please fill the Jee Score field";
				return false;
			}
			if(isNaN(score)){
				document.getElementById('jeescore').innerHTML =" ** user must write digits only not characters";
				return false;
			}
			if(score.value>360){
				document.getElementById('jeescore').innerHTML =" ** Jee Score must be less than 360";
				return false;
			}
			
			if(dobi == ""){
				document.getElementById('birthdate').innerHTML =" ** Please fill the date of birth field";
				return false;
			}
			




			if(emails == ""){
				document.getElementById('emailids').innerHTML =" ** Please fill the email idx` field";
				return false;
			}
			if(emails.indexOf('@') <= 0 ){
				document.getElementById('emailids').innerHTML =" ** @ Invalid Position";
				return false;
			}

			if((emails.charAt(emails.length-4)!='.') && (emails.charAt(emails.length-3)!='.')){
				document.getElementById('emailids').innerHTML =" ** . Invalid Position";
				return false;
			}
			 }
			 
			/* function CalculateAge() {
            var curYear = new Date().getUTCFullYear();
            var age = curYear - document.getElementById('txtYear').value;
            document.getElementById('Age').innerHTML ="your age is " + age;
        }*/
		
		 function CalculateAge1() {
            var curYear = new Date().getUTCFullYear();
			var birthYear = new Date(document.getElementById('dobi').value).getUTCFullYear();
            var age1 = curYear - birthYear;
            document.getElementById('Age1').innerHTML ="your age is " + age1;
        }
		
		
		   function onchangecheckbox(checkbox){
		     if(checkbox.checked) {
                        document.getElementById('txtToggle').style.display="block";
             }
             else	{
                     document.getElementById('txtToggle').style.display="none";
             }					 
			}
			


		
		 </script>
	</head>
	<div class="simple-form">
<form action="edit.php?edit_form=<?php echo $u_id?>" method="POST" id="registration" name="myform" onsubmit="return validation()">
		    <h1>Update Here</h1>
		     <label>First Name: </label><br>
            <input type="text" name="ufname" id="user" placeholder="Enter your first name" pattern=".{3,}" value="<?php echo $fname  ?>" onblur="return validation()"><br>
			<span id="username1" class="text font-weight-bold" > </span><br>
			<br>
			 <label>Last Name: </label><br>
			<input type="text" name="ulname" id="user2" placeholder="Enter your last name" value="<?php echo $lname ?>" onblur="return validation()"><br>
			<span id="username2" class="text-danger font-weight-bold"> </span><br>
			<br>
			
			<label>Address: </label><br>
			<input type="text" name="uaddress" id="user3" placeholder="Enter your address" value="<?php echo $address ?>" onblur="return validation()"><br>
			<span id="username3" class="text-danger font-weight-bold"> </span><br>
			<br> 
			
			<label>Password: </label><br>
			<input type="password" name="upassword1" id="pass" placeholder="Enter your password" value="<?php echo $password ?>" onblur="return validation()"><br>
			<span id="passwords" class="text-danger font-weight-bold"> </span><br>
			<br>
			
			 <label>Confirm Password: </label><br>
			<input type="password" name="upassword2" id="conpass" placeholder="Enter your password again" value="<?php echo $password ?>" onblur="return validation()"><br>
			<span id="confrmpass" class="text-danger font-weight-bold"> </span><br>
			<br>
			
			 <label>Mobile Number: </label><br>
			<input type="number" name="unum" id="mobileNumber" placeholder="Enter your mobile number" value="<?php echo $mobileno ?>" pattern=".{10,10}" onblur="return validation()"><br>
			<span id="mobileno" class="text-danger font-weight-bold"> </span><br>
			<br>
			
			 <label>JEE score: </label><br>
			<input type="number" name="uscore" id="score" placeholder="Enter your JEE main score" maxlength="3" value="<?php echo $score ?>" onblur="return validation()"><br>
			<span id="jeescore" class="text-danger font-weight-bold"> </span><br>
			<br>
			 <label>Date of birth: </label><br>
			<input type="date" name="udob" id="dobi" placeholder="Enter your date of birth as dd-mm-yyyy" onblur="CalculateAge1();" value="<?php echo $dob ?>" onblur="return validation();"><br>
			<span id="birthdate" class="text-danger font-weight-bold"> </span><br>
			<br>
			<span id="Age1">Age = </span><br><br>
               
			
			 <label>Email ID: </label><br>
			<input type="email" name="uemail" id="emails" placeholder="Enter your e-mail id" value="<?php echo $email ?>" onblur="return validation();"><br>
			<span id="emailids" class="text-danger font-weight-bold"> </span><br>
			<br>
			
			<label>Select Gender: </label><br>
				<select name="ugender" id="button1" value="<?php echo $gender ?>" required>
					<option id="button1" value="Male">Male</option>
					<option id="button1" value="Female">Female</option>
					<option id="button1" value="Others">Others</option></select><br><br>
					
					
			<label>Hobbies: </label><br>
			    <input type="checkbox" name="uhobbies" id="but" value="Dancing">Dancing &nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="uhobbies" id="but" value="Reading">Reading &nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="uhobbies" id="but" value="Playing Games">Playing Games &nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="uhobbies" value="Others" onclick="onchangecheckbox(this)" id="chkassociation"/>Others<br>
					<input type="text" id="txtToggle" value="<?php echo $hobbies ?>" placeholder="Enter your hobby" style="display:none"/><br><br>
			
           
			
			
			
			<button type="submit" value="update" id="bot">Update</button>
			</div>
        </form>
<?php 
$conn=mysqli_connect('localhost','root','') ;
 $db=mysqli_select_db($conn,'nitdatabase');
 
 if(isset($_POST['update'])){
	$id = $_GET['edit_form'];
	$ufname = $_POST['ufname'];
    $ulname = $_POST['ulname'];
    $uaddress = $_POST['uaddress'];
    $upassword = $_POST['upassword1'];
    $umobileno = $_POST['unum'];
    $uscore = $_POST['uscore'];
    $udob = $_POST['udob'];
    $uemail = $_POST['uemail'];
    $ugender = $_POST['ugender'];
    $uhobbies = $_POST['uhobbies'];
	
	if(mysqli_query($conn, "update student set fname='$ufname',lname='$ulname',address='$uaddress',password1='$upassword',num='$umobileno',score='$uscore',dob='$udob',email='$uemail',gender='$ugender',hobbies='$uhobbies' where st_id='$id' "))
	{
		echo "Database updated";
		
    }
	
 }

?>
		</body>
		</html>