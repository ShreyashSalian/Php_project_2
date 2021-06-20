    // $('#picker').datetimepicker({
        //     timepicker : false,
        //     datepicker : true,
        //     format : 'Y-m-d',
        //     value: 2021-04-21,
        //     //hours12 : false,
        //     //step : 30,
        //     yearStart : 2021,
        //     weeks:true,
        // });

$(document).ready(function()
{
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes();
    var dateTime = date+' '+time;
    $('#datetime').val(dateTime);
    $("#datetime").datetimepicker({
      
        dateFormat: 'dd/mm/yy',
        timeFormat: 'hh:mm TT',
        showOn: "focus",
        changeMonth: true,
        changeYear: true,

        yearRange: '2020:' + new Date().getFullYear().toString()
    });

    $('#yes').click(function(){
        $('#date').show();
    })
    $('#no').click(function(){
        $('#date').hide();
    })
    $('#displayYes').click(function(){
        $('#displayData').show();
    })
    $('#displayNo').click(function(){
        $('#displayData').hide();
    });
});    
Webcam.set(
    {
    width: 200,
    height: 200,
    image_format: 'jpeg',
    jpeg_quality: 90
});

Webcam.attach( '#my_camera' );

function take_snapshot()
{
    Webcam.snap( function(data_uri) 
    {
        $(".image-tag").val(data_uri);
        document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
    } );
}

function getdepartment(val)
{
    let department_id = val;
    alert(department_id);
}

$('#department_dropdown').on('change',function(){
    let dep_id = this.value;
    action = "department";
    $.ajax({
        url : 'list.php',
        type : "post",
        data :{
            dep_id : dep_id,
            action : action,
        },
        success:function(result){
            $('#meeting_person').html(result);
        }
    })
})