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

    <title>Department Details</title>
</head>

<body>
    <?php require '../includes/navbar.php'; ?>
    <div class="container-fluid">
    <h1 class="text-center text-danger text-uppercase m-5">department list</h1>
    <div id="msg">
    </div>
      <!-- <table class="table table-striped">
      <thead class="text-danger text-center text-uppercase">
        <th scope="col">Department Id</th>
        <th scope="col">Department Manager</th>
        <th scope="col">Department Name</th>
        <th scope="col">Department Des</th>
        <th scope="col">Action</th>
      </thead>
      <tbody id="tbody" class="text-center text-success text-uppercase"></tbody>
      </table> -->
      <div id="table_department"></div>

    <?php require '../../includes/footer.php'; ?>
    <?php require '../../includes/script.php'; ?>
    <script src="../js/department_list.js"></script>
</body>

</html>