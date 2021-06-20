<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['email'] != true) {
    header('location:login.php');
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
<?php
     require '../../connection.php';
     $adient_obj = new Adient();
    require '../includes/navbar.php'; 
   
?>
    <div class="container-fluid">
        <h1 class="text-center text-uppercase">Visitors List</h1>
        <table class="table table-hover text-uppercase text-center">
            <thead class="text-uppercase text text-danger">
                <th>Id</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Image</th>
                <th>More</th>
            </thead>
            <tbody>
                <?php
                    $n = 1;
                    $email = $_SESSION['email'];
                    $row = $adient_obj->display_record_by_email($email);
                    $user_id = $row['user_id'];
                    $adient = $adient_obj->SelectTableRecords("select * from visitors  where meeting_person = '$user_id'");
                    foreach ($adient as $c) {
                ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $c['first_name'].' '.$c['last_name'] ?></td>
                    <td><?php echo $c['email']; ?></td>
                    <td><?php echo $c['contact_number']; ?></td>
                    <td><img src="../../../uploads/<?php echo $c['image'] ?>" alt="image" height="150px" width="150px"></td>
                    <td><a href="visitor_list.php?id=<?php echo $c['visitor_id']?>">More </a>
                </tr>
                <?php
                    $n++;
                }
                ?>
            </tbody>
        </table>
    </div>
 
    <?php require '../../includes/footer.php'; ?>
    <?php require '../../includes/script.php'; ?>
</body>

</html>