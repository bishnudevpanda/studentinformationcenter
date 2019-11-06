<html>
<head>
<title>Viewing the Details</title>
</head>
<body>

<table align='center' witdth='1000' border='4'>

<tr>
<td colspan='20' align='center' bgcolor='yellow'>
<h1>Viewing all the records</h1>
</td>
</tr>
<tr align='center' >
<th>Student Id</th>
<th>Student's first name</th>
<th>Student's last name</th>
<th>Student's email</th>
<th>Student's address</th>
<th>Student's Mobile Number</th>
<th>Student's Gender</th>
<th>Student's Date of birth</th>
<th>Student's Hobbies</th>
<th>Student's Password</th>
<th>Student's Score</th>
</tr>


<?php

   $conn=mysqli_connect('localhost','root','') ;
   $db=mysqli_select_db($conn,'nitdatabase');
   $detail_record=$_GET['detail'];
   
   $que="select * from student where st_id='$detail_record' ";
   $run= mysqli_query($conn, $que);
   
   
   while($row=mysqli_fetch_array($run))
   {
	$u_id  = $row['st_id'] ;
	$fname = $row['fname'];
    $lname = $row['lname'];
    $email =  $row['email'];
	$address= $row['address'];
	$mobileno=$row['num'];
	$gender=$row['gender'];
	$dob=$row['dob'];
	$hobbies=$row['hobbies'];
	$pass=$row['password1'];
	$score=$row['score'];
   
   ?>
<tr align='center'>
<td><?php echo $u_id; ?></td>
<td><?php echo $fname; ?></td>
<td><?php echo $lname; ?></td>
<td><?php echo $email; ?></td>
<td><?php echo $address; ?></td>
<td><?php echo $mobileno; ?></td>
<td><?php echo $gender; ?></td>
<td><?php echo $dob; ?></td>
<td><?php echo $hobbies; ?></td>
<td><?php echo $pass; ?></td>
<td><?php echo $score; ?></td>
</tr>
   <?php } ?>
 </table> 
</body>
</html>