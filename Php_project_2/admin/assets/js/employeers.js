$(document).ready(function(){
    showdata();
});    

    function showdata(){
        let readrecord = "readrecord";

        $.ajax({
            url:"employeers_data.php",
            type:"post",
            data:{readrecord:readrecord},
            success:function(data,status){
                $('#table').html(data);
            }
        });
    }


   