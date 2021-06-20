$(document).ready(function(){
    showdata();
    showUserData();
});    

    function showdata(){
        let action = "readrecord";

        $.ajax({
            url:"department.php",
            type:"post",
            data:{action : action},
            success:function(data,status){
                $('#table_department').html(data);
            }
        });
    }
    function showUserData(){
        let action = "readUserRecord";
        $.ajax({
            url:"department.php",
            type:"post",
            data:{action:action},
            success:function(data,status){
                $('#table_user').html(data);
            }
        });
    }
