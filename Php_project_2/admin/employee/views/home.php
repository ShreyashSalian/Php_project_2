<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['email'] != true) {
    header('location:../../views/login.php');
    exit();
}
require '../../connection.php';
$adient = new adient();


?>
<!-- Header section start-->
<?php require '../../includes/header.php' ?>
<!-- <link rel="stylesheet" href="../assets/css/style.css" type="text/css"> -->
<!-- Header section end-->
<!-- Navbar start -->
<?php require '../includes/navbar.php' ?>
<!-- Navbar end -->
<!-- Main section start -->

<body>
    <div class="container">
        <h1 class="mt-4 text-center text-uppercase text-danger">Welcome back : <?php echo $_SESSION['email'];?></h1>
    </div>

</body>

</html>
<!-- Main section end -->
<!-- Footer section start -->
<?php require '../../includes/Footer.php' ?>
<?php require '../../includes/script.php' ?>
<!-- Footer section end -->