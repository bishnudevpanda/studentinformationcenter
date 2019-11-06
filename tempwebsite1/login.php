

 
 
 <?php

   $conn=mysqli_connect('localhost','root','') ;

if(!$conn){
	echo 'Not connected to server' or die(mysqli_error($conn));
}else{
	echo "connected but it seems that username or password was wrong! Please go back and try again.";
}
$db=mysqli_select_db($conn,'nitdatabase');
if(!$db)
{
	echo"Database not connecteed" or die(mysqli_error($conn));
}
if(isset($_POST['login']))
{
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from login where username='$username' and password='$password' ";
	$result=mysqli_query($conn, $query);
	
	while($row=mysqli_fetch_array($result))
	{
		if($row['username']==$username && $row['password']==$password)
		{
			
			header("Location: view.php");
		}
		else{echo "Wrong username or password"; }
	}
	
	
}else{
	echo "empty post data";
}
 ?>