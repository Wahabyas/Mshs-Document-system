

<?php 
$current_page = basename($_SERVER['PHP_SELF']);

?>
<nav class="navbar navbar-expand-lg " color-on-scroll="500">



<?php 





?>
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> <?php 
                    if($current_page =="dashboard.php"){
                        echo "Dashboard";
                    }elseif($current_page =="files.php"){
                        echo "Files";

                    }elseif($current_page == "folders.php"){
                        echo "Folders";
                    }elseif($current_page == "add_folder.php"){
                        echo "Add Folder";
                    }elseif($current_page == "users.php"){
                        echo "User Table";
                    }elseif($current_page == "Add_User.php"){
                        echo "Add User";
                    }elseif($current_page == "user_profile.php"){
                        echo "User Profile";
                    }elseif($current_page == "edit_file.php"){
                        echo "Edit File";
                    }elseif($current_page == "edit_user.php"){
                        echo "Edit User";
                    }else{
                        
                    }
                    ?> <?php 
                    ?> </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                
                                  
                                 
                                
                            </li>
                            <li class="dropdown nav-item" hidden>
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                    <span class="notification">5</span>
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notification 1</a>
                                    <a class="dropdown-item" href="#">Notification 2</a>
                                    <a class="dropdown-item" href="#">Notification 3</a>
                                    <a class="dropdown-item" href="#">Notification 4</a>
                                    <a class="dropdown-item" href="#">Another ygug notification</a>
                                </ul>
                            </li>
                            <li class="nav-item">
                               
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                                <a class="nav-link" href="">
                                    <span class="no-icon"><?= $userinfo['role'] ?> (<?php if($userinfo['Strand']){ echo $userinfo['Strand'];}else{ echo "Null";} ?>)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="user_profile.php">
                                    <span class="no-icon">Account</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown" hidden>
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Dropdown</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="includes/logout.php">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>