
<?php

require '../../connection.php';
$adient = new adient();

// ------------------ CHeck the action =================================
if(isset($_POST['action']))
{
    // ======================== Assigning action to value========================
   $val = $_POST['action'];
   if($val == "readrecord")
   {
        $value = '<table class="table text-uppercase text-center text-danger">
        <thead class="text-danger">
            <tr>
            <td> Department ID </td>
            <td> Department Name</td>
            <td> Manager</td>
            <td> Status </td>
            </tr>
            </thead> <tbody id="tbody">';
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
            </tr>
            '.$n++.'
            ';
        }

        $value.='</tbody></table>';
        echo $value;
   }
    //============================== USER LIST=========================================
    if($val == "readUserRecord")
    {
        $value = '<table class="table text-uppercase text-center">
        <thead class="text-danger">
            <tr>
                <td> User ID </td>
                <td> FullName</td>
                <td> Email</td>
                <td> Contact </td>
                <td> Department </td>
                <td> Designation </td>
            </tr>
            </thead> <tbody id="tbody">';
            $gro = $adient->SelectTabledata("select * from users");
            foreach ($gro as $c) {
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
                    <td> '.$c['contact_number'].'</td>'.
                    // $gro = $adient->display_record_by_dep($c['department']);
                    // echo $gro['department_name'];
                    '<td> '.$dep.'</td>
                    <td> '.$c['designation'].'</td>
                </tr>';
    }
    $value.='</tbody></table>';
    echo $value;
    }    
}    