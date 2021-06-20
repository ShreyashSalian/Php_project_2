<?php
session_start();
require '../../connection.php';
$adient_obj = new Adient();
if (!isset($_SESSION['email']) || $_SESSION['loggedIn'] != true) {
    header('location:../../views/login.php');
    exit();
}
else{
    $email = $_SESSION['email'];
    
    $row = $adient_obj->display_record($email);
}
if (isset($_POST['update'])) {
    $data = [
        "first_name"  => $_POST['first_name'],
        "last_name"  => $_POST['last_name'],
        // "email"  => $_POST['email'],
        "contact_number"  => $_POST['contact_number'],
        "gender"  => $_POST['gender'],
    ];
    $id = $_POST['user_id'];
    $adient_obj->updateTable('users',$data,'user_id='.$id.'');
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

    <title>User Profile</title>
</head>

<body>
    <?php require '../includes/navbar.php'; ?>
    <h1 class="text-center text-danger text-uppercase m-3">USer PRofile</h1>
    <div class="container text">
    <div class="alert alert-success alert-dismissible fade text-uppercase text-center" role="alert" id="success">
        <strong class="text-uppercase">Great </strong> Your Form is submitted!!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="alert alert-danger alert-dismissible fade text-uppercase text-center" role="alert" id="failure">
        <strong class="text-uppercase">Sorry </strong> Your Form is not submitted!!! Please Fill All the Details
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <form action="profile.php" method="post">
        <div class="form-group">
            <label for="name">First Name</label>
            <input type="text" class="form-control" name="first_name" placeholder="Enter the First Name" id="first_name" value="<?php echo $row['first_name'];?>">
            <small id="first_name_valid"
                class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Only
                Alphabet</small>
            <div class="valid-feedback bg">
                ITS PERFECT!
            </div>
        </div>
        <div class="form-group">
            <label for="name">Last Name</label>
            <input type="text" class="form-control" name="last_name" placeholder="Enter the Last Name" id="last_name" value="<?php echo $row['first_name'];?>">
            <small id="last_name_valid"
                class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Only
                Alphabet</small>
            <div class="valid-feedback bg">
                ITS PERFECT!
            </div>
        </div>
        <!-- <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter the Email" id="email" value="<?php echo $row['email'];?>">
            <small id="email_valid" class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter
                Proper
                Email</small>
            <div class="valid-feedback bg">
                ITS PERFECT!
            </div>
        </div> -->
       
      
        <div class="form-group">
            <label for="name">Contact Number</label>
            <input type="text" class="form-control" name="contact_number" placeholder="Enter The Phone Number"
                id="contact_number" value="<?php echo $row['contact_number'];?>">
            <small id="mobile_number_valid"
                class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Only
                Digit</small>
            <div class="valid-feedback bg">
                ITS PERFECT!
            </div>
        </div>
        <div class="form-group">
            <label for="">Gender</label> &nbsp;
            <input type="radio" name="gender"
                <?php if (isset($row['gender']) && $row['gender'] == "female") echo "checked"; ?> value="female">Female
            &nbsp
            <input type="radio" name="gender"
                <?php if (isset($row['gender']) && $row['gender'] == 'male') echo "checked"; ?> value="male">Male
            &nbsp;
        </div>
        <hr>
        <div class="form-group">
            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
            <input type="submit" class="btn btn-success text" name="update" value="Update Data" id="submit">
        </div>
    </form>
</div>
    <?php require '../../includes/footer.php'; ?>
    <?php require '../../includes/script.php'; ?>
    <script src = "../../assets/js/user_profile.js"></script>
   
</body>

</html>