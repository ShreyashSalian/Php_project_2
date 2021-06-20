<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Add USer</title>
</head>
<?php require '../includes/nav.php'; 
  require '../connection.php';
  $adient_obj = new Adient();
  if (isset($_GET['editid']) && !empty($_GET['editid'])) {
    $id = $_GET['editid'];
    $row = $adient_obj->display_record_by_id('users','user_id='.$id.'');
}
?>

<body>
    <?php
    if (isset($_POST['update']) && isset($_POST['gender'])) {
        $data = [
            "first_name" => $_POST['first_name'],
            "last_name" => $_POST['last_name'],
            "email" => $_POST['email'],
            "contact_number"=>$_POST['contact_number'],
            "department" => $_POST['department'],
            "designation" => $_POST['designation'],
            "gender" => $_POST['gender'],
          ];
          $id = $_POST['id'];
          $adient_obj->updateTable('users',$data,'user_id='.$id.'');
    }

    ?>
    <div class="container">
    <div class="alert alert-danger alert-dismissible fade text-uppercase text-center m-2" role="alert"
                id="failure">
                <strong class="text-uppercase">Sorry </strong> Your Form is not submitted!!! Please Fill All the Details
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-9 col-md-6 back">
                <h1 class="text-center text-uppercase">Add users</h1>
                <hr>
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" place_holder="Enter The First Name"
                            class="form-control" value="<?php echo $row['first_name']?>">
                            <small id="first_name_valid"
                                class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Only
                                Alphabet</small>
                            <div class="valid-feedback bg">
                                ITS PERFECT!
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" place_holder="Enter The last Name"
                            class="form-control" value="<?php echo $row['last_name']?>">
                                <small id="last_name_valid"
                                class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Only
                                Alphabet</small>
                            <div class="valid-feedback bg">
                                ITS PERFECT!
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Email</label>
                        <input type="text" id="email" name="email" place_holder="Enter The Email Address"
                            class="form-control" value="<?php echo $row['email']?>">
                            <small id="email_valid"
                                class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Proper
                                Email</small>
                            <div class="valid-feedback bg">
                                ITS PERFECT!
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Phone number</label>
                        <input type="text" id="contact_number" name="contact_number" place_holder="Enter The Phone Number"
                            class="form-control" value="<?php echo $row['contact_number']?>">
                            <small id="phone_number_valid"
                            class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Only
                            digit</small>
                        <div class="valid-feedback bg">
                            ITS PERFECT!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Department</label>
                        <select name="department" id="department" class="form-control">
                        <?php

                        $grocery = $adient_obj->display_department();
                        foreach ($grocery as $c) {
                        ?>
                        <option value="<?php if ($c['department_id'] == $row['department']) echo $c['department_name'] ?>">
                          
                        <?php
                            echo "<option value='" . $c['department_id'] . "'>" . $c['department_name'] . "</option>";
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Designation">Designation</label>
                        <select name="designation" id="designation" class="form-control">
                            <option <?php if($row['designation']=="Employee"){echo "selected";}?>>Employee</option>
                            <option <?php if($row['designation']=="Manager"){echo "selected";}?>>Manager</option>
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label> &nbsp;
                        <input type="radio" name="gender"
                            <?php if (isset($row['gender']) && $row['gender'] == "female") echo "checked"; ?> value="female">Female
                        &nbsp;
                        <input type="radio" name="gender"
                            <?php if (isset($row['gender']) && $row['gender'] == 'male') echo "checked"; ?> value="male">Male
                        &nbsp;
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $row['user_id']?>">
                        <input type="submit" name="update" value="submit" class="btn btn-danger" id="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <?php require '../includes/footer.php'; ?>
    <?php require '../includes/script.php'; ?>
    <script src="../assets/js/user.js"></script>

</body>

</html>