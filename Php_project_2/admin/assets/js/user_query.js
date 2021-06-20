$(document).ready(function() {
    showdata();

});
function showdata() {
    let action = "readrecord";
    $.ajax({
        url: "edit_user.php",
        type: "post",
        data: { action: action },
        success: function (data, status) {
            $('#table').html(data);
        }
    });
}

// insert data
$('#btnadd').click(function (e) {
    let action = "insert";
    e.preventDefault();
    console.log('Save Button clicked');
    let first_name = $('#first_name').val();
    let last_name = $('#last_name').val();
    let email = $('#email').val();
    let contact_number = $('#contact_number').val();
    let password = $('#password').val();
    let confirm_password = $('#confirm_password').val();
    let department = $('#department').val();
    let designation = $('#designation').val();
    let gender = $('#gender').val();
    let user_role = $('#user_role').val();
    let active = $('#active').val();

    // alert(user_role);
    let name_check = /[A-Za-z]{2,}$/;
    let email_check = /^([_a-zA-Z0-9\-\.]+)@([_a-zA-Z0-9\-\.]+)\.([a-zA-Z]){2,7}$/;
    let phone_check = /^\d{10}$/;
    let password_check = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!name_check.test(first_name)) {
        document.getElementById('first_name_error').innerHTML = "** please Enter The First Name **";
        return false;
    } else {
        document.getElementById('first_name_error').innerHTML = "";
    }
    if (!name_check.test(last_name)) {
        document.getElementById('last_name_error').innerHTML = "** please Enter The last Name **";

        return false;
    } else {
        document.getElementById('last_name_error').innerHTML = "";
    }
    if (!email_check.test(email)) {
        document.getElementById('email_error').innerHTML = "** please Enter  proper email **";
        return false;
    } else {
        document.getElementById('email_error').innerHTML = "";
    }
    if (!phone_check.test(contact_number)) {
        document.getElementById('contact_number_error').innerHTML = "** please Enter Proper Mobile Number **";
        return false;
    } else {
        document.getElementById('contact_number_error').innerHTML = "";
    }
    if (!password_check.test(password)) {
        document.getElementById('password_error').innerHTML = "** please Enter Proper password **";
        return false;
    } else {
        document.getElementById('password_error').innerHTML = "";
    }
    // if(!password_check.test(confirm_password)){
    //     document.getElementById('confirm_password_error').innerHTML = "** please Enter Proper Confirm password **";
    //     return false;
    // }
    // else{
    //     document.getElementById('confirm_password_error').innerHTML = "";
    // }
    // if(!confirm_password.match(password)){
    //     document.getElementById('confirm_password_error').innerHTML = "** Password and confirm password doesnt match **";
    //     return false;
    // }
    // else{
    //     document.getElementById('confirm_password_error').innerHTML = "";
    // }
    //console.log(name);
    $.ajax({
        url: "edit_user.php",
        method: "post",
        data: {
            first_name: first_name,
            last_name: last_name,
            email: email,
            contact_number: contact_number,
            password: password,
            confirm_password: confirm_password,
            department: department,
            designation: designation,
            gender: gender,
            active: active,
            user_role: user_role,
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
$('#btnupdate').click(function (e) {
    e.preventDefault();
    let action = "updateData";
    let first_name = $('#first_name_update').val();
    let last_name = $('#last_name_update').val();
    let email = $('#email_update').val();
    let contact_number = $('#contact_number_update').val();
    let department = $('#department_update').val();
    let designation = $('#designation_update').val();
    let gender = $('#gender_update').val();
    let active = $('#active_update').val();
    let user_id = $('#user_id').val();
    alert(user_id);
    //console.log(name);
    $.ajax({
        url: "edit_user.php",
        method: "post",
        data: {
            first_name: first_name,
            last_name: last_name,
            email: email,
            contact_number: contact_number,
            department: department,
            designation: designation,
            gender: gender,
            active: active,
            user_id: user_id,
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

// delete record
// $("tbody").on("click",".btn-delete",function(){
//     console.log("delete button clicked");
//     let id = $(this).attr("data-sid");
//     console.log(id);
//     mydata = {id:id};
//    // mythis = this;
//     $.ajax({
//         url:"delete_user.php",
//         method:"post",
//         data : JSON.stringify(mydata),
//         success:function(data){
//             msg = "<div class='alert alert-dark mt-3'>"+data+"</div>";
//             $('#msg').html(msg);
//             showdata();
//             //$(mythis).closest("tr").fadeOut();
//         }

//     })
// });
function DeleteUser(id) {
    alert(id);
    let action = "delete";
    let conf = confirm('Are you sure you wanted to delete it');
    if (conf == true) {
        // mydata = {
        //     id:id,
        //     action : action,
        // };
        $.ajax({
            url: "edit_user.php",
            method: "POST",
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
function UpdateUser(user_id) {
    let action = "update";
    $.ajax({
        url: "edit_user.php",
        method: "POST",
        data: {
            user_id: user_id,
            action: action
        },
        dataType: 'json',
        success: function (data, status) {        
            alert(data);
            $("#first_name_update").val(data.first_name);
            $("#last_name_update").val(data.last_name);
            $("#email_update").val(data.email);
            $("#contact_number_update").val(data.contact_number);
            $("#department_update").val(data.department);
            $("#designation_update").val(data.designation_update);
            $("#gender_update").val(data.gender);
            $("#active_update").val(data.active);
            $("#user_id").val(data.user_id);
        }
    });
}
