<?php

 $conn=mysqli_connect('localhost','root','') ;
 $db=mysqli_select_db($conn,'nitdatabase');
 $delete_record=$_GET['delete'];
 $query="delete from student where st_id='$delete_record'";
 
 
 
 if (mysqli_query($conn, $query)){
	 echo "<script>window.open('view.php?deleted=Data record has been deleted successfully!','_self')</script>";
 }
 

?>