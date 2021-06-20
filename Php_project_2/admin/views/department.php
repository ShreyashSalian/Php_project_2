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

    <title>all department</title>
</head>

<body>
    <?php require '../includes/nav.php'; ?>
    <div class="container-fluid">
    <div id="msg">
    </div>
    <h1 class="alert warning p-2 text-uppercase text-center m-4 text-success font-weight-bold"> Show Department Details</h1>
    <button type="button" class="btn btn-primary m-4 p-2 text-uppercase" data-toggle="modal" data-target="#exampleModal">
    Add Department
    </button>
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
      <div id="table"></div>

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
                        <label for="exampleInputEmail1">Department Name</label>
                        <input type="text" name="department_name" id="department_name" placeholder="Enter department Name"
                            class="form-control">
                            <span id="department_name_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Manager</label>
                        <input type="text" name="manager" id="manager" placeholder="Enter Manager Name"
                            class="form-control">
                            <span id="manager_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Active / InActive</label>
                        <select name="active" id="active" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">In Active</option>
                        </select>
                        <span id="active_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Department Description</label>
                        <textarea name="department_des" id="department_description" cols="30" rows="10" class="form-control"
                            placeholder="Enter The Department Description"></textarea>
                            <span id="department_description_error" class="text-danger"></span>
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
        <h5 class="modal-title text-uppercase text-center text-warning" id="exampleModalLabel">Update Department Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="msg"></div>
        <form action="" method="post" id="myform_update">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Department Name</label>
                        <input type="text" name="department_name" id="department_name_update" 
                            class="form-control">
                            <div class="department_name_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Manager</label>
                        <input type="text" name="manager" id="manager_update" placeholder="Enter Manager Name"
                            class="form-control">
                            <div class="manager_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Active / InActive</label>
                        <select name="active" id="active_update" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">In Active</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Department Description</label>
                        <textarea name="department_description" id="department_description_update" cols="30" rows="10" class="form-control" placeholder="Enter The Department Description"></textarea>
                        <div class="department_description_error"></div>
                    </div>
                </form>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="department_id" id="department_id">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning" id="btnupdate">Update</button>
      </div>
    </div>
  </div>
</div>
    <?php require '../includes/footer.php'; ?>
    <?php require '../includes/script.php'; ?>
    <script src="../assets/js/querylist.js"></script>
</body>

</html>