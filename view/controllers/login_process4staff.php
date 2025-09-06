<?php
   
   require_once "../model/class_model.php";

    if (isset($_POST['username']) && isset($_POST['password'])) {
      
        $conn = new class_model();

      
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $status = "Active";
        $role = "Staff";

        
        $get_student = $conn->login($username, $password, $status, $role);

     
        if ($get_student['count'] > 0) {
            session_start();  
            
       
            $_SESSION['user_id'] = $get_student['user_id'];
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo "Error: Username or Password not set.";
    }
?>
