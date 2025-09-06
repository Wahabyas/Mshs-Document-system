<div class="sidebar" data-color="red" data-image="../assets/img/MSHS.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->

    <?php  
    session_start();
    require 'model/class_model.php';

    if(!$_SESSION['user_id']){
        unset($_SESSION['user_id']); 
        session_unset(); 
        session_destroy();
        header('Location: ./login.php');
        exit();
    }
    ?>


<?php

$conn = new class_model();
$user_id = $_SESSION['user_id'];
$userinfo= $conn->user_account($user_id);


?>
            <div class="sidebar-wrapper">
                <div  class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                    MSU-MSHS SDRMS  
                    </a>
<?php 
 $current_page = basename($_SERVER['PHP_SELF']);
 ?>

                </div>
                <img src="mshsimage/MSHS3.png" style="height: 150px;width:170px;margin-left:40px;margin-top:15px;" alt="School Logo">
                <ul class="nav">
                    <li class="nav-item <?php echo $sidebar_class = ($current_page == 'dashboard.php') ? "active" : " "; ?>">
                        <a class="nav-link" href="dashboard.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $sidebar_class = ($current_page == 'folders.php') ? "active" : " "; ?>">
                        <a class="nav-link" href="./folders.php">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <p>Documents</p>
                        </a>
                    </li>
                    
                    <?php if($userinfo['role'] == 'Admin'){ ?>
                        <li class="nav-item <?php echo $sidebar_class = ($current_page == 'users.php') ? "active" : " "; ?>">
                        <a class="nav-link" href="./users.php">
                            <i class="nc-icon nc-credit-card"></i>
                            <p>Table of Admin</p>
                        </a>
                    </li>
                    <?php }else{} ?>

                    <li class="nav-item <?php echo $sidebar_class = ($current_page == 'chairperson.php') ? "active" : " "; ?>" >
                        <a class="nav-link" href="./chairperson.php">
                            <i class="nc-icon nc-credit-card"></i>
                            <p>Table of Chair</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $sidebar_class = ($current_page == 'faculty.php') ? "active" : " "; ?>" >
                        <a class="nav-link" href="./faculty.php">
                            <i class="nc-icon nc-credit-card"></i>
                            <p>Table of Faculty</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $sidebar_class = ($current_page == 'staff.php') ? "active" : " "; ?>">
                        <a class="nav-link" href="./staff.php">
                            <i class="nc-icon nc-credit-card"></i>
                            <p>Table of Staff</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $sidebar_class = ($current_page == 'user_profile.php') ? "active" : " "; ?>">
                        <a class="nav-link" href="./user_profile.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li hidden >
                        <a class="nav-link" href="./table.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Table List</p>
                        </a>
                    </li>
                    <li hidden  >
                        <a class="nav-link" href="./typography.php">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Typography</p>
                        </a>
                    </li>
                    <li hidden >
                        <a class="nav-link" href="./icons.php">
                            <i class="nc-icon nc-atom"></i>
                            <p>Icons</p>
                        </a>
                    </li>
                    <li hidden >
                        <a class="nav-link" href="./maps.php">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>Maps</p>
                        </a>
                    </li>
                    <li hidden >
                        <a class="nav-link" href="./notifications.php">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>