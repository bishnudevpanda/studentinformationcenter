

<!DOCTYPE HTML>
<html>
<head>
<title>Preface a Personal Category Flat Bootstrap Responsive Website Template| Home :: w3layouts</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
 <!-- Custom Theme files -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="keywords" content="Preface Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<!-- webfonts -->
	<link href='//fonts.googleapis.com/css?family=Asap:400,700,400italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
<!-- webfonts -->
 <!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
 <!---- start-smoth-scrolling---->
</head>
<body>
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
<h1>Profile</h1>
<div class="banner-info">
				<div class="col-md-7 header-right">
					<h1>Hi !</h1>
					<h6>Student</h6>
					<ul class="address">
					
					<li>
							<ul class="address-text">
								<li><b>FIRST NAME</b></li>
								<li><?php echo $fname; ?></li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>LAST NAME</b></li>
								<li><?php echo $lname; ?></li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>D.O.B</b></li>
								<li><?php echo $dob; ?></li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>PHONE </b></li>
								<li><?php echo $mobileno; ?></li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>ADDRESS </b></li>
								<li><?php echo $address; ?></li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>E-MAIL </b></li>
								<li><?php echo $email; ?></li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>GENDER</b></li>
								<li><?php echo $gender; ?></li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>JEE SCORE</b></li>
								<li><?php echo $score; ?></li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>HOBBIES </b></li>
								<li><?php echo $hobbies; ?></li>
							</ul>
						</li>
						
					</ul>
					<?php } ?>
				</div>
				</body>
				</html>