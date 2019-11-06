<?php

    require_once("config.php");
    $isActive=$_POST['activate'];
    $regNo=$_POST['st_id'];
    $query="UPDATE student SET activate = '$isActive' WHERE st_id = '$regNo'";
    $result=mysqli_query($link, $query);

    if($result){
        echo "success";
    }else{
        echo mysqli_error($link);
    }

?>