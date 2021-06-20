
<?php

require '../connection.php';
$adient = new adient();

// ------------------ CHeck the action =================================
if(isset($_POST['action']))
{
    // ======================== Assigning action to value========================
    $val = $_POST['action'];
   
    // ==================== Check action is delete==========================
    if($val == "delete")
    {
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
            $adient->deleterecord('users','user_id='.$id.''); 
        }             
    }
    // ============= Check action is readrecord========================
    if($val == "readrecord")
    {
        $value = '<table class="table text-danger text-center text-uppercase">
        <thead class="text-danger">
            <tr>
                <td> User ID </td>
                <td> FullName</td>
                <td> Email</td>
                <td> Contact </td>
                <td> Department </td>
                <td> Designation </td>
                <td> UserRole </td>
                <td> Edit </td>
                <td> Delete </td>
            </tr>
            </thead> <tbody id="tbody" class="text-dark">';
            $gro = $adient->SelectTabledata("select * from users");
            foreach ($gro as $c) 
            {
                $id = $c['department'];
                $dep = $adient->SelectTabledata('select * from department where department_id = '.$id.'');
                foreach ($dep as $g) {
                    $dep = $g['department_name'];
                }
                $value.= ' 
            
                <tr>
                    <td> '.$c['user_id'].' </td>
                    <td> '.$c['first_name'].' '.$c['last_name'].' </td>
                    <td> '.$c['email'].' </td>
                    <td> '.$c['contact_number'].'</td>  
                    <td>'.$dep.'</td>
                    <td> '.$c['designation'].'</td>
                    <td> '.$c['user_role'].'</td>
                    <td><button class="btn btn-warning btn-edit" onclick="UpdateUser('.$c['user_id'].')" data-toggle="modal" data-target="#update_modal"><i class="fas fa-edit"></i>EDIT</button></td>
                    <td><button class="btn btn-danger btn-delete" onclick="DeleteUser('.$c['user_id'].')">DELETE</button><td>
                </tr>';
    }
    $value.='</tbody></table>';
    echo $value;
    }
     // =========Check whether action is update=======================
     if($val == "update")
     {

         if(isset($_POST['user_id']))
         {
         $id = $_POST['user_id'];
         $table = "users";
         $row = $adient->display_record_by_id($table,$id);
         print_r($row);
         echo json_encode($row);
         }      
     }
    // ================================= check whether it is insert=========================
    if($val =="insert")
    { 
        // $data = stripslashes(file_get_contents("php://input"));
        // $mydata = json_decode($data,true);
        $adient->insert_data($_POST);
    }

    // =============================== Updating The user Data =======================
    if($val == "updateData")
    {
        // echo $mydata;
        $array = [
            "first_name" => $_POST['first_name'],
            "last_name" => $_POST['last_name'],
            "email" => $_POST['email'],
            "contact_number" => $_POST['contact_number'],
            "department" => $_POST['department'],
            "designation" => $_POST['designation'],
            "gender" => $_POST['gender'],
            "active" => $_POST['active'],
        
        ];
        //$grocery->insertInTable('users',$array);
        $id = $_POST['user_id'];
        $adient->updateTable('users',$array,'user_id='.$id.'');
     }
}

?>
