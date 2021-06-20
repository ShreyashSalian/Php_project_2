<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>List User</title>
</head>
<?php require '../includes/nav.php'; ?>

<body>
    <?php
    require '../connect.php';
    $user_id = $_GET['id'];
    $sql = "select * from users where user_id ='$user_id'";
    $query = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-9 col-md-6 back">
                <h1 class="text-center text-uppercase">Add users</h1>
                <hr>
                <table class="table table-dark p-2 text-center border-1">
                    <tr>
                        <th>First Name</th>
                        <td class="text-danger"><?php echo $row['first_name']; ?></td>
                    </tr>
                    <tr>
                        <th>last Name</th>
                        <td class="text-danger"><?php echo $row['last_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td class="text-danger"><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td class="text-danger"><?php echo $row['contact_number']; ?></td>
                    </tr>
                    <tr>
                        <th>Department</th>
                        <td class="text-danger"><?php echo $row['department']; ?></td>
                    </tr>
                    <tr>
                        <th>First Name</th>
                        <td class="text-danger"><?php echo $row['first_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Designation</th>
                        <td class="text-danger"><?php echo $row['designation']; ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td> <?php if ($row['active'] == 1) { ?><span class=" btn btn-success btn-xs"> Active
                            </span><?php } else { ?><span class="btn btn-warning btn-xs"> Deactive
                            </span><?php } ?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td class="text-danger"><?php echo $row['gender']; ?></td>
                    </tr>
                    <td colspan="2">
                        <a href="list_users.php" class="btn btn-success">Back To User</a>
                    </td>

                </table>

            </div>
        </div>
    </div>

    <?php
    }
    ?>
    <?php require '../includes/footer.php'; ?>
    <?php require '../includes/script.php'; ?>


</body>

</html>