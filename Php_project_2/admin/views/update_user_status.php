<?php
include '../connect.php';
$id = $_GET['id'];
$status = $_GET['status'];

$sql = "update users set  active = '$status' where user_id = '$id'";
//echo $sql;
$query = mysqli_query($con, $sql);
if ($query) {
    header('location:list_user.php');
} else {
    echo "There is some error" . mysqli_error($con);
}