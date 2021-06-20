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
    require '../includes/nav.php'; 
    require '../connection.php';
    $adient_obj = new Adient();
?>
    <div class="container-fluid">
    <div id="msg">
    </div>
    <h1 class="alert warning p-2 text-center text-uppercase text-warning m-4 font-weight-bold"> Show User Details</h1>
    <button type="button" class="btn btn-primary text-uppercase m-4 p-2 font-bold" data-toggle="modal" data-target="#exampleModal">
    Add User
    </button>
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
      <div id="table">
      </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-uppercase text-center text-warning" id="exampleModalLabel">Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
`      </div>
      <div class="modal-body">
        <div id="msg"></div>
        <form action="" method="post" id="myform">
                    <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" name="first_name" id="first_name" placeholder="Enter department Name"
                            class="form-control">
                            <span id="first_name_error" class="text-danger font-bold"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">last Name</label>
                        <input type="text" name="last_name" id="last_name" placeholder="Enter Manager Name"
                            class="form-control">
                            <span id="last_name_error" class="text-danger font-bold"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter Manager Name"
                            class="form-control">
                            <span id="email_error" class="text-danger font-bold"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contact Number</label>
                        <input type="text" name="contact_number" id="contact_number" placeholder="Enter Manager Name"
                            class="form-control">
                            <span id="contact_number_error" class="text-danger font-bold"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="text" name="password" id="password" placeholder="Enter Manager Name"
                            class="form-control">
                            <span id="password_error" class="text-danger font-bold"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="text" name="confirm_password" id="confirm_password" placeholder="Enter Manager Name"
                            class="form-control">
                            <span id="confirm_password_error" class="text-danger font-bold"></span>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Department</label>
                        <select name="department" id="department" class="form-control">
                            <?php
                            $grocery =  $adient_obj->SelectTableRecords('select * from department');
                            foreach ($grocery as $c) {
                            ?>
                            <option value="<?php echo $c['department_id'] ?>"><?php echo $c['department_name'] ?>
                            </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Designation">Designation</label>
                        <select name="designation" id="designation" class="form-control">
                            <option value="Manager" selected>Manager</option>
                            <option value="Employee">Employee</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Gender">Gender</label>
                        <input type="radio" name="gender" value="male" id="gender"> Male
                        <input type="radio" name="gender" value="male" id="gender"> FeMale
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Active / InActive</label>
                        <select name="active" id="active" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">In Active</option>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="userRole">User Role</label>
                        <select name="user_role" id="user_role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="employeer">Employeer</option>
                        </select>
                    </div>         
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btnadd">Save</button>
      </div>
    </div>
  </div>
</div>



<!-------------------------------------------------------------- Edit Modal -------------------------------------------->
<div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-uppercase text-center text-warning" id="exampleModalLabel">Update Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="msg"></div>
        <form action="" method="post" id="myform_update">
        <input type="hidden" name="user_id" id="user_id">

                    <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" name="first_name" id="first_name_update" placeholder="Enter department Name"
                            class="form-control">
                            <span id="first_name_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">last Name</label>
                        <input type="text" name="last_name" id="last_name_update" placeholder="Enter Manager Name"
                            class="form-control">
                            <span id="last_name_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="text" name="email" id="email_update" placeholder="Enter Manager Name"
                            class="form-control">
                            <span id="email_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contact Number</label>
                        <input type="text" name="contact_number" id="contact_number_update" placeholder="Enter Manager Name"
                            class="form-control">
                            <span id="contact_number_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Department</label>
                        <select name="department" id="department_update" class="form-control" name="department_update">
                        <?php
                            $grocery =  $adient_obj->SelectTableRecords('select * from department');
                            foreach ($grocery as $c) {
                            ?>
                            <option value="<?php echo $c['department_id'] ?>"><?php echo $c['department_name'] ?>
                            </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Designation">Designation</label>
                        <select name="designation" id="designation_update" class="form-control">
                            <option value="" id="designation_update" selected></option>
                            <option value="Manager">Manager</option>
                            <option value="Employee">Employee</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Gender">Gender</label>
                        <input type="radio" name="gender" value="male" id="gender_update"> Male
                        <input type="radio" name="gender" value="male" id="gender_update"> FeMale
                        
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Active / InActive</label>
                        <select name="active" id="active_update" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">In Active</option>
                        </select>
                    </div>
            
                </form>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning" id="btnupdate">Update</button>
      </div>
    </div>
  </div>
</div>
    <?php require '../includes/footer.php'; ?>
    <?php require '../includes/script.php'; ?>
    <script src = "../assets/js/user_query.js"></script>
   
</body>

</html>