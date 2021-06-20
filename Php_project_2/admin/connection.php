<?php

require 'config.php';
class Adient
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PWD;
    private $db_name = DB_NAME;
    public $url = URL;
    public $cust_url = cust_URL;
    // for connection we use con
    public $con;
    public $login = false;
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
        if (!$this->con) {
            echo "There is some error" . mysqli_connect_error($this->con);
        }
    }
    function insertInTable($table,$data){

        $col = "insert into $table (`".implode("` , `",array_keys($data))."`)";
        $col.= " values('";
        foreach($data as $key => $value) {

            $fields[$key] = mysqli_escape_string($this->con,$value);
        }

        $col.= implode("' , '",array_values($fields))."');";
        $query = mysqli_query($this->con,$col);

        if($query)
        {
            echo 'Form is Submitted Successfully';
        }

    }
    // function insert_category($table,$data)
    // {
    //     $col = "insert into $table (`".implode("` , `",array_keys($data))."`)";
    //     $col.= " values('";
    //     foreach($data as $key => $value) {

    //         $fields[$key] = mysqli_escape_string($this->con,$value);
    //     }

    //     $col.= implode("' , '",array_values($fields))."');";
    //     $query = mysqli_query($this->con,$col);
    //     if($query)
    //     {
    //         header('location:' . $this->url . 'views/category.php?msg1=insert');
    //     }
    //     else {
    //             echo "Sorry There is some error";
    //         }
    // }

    function updateTable($table,$data,$condition)
    {
        $key = array_keys($data);  //get key( column name)
        $value = array_values($data);  //get values (values to be inserted)
        $sql = "update $table set ";

        foreach($data as $key => $value)
            {
                $fields[$key] = " `$key` = '".mysqli_escape_string($this->con,$value)."'";
            }
        $sql .= implode(" , ",array_values($fields))." where ".$condition.";";
        $query = mysqli_query($this->con,$sql);
        // echo $sql;
        // die();
        if($sql){
            //header('location:' . $this->url . 'views/admin.php?msg2=update');
            echo "Your Data is updated Successfully";
         }
        else{
            echo "error".mysqli_error($this->con);
        }

    }
    function SelectTableRecords($query){
        $result = mysqli_query ($this->con,$query);
        $count = 0;
           $data = array();
           while ( $row = mysqli_fetch_array($result)){
               $data[$count] = $row;
            $count++;
           }
           return $data;
    }
    function listData($table,$id){
        $sql = "select * from ".$table." where ".$id.";";
        //echo $sql;
        $result = mysqli_query($this->con, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No records Found";
        }
    }

    public function display_record_by_id($table,$id)
    {
        $sql = "select * from ".$table." where ".$id.";";
        //echo $sql;
        $query = mysqli_query($this->con, $sql);
        $num = mysqli_num_rows($query);
        //echo $num;
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                //print_r($row);
                return $row;
            }
        }
        echo "No Records Found";
    }
    public function display_record_by_email($email)
    {
        $sql = "select * from users where email = '$email'";
        $query = mysqli_query($this->con, $sql);
        $num = mysqli_num_rows($query);
        //echo $num;
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                //print_r($row);
                return $row;
            }
        }
        echo "No Records Found";
    }
    public function display_record_by_visitor($id)
    {
        $sql = "select * from visitors where visitor_id = '$id'";
        $query = mysqli_query($this->con, $sql);
        $num = mysqli_num_rows($query);
        //echo $num;
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                return $row;
            }
        }
        echo "No Records Found";
    }
    public function display_record_by_dep($id)
    {
        $sql = "select * from department where department_id ='$id'";
        $query = mysqli_query($this->con, $sql);
        $num = mysqli_num_rows($query);

        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                return $row;
            }
        }
        echo "No Records Found";
    }
    public function display_record($email)
    {
        $sql = "select * from users where email = '$email'";
        $query = mysqli_query($this->con, $sql);
        $num = mysqli_num_rows($query);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                return $row;
            }
        }
        echo "No Records Found";
    }
    public function deleterecord($table,$condition)
    {
        $sql = "delete from ".$table." where ".$condition.";";
        $query = mysqli_query($this->con, $sql);
        if ($query) {
            //header('location:' . $this->url . 'views/admin.php?msg3=delete');
            echo "The record is deleted Successfully";
        } else {
            echo "Records does not delete try again";
        }
    }
    public function update_status($table,$status,$condition)
    {
        $sql = "update ".$table." set active = ".$status." where ".$condition.";";
        $query = mysqli_query($this->con, $sql);
        if ($sql) {
           // header('location:' . $this->url . 'views/admin.php?msg2=update');
        } else {
            echo "Registration updated failed try again";
        }
    }
    // -----------------------------------------------------------------------------------------------------------------------------------
    function insert_data($post)
    {
        $first_name = mysqli_real_escape_string($this->con, $post['first_name']);
        $last_name = mysqli_real_escape_string($this->con, $post['last_name']);
        $email = mysqli_real_escape_string($this->con, $post['email']);
        $contact_number = mysqli_real_escape_string($this->con, $post['contact_number']);
        $password = mysqli_real_escape_string($this->con, $post['password']);
        $confirm_password = mysqli_real_escape_string($this->con, $post['confirm_password']);
        $department = mysqli_real_escape_string($this->con, $post['department']);
        $designation = mysqli_real_escape_string($this->con, $post['designation']);
        $gender = $post['gender'];
        $active = $post['active'];
        $user_role = $post['user_role'];

        // -------------------------- Check Whether userName is already there or not-------------------------
        $select = "select * from users where email ='$email'";
        $res = mysqli_query($this->con, $select);
        $data = mysqli_num_rows($res);
        if ($data > 0)
        {
            echo "Sorry UserName  already Exist please select other name";
        } else
        {
            // ------------ Check whether password and confirm password matches-------------------
            if ($password === $confirm_password)
             {
                $pass = password_hash($password, PASSWORD_DEFAULT);

                // ------------------- insert the data---------------------------
                $sql = "insert into users(first_name,last_name,email,contact_number,password,department,designation,gender,active,user_role) values('$first_name','$last_name','$email','$contact_number','$password','$department','$designation','$gender','$active','$user_role')";
                // echo $sql;
                // die();
                $query = mysqli_query($this->con, $sql);
                if ($query)
                {
                    echo "Records inserted Successfully";
                } else {
                    echo "Soory your form is not submitted there is some error";
                }
            } else {
                // --------------------- if there is any error it will display it-------------------------
                echo "The confirm password and password doesnt match please try again";
            }
        }
    }
    function SelectTabledata($query){
        $result = mysqli_query ($this->con,$query);
        //$count = 0;
           $data = array();
           while ( $row = mysqli_fetch_array($result)){
               $data[] = $row;
            //$count++;
           }
           return $data;
    }
// -------------------------------------Login--------------------
    public function customer_login($post)
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "select * from users where email = '$email'";
        $query = mysqli_query($this->con, $sql);
        $num = mysqli_num_rows($query);
        if ($num == 1) {
            // ----------------------- used to check from database-----------------------
            while ($row = mysqli_fetch_assoc($query))
            {
                // if (password_verify($password, $row['password'])) {
                    if($password == $row['password'])
                    {
                        if($row["user_role"]== "admin")
                            {   $login = true;
                                session_start();
                                $_SESSION['loggedIn'] = true;
                                $_SESSION['email'] = $row['email'];
                                header('location:' . $this->url . 'views/list_user.php');

                            }
                            else{
                                $login = true;
                                session_start();
                                $_SESSION['loggedIn'] = true;
                                $_SESSION['email'] = $row['email'];
                                echo $_SESSION['email'];
                                header('location:' . $this->url . 'employee/views/home.php');
                            }

                    }
                    else {
                    header('location:' . $this->url . 'views/login.php?msg=Invalid password');
                     }
            }
            // while($row = mysqli_fetch_assoc($query)){
            //     if($row["user_type"]== "admin")
            //     {
            //         $_SESSION['role'] = $row['user_type'];
            //         $_SESSION['email'] = $row['email'];
            //         echo "Admin";
            //         header('location'.$this->url . 'views/list_user.php');

            //     }else{
            //         $_SESSION['role'] = $row['user_type'];
            //         $_SESSION['email'] = $row['email'];
            //         echo "employee";
            //         header('location'.$this->url . 'views/list_user.php');
            //     }
            // }

        } else {
            header('location:' . $this->url . 'views/login.php?msg=Please Enter Valid UserName and Password');
        }
    }
    // ======================================== Visitorlogin==================
    public function visitor_login($post)
    {
        $contact_number = $_POST['contact_number'];
        $password = $_POST['password'];
        $sql = "select * from visitors where contact_number = '$contact_number'";
        $query = mysqli_query($this->con, $sql);
        $num = mysqli_num_rows($query);
        if ($num == 1) {
            // ----------------------- used to check from database-----------------------
            while ($row = mysqli_fetch_assoc($query)) {
                //if (password_verify($password, $row['password'])) {
                    if($password == $row['password'])
                    {
                        $login = true;
                        session_start();
                        $_SESSION['loggedIn'] = true;
                        $_SESSION['first_name'] = $row['first_name'];
                        //header('location:' . $this->cust_url . 'views/index.php?');
                    } else {
                        //header('location:' . $this->cust_url . 'views/login.php?msg=Invalid password');
                        echo "Invalid password";
                    }
            }
        } else {
            //header('location:' . $this->cust_url . 'views/login.php?msg=Please Enter Valid UserName and Password');
            echo "Please Enter UserName and password";
        }
    }
    //------------------------------------------------ Change Password ------------------------------------------------------
    public function changepassword($post)
    {
        $old_password = $post['old_password'];
        $password = $post['password'];
        $email = $_SESSION['email'];
        $sql = "select * from users where email = '$email'";
        $query = mysqli_query($this->con, $sql);
        $num = mysqli_num_rows($query);
       // echo $num;
        if ($num == 1)
        {
                while ($row = mysqli_fetch_assoc($query))
                {

                    // if (password_verify($old_password, $row['password']))
                    if($old_password == $row['password'])
                    {
                       // $pass = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "update users set password = '$password' where email = '$email'";
                        $query = mysqli_query($this->con, $sql);
                        //echo $sql;
                        if ($query)
                        {
                            header('location:' . $this->url . 'views/change_password.php?msg=Password updated successfully');
                        } else
                        {
                            header('location:' . $this->url . 'views/change_password.php?msg=Sorry Password cant be updated successfully');
                        }
                    }
                    else
                    {
                        header('location:' . $this->url . 'views/change_password.php?msg=Sorry Password is invalid');
                    }
                }
        } else {
            echo "Please Enter proper password";
        }
    }

    // function selectData($id){
    //     $query = "select * from department where department_id = '$id'";
    //     $sql = mysqli_query($this->con,$query);
    //     $row = mysqli_fetch_assoc($sql);
    //     return $row;
    // }
    // function selectUserData($id){
    //     $query = "select * from users where user_id = '$id'";
    //     $sql = mysqli_query($this->con,$query);
    //     $row = mysqli_fetch_assoc($sql);
    //     return $row;
    // }
    function selectDataList($table){
        $sql = "select * from '.$table.'";
        $sql = mysqli_query($this->con,$query);
    }

}
