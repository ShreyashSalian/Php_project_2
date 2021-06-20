
<?php

require '../connection.php';
$adient = new adient();

// ------------------ CHeck the action =================================
if(isset($_POST['action']))
{
    // ======================== Assigning action to value========================
   $val = $_POST['action'];
   if($val == "readrecord")
   {
        $value = '<table class="table text-uppercase text-center">
        <thead class="text-danger">
            <tr>
            <td> Department ID </td>
            <td> Department Name</td>
            <td> Manager</td>
            <td> Status </td>
            <td> Edit </td>
            <td> Delete </td>
            </tr>
            </thead> <tbody id="tbody" class="text-dark">';
            $dep = 
            $gro = $adient->SelectTabledata("select * from department");
            $n = 1;
            foreach ($gro as $c) {

            $active = "";
            $c['active'] == 0 ? $active = "inActive" : $active = "Active";
            $value.= '  
            <tr>
                <td> '.$n.' </td>
                <td> '.$c['department_name'].' </td>
                <td> '.$c['manager'].'</td>
                <td>'.$active.'</td>
                <td><button class="btn btn-warning btn-edit" onclick="UpdateUser('.$c['department_id'].')" data-toggle="modal" data-target="#update_modal"><i class="fas fa-user-edit"></i>EDIT</button></td>
                <td><button class="btn btn-danger btn-delete" onclick="DeleteUser('.$c['department_id'].')">DELETE</button><td>
            </tr>
            '.$n++.'
            ';
        }

        $value.='</tbody></table>';
        echo $value;
   }
    //========================== Check for insert ====================================
    if($val == "insert")
    {
    // echo $mydata;
    $array = [
        "department_name" => $_POST['department_name'],
        "manager"=> $_POST['manager'],
        "department_description"=> $_POST['department_description'],
        "active"=> $_POST['active'],
    ];
    $adient->insertInTable('department',$array);
    }
    
    // =============== updating Data================
    if($val == "updateData")
    {
        print_r($_POST);
        // echo $mydata;
        $array = [
            "department_name" => $_POST['department_name'],
            "manager" => $_POST['manager'],
            "department_description" => $_POST['department_description'],
            "active" => $_POST['active'],
            
        ];
        //$grocery->insertInTable('users',$array);
        $id = $_POST['department_id'];
        $adient->updateTable('department',$array,'department_id='.$id.'');
    }
    // ========================= Check for delete============================
    if($val == "delete"){
        $id = $_POST['id'];
        $adient->deleterecord('department','department_id='.$id.'');        
    }
    // ============================= Check for update ==========================
    if($val =="update"){
        $id = $_POST['department_id'];
        $table = "department";
        $row = $adient->display_record_by_id($table,$id);
        echo json_encode($row);
    }
}








?>
