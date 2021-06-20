<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['email'] != true) {
    header('location:login.php');
    exit();
}
    require '../../connection.php';
    $adient_obj = new Adient();
    if (isset($_GET['id']) && !empty($_GET['id'])) 
    {
        $id = $_GET['id'];
        $row =  $adient_obj->display_record_by_visitor($id);
    }
    if (isset($_POST['update']))
    {
        echo "hello";
        //$grocery_obj->update_records($_POST);
        $data = [
            "approval" => $_POST['approval'],
        ];
        $id = $_POST['visitor_id'];
        $adient_obj->updateTable('visitors',$data,'visitor_id='.$id.'');
        header('location:display_visitors.php');
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

    <title>Visitor Details</title>
</head>

<body>
<?php 
     require '../includes/navbar.php'; 
   
?>
    <div class="container text">
        <h1 class="text-center text-uppercase text-danger m-4">Visitor Detail</h1>
        <form action="visitors.php" method="post">
        <table class="table text-uppercase">

            <input type="hidden" name="visitor_id" value="<?php echo $row['visitor_id'] ?>">
            <tr>

                <td>1. FirstName</td>
                <td><?php echo $row['first_name']?></td>
            </tr>
            <tr>
                <td>2. last Name</td>
                <td><?php echo $row['last_name']; ?></td>
            </tr>
            <tr>
                <td>3. Email</td>
                <td><?php echo $row['email']; ?></td>
            </tr>
            <tr>
                <td>4. Contact Number</td>
                <td><?php echo $row['contact_number']; ?></td>
            </tr>
            <tr>
                <td>5. Department</td>
                <?php
                    $id = $row['department'];
                    $gro = $adient_obj->display_record_by_id('department','department_id = '.$id.'');
                    $department_name = $gro['department_name'];
                ?>
                <td><?php echo $department_name ?></td>
            </tr>
            <tr>
                <td>6. Manager/Employeer</td>
                <td><?php echo $row['designation']; ?></td>
            </tr>
            <tr>
                <td>7. Meeting Person</td>
                <?php
                    $id = $row['meeting_person'];
                    $gro = $adient_obj->display_record_by_id('users','user_id = '.$id.'');
                    $meeting_person = $gro['first_name'];
                ?>
                <td><?php echo $meeting_person ?></td>
            </tr>
            <tr>
                <td>8. Appointment Time And Time</td>
                <td><?php echo $row['appoint_date']; ?></td>
            </tr>
            <tr>
                <td>9. Appointment Status</td>
                <td>
                    <select name="approval" class="form-control">

                        <option <?php if ($row['approval'] == "pending") {
                                    echo "selected";
                                } ?>>pending</option>
                        <option <?php if ($row['approval'] == "rejected") {
                                    echo "selected";
                                } ?>>rejected</option>
                        <option <?php if ($row['approval'] == "approved") {
                                    echo "selected";
                                } ?>>approved</option>
                    </select>
                </td>
            </tr>
            <td colspan="2">

                <input type="submit" name="update" value="Update Status" class="btn btn-success">
            </td>

        </table>
        </form>
    </div>
    <?php require '../../includes/footer.php'; ?>
    <?php require '../../includes/script.php'; ?>
</body>

</html>