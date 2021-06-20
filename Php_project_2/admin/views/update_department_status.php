<?php
    include '../connect.php';
    $id = $_GET['id'];
    $status = $_GET['status'];
    
     $sql = "update department set  active = '$status' where department_id = '$id'";
     //echo $sql;
     $query = mysqli_query($con,$sql);
     if($query){
         header('location:department.php');
     }
     else{
         echo "There is some error".mysqli_error($con);
     }