<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['loggedIn'] != true) {
    header('location:../../views/login.php');
    exit();
}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>User Details</title>
</head>

<body>
<?php 
    require '../includes/navbar.php'; 
    require '../../connection.php';
    $adient_obj = new Adient();
?>
    <div class="container-fluid">
    <h1 class="text-uppercase text-warning text-center m-4">User list</h1>
    <div id="msg">
    </div>
      <!-- <table class="table table-striped">
      <thead class="text-uppercase text-center text-danger">
        <th scope="col">User Id</th>
        <th scope="col">FullName</th>
        <th scope="col">Email</th>
        <th scope="col">Contact</th>
        <th scope="col">Department</th>
        <th scope="col">Designation</th>
        <th scope="col">Action</th>
      </thead>
      <tbody id="tbody" class="text-center text-success text-uppercase"></tbody>
      </table> -->
      <div id="table_user">
      </div>
   
    <?php require '../../includes/footer.php'; ?>
    <?php require '../../includes/script.php'; ?>
    <script src = "../js/department_list.js"></script>
</body>

</html>