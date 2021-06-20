<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['email'] != true) {
    header('location:login.php');
    exit();
}
require '../connection.php';
$adient = new Adient();

if (isset($_POST['submit'])) {
    $adient->changepassword($_POST);
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
    <title>Registration Form</title>
    <style>
    .text {
        letter-spacing: 2px;
        text-transform: uppercase;
    }
    </style>
</head>

<body>
    <?php
    require '../includes/nav.php';
    ?>
    <div class="card text-center text-uppercase" style="padding:15px;">
        <h4 class="text-uppercase text">Update your password</h4>
    </div><br>
    <?php
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        echo '<div class="alert alert-danger alert-dismissible fade show text-uppercase" role="alert">
                <strong>Alert !!! </strong> ' . $msg . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    }
    ?>
    <div class="container text">
        <div class="alert alert-success alert-dismissible fade text-uppercase text-center" role="alert" id="success">
            <strong class="text-uppercase">Great </strong> Your Form is submitted!!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="alert alert-danger alert-dismissible fade text-uppercase text-center" role="alert" id="failure">
            <strong class="text-uppercase">Sorry </strong> Your Form is not submitted!!! Please Fill All the Details
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <form action="change_password.php" method="post">
            <div class="form-group">
                <label for="name">Old Password</label>
                <input type="password" class="form-control" name="old_password" placeholder="Enter the old password"
                    id="old_password">
                <small id="password_valid"
                    class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Proper
                    Password</small>
                <div class="valid-feedback bg">
                 
                </div>

            </div>

            <div class="form-group">
                <label for="name">New Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter the password"
                    id="password">
                <small id="password_valid"
                    class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Proper Password or New PAsswrod should not be same as old Password
                    Password</small>
                <div class="valid-feedback bg">
                  
                </div>

            </div>
            <div class="form-group">
                <label for="name">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" placeholder="Enter the password"
                    id="confirm_password">
                <small id="confirm_password_valid"
                    class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Proper password or New password or confirm Password should match.
                    </small>
                <div class="valid-feedback bg">
                  
                </div>
            </div>
            <hr>
            <div class="form-group">
                <input type="submit" class="btn btn-success text" name="submit" value="update password" id="submit">
            </div>
        </form>
    </div>
    <?php require '../includes/footer.php'; ?>
    <?php require '../includes/script.php'; ?>
    <script src="../assets/js/change_password.js"></script>
</body>

</html>