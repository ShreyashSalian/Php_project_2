<?php
require '../connection.php';
$adient = new Adient();


$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$adient->insert_data($mydata);

?>