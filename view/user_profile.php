
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>MSU-MSHS SDRMS</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
    <?php include ('includes/sidebar.php'); ?>

        <div class="main-panel">
            <!-- Navbar -->
            <?php include ('includes/header.php') ?>

            <?php $conn = new class_model();
            $user_id = $_SESSION['user_id'];
            $userinfo = $conn->user_account($user_id);
          
            ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">User Profile</h4>
                                </div>
                                <div class="card-body">
                                    <form>
                                      
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Role (disabled)</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Role" value="<?php echo $userinfo['role']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" placeholder="Username" value="<?php echo $userinfo['username']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label for="Status">Status</label>
                                                    <select class="form-control" id="Status" name="Status" disabled>
                                                        <option value="<?=$userinfo['Status']?>" disabled ><?php echo $userinfo['Status'] ?> </option>
                                                        <option style="background-color: greenyellow;" value="Active">Active</option>
                                                        <option style="background-color: red;" value="">Inactive</option>
    
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" name="Fname" placeholder="Company" value="<?=$userinfo['First_name']?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-3 pl-1">
                                                <div class="form-group">
                                                    <label>Middle Name</label>
                                                    <input type="text" class="form-control" name="Mname" placeholder="Middel Name" value="<?=$userinfo['Middle_name']?>" disabled>
                                                </div>
                                            </div>  
                                        
                                        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" name="Lname" placeholder="Last name" value="<?=$userinfo['Last_name']?>" disabled>
                                                </div>
                                            </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Phone No.</label>
                                                    <input type="number" class="form-control" placeholder="City" value="<?= $userinfo['Phone_No']; ?>" disabled>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="date">Date of birth</label>
                                                    <input type="date" class="form-control" id="date" name="date" value="<?= $userinfo['DoB']; ?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label for="Status">Strand</label>
                                                    <select class="form-control" id="Status" name="Status" disabled>
                                                        <option disabled selected><?php echo $userinfo['Strand'] ?></option>
                                                        <option  value="Active">STEM</option>
                                                        <option value="ABM">ABM</option>
                                                        <option value="HUMMS">HUMMS</option>
                                                        <option  value="TVL-ICT">TVL-ICT</option>
                                                        <option  value="TVL-HE">TVL-HE</option>
                                                        <option  value="SPORTS">SPORTS</option>
    
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                  
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="<?= $userinfo['About_me']; ?>" disabled><?= $userinfo['About_me']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                      
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-user">
                                <div class="card-image">
                                <img src="/MSHS-DOCUMENT SYSTEM/imageupload/<?=$userinfo['Background'];?>" alt="...">

                                </div>
                                <div class="card-body">
                                    <div class="author">
                                        <a href="#">
                                            <img class="avatar border-gray" src="/MSHS-DOCUMENT SYSTEM/imageupload/<?=$userinfo['profile_name'];?>" style="object-fit: cover;" alt="...">
                                            <h5 class="title"><?=$userinfo['First_name']?> <?=$userinfo['Middle_name']?> <?=$userinfo['Last_name']?></h5>
                                        </a>
                                        <p class="description">
                                            <?=$userinfo['username']?>
                                        </p>
                                    </div>
                                    <p class="description text-center">
                                        <?= $userinfo['About_me'] ?>
                                    </p>
                                </div>
                                <hr>
                                <div class="button-container mr-auto ml-auto">
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-facebook-square"></i>
                                    </button>
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-twitter"></i>
                                    </button>
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-google-plus-square"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include ('includes/footer.php') ?>

        </div>
    </div>
    <!--   -->
    <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
			<li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="..//assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                </div>
            </li>

            <li class="header-title pro-title text-center">Want more components?</li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                </div>
            </li>

            <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

            <li class="button-container">
				<button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
            </li>
        </ul>
    </div>
</div>
 -->
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

</html>
