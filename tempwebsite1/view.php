<!DOCTYPE html>
<html>
<head>
<title>Viewing the records</title>
 <link rel="stylesheet" href="style1.css">
 <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
</head>
<body>
<header>
	        <nav>
		        <h1>NIT PORT BLAIR- Admin Panel</h1>
		        <ul id="nav">
			        <li><a class="homered" href="logout1.php">Sign Out of Admin account</a></li>
				   
			    </ul>
		    </nav>
	    </header>
<center><font color='red' size='4'><?php echo @$_GET['deleted']; ?></font></center>
<table align='center' id="registration" witdth=100% border='4'>

<tr>
<td colspan='20' align='center' bgcolor='yellow'>
<h2>Viewing all the records</h2>
</td>
</tr>
<tr align='center' >
<th>Student Id</th>
<th>Student's first name</th>
<th>Student's last name</th>
<th>Student's email</th>
<th>Delete</th>
<th>Edit</th>
<th>Details</th>
<th>Activation</th>
</tr>
<script>
function setIsActive(regNo, isActive){
                                $.ajax({
                                    url: 'activate.php',
                                    type: 'post',
                                    data: `activate=${isActive}&st_id=${regNo}`,
                                    success: function(data) {
                                        
                                            if(data==="success"){
                                                location.reload();
                                            }
											else{
												console.log(data);
											}

                                        }
                                });
                            }

</script>


<?php

   $conn=mysqli_connect('localhost','root','') ;
   $db=mysqli_select_db($conn,'nitdatabase');
   
   
   $que="select * from student order by 1 DESC";
   $run= mysqli_query($conn, $que);
   
   
   while($row=mysqli_fetch_array($run))
   {
	$u_id  = $row['st_id'] ;
	$fname = $row['fname'];
    $lname = $row['lname'];
    $email =  $row['email'];
   
   ?>
<tr align='center'>
<td><?php echo $u_id; ?></td>
<td><?php echo $fname; ?></td>
<td><?php echo $lname; ?></td>
<td><?php echo $email; ?></td>
<td><a href='delete.php?delete=<?php echo $u_id?>'>Delete</a></td>
<td><a href='edit.php?edit=<?php echo $u_id?>'>Edit</a></td>
<td><a href='detail.php?detail=<?php echo $u_id?>'>Details</a></td>
<td><?php 
                            if($row['activate'] == 0){
                                ?>
                                <button onclick="setIsActive('<?php echo $row['st_id']; ?>', 1)" class="btn btn-success">Activate</button>
                                <?php
                            }else{
                                ?>
                                <button onclick="setIsActive('<?php echo $row['st_id']; ?>', 0)" class="btn btn-danger">Deactivate</button>
                                <?php
                            }
                        ?></td>
</tr>
   <?php } ?>
 </table> 
<center><p>Be very careful while using the Admin Page</p></center>
</body>
</html>