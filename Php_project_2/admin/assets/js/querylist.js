$(document).ready(function () {
    showdata();
});
// ================================================== Display Data===================================
function showdata() {
    let action = "readrecord";

    $.ajax({
        url: "department_query.php",
        type: "post",
        data: { action: action },
        success: function (data, status) {
            $('#table').html(data);
        }
    });
}

//=========================== insert data===================================
$('#btnadd').click(function (e) {
    e.preventDefault();
    let action = "insert";
    console.log('Save Button clicked');
    let department_name = $('#department_name').val();
    let manager = $('#manager').val();
    let department_description = $('#department_description').val();
    let active = $('#active').val();

    let name_check = /[A-Za-z]{2,}$/;
    if (!name_check.test(department_name)) {
        document.getElementById('department_name_error').innerHTML = "** Please Enter the Department Name **";
        return false;
    }
    else {
        document.getElementById('department_name_error').innerHTML = "";
    }
    if (!name_check.test(manager)) {
        document.getElementById('manager_error').innerHTML = "** Please Enter the Manager Name **";
        return false;
    }
    else {
        document.getElementById('manager_error').innerHTML = "";
    }
    if (!name_check.test(department_description)) {
        document.getElementById('department_description_error').innerHTML = "** Please Enter the Description **";
        return false;
    }
    else {
        document.getElementById('department_description_error').innerHTML = "";
    }
    if (active == "") {
        document.getElementById('active_error').innerHTML = "** Please Select The Status **";
        return false;
    }
    else {
        document.getElementById('active_error').innerHTML = "";
    }

    //console.log(name);
    // mydata = {
    //     department_name : department_name,
    //     manager : manager,
    //     department_description : department_description,
    //     active : active,
    //     action : action,
    //     }
    //console.log(mydata);
    $.ajax({
        url: "department_query.php",
        method: "post",
        data: {
            department_name: department_name,
            manager: manager,
            department_description: department_description,
            active: active,
            action: action,
        },
        success: function (data) {
            //console.log(data);
            msg = "<div class='alert alert-dark mt-3'>" + data + "</div>";
            $('#msg').html(msg);
            $('#myform')[0].reset();
            showdata();
        }
    });
});
// =================================== UPdate code =============================================
$('#btnupdate').click(function (e) {
    e.preventDefault();
    let action = "updateData";
    console.log('Update Button clicked');
    let department_name = $('#department_name_update').val();
    let manager = $('#manager_update').val();
    let department_description = $('#department_description_update').val();
    let active = $('#active_update').val();
    let department_id = $('#department_id').val();
    $.ajax({
        url: "department_query.php",
        method: "post",
        data: {
            department_name: department_name,
            manager: manager,
            department_description: department_description,
            active: active,
            department_id: department_id,
            action: action,
        },
        success: function (data) {
            //console.log(data);
            msg = "<div class='alert alert-dark mt-3'>" + data + "</div>";
            $('#msg').html(msg);
            //$('#myform_update')[0].reset();
            $("#update_modal").modal("hide");
            showdata();
        }
    })
});

//================================== Delete user ====================================== 
function DeleteUser(id) {
    alert(id);
    let action = "delete";
    let conf = confirm('Are you sure you wanted to delete it');
    if (conf == true) {
        $.ajax({
            url: "department_query.php",
            method: "post",
            data: {
                id: id,
                action: action,
            },
            success: function (data) {
                msg = "<div class='alert alert-dark mt-3'>" + data + "</div>";
                $('#msg').html(msg);
                showdata();
                //$(mythis).closest("tr").fadeOut();
            }
        });
    }
}
// ============================================== Display data for update =================================
function UpdateUser(department_id) {
    let action = "update";
    $.ajax({
        url: "department_query.php",
        method: "POST",
        data: {
            department_id: department_id,
            action: action,
        },
        dataType: 'json',
        success: function (data, status) {
            $("#department_name_update").val(data.department_name);
            $("#manager_update").val(data.manager);
            $("#active_update").val(data.active);
            $("#department_description_update").val(data.department_description);
            $("#department_id").val(data.department_id);
        }
    });
}

