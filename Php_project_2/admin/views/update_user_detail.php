<?php
require '../connection.php';
$adient = new Adient();

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
// echo $mydata;
$array = [
    "first_name" => $mydata['first_name'],
    "last_name" => $mydata['last_name'],
    "email" => $mydata['email'],
    "contact_number" => $mydata['contact_number'],
    "department" => $mydata['department'],
    "designation" => $mydata['designation'],
    "gender" => $mydata['gender'],
    "active" => $mydata['active'],
  
];
//$grocery->insertInTable('users',$array);
$id = $mydata['user_id'];
$adient->updateTable('users',$array,'user_id='.$id.'');

?>