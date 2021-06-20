<?php require '../config.php'?>
<nav class="navbar navbar-expand-lg navbar-light bg-success text-uppercase text-dark font-weight-bold">
    <a class="navbar-brand" href="#">Adient</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo DEPARTMENT;?>">Department</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo LIST_USER;?>">User List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo USER_PROFILE;?>">My Detail</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo DISPLAY_VISITORS;?>">Visitors List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo CHANGE_PASS;?>">Change Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo LOGOUT;?>">Logout</a>
            </li>
        </ul>
    </div>
</nav>