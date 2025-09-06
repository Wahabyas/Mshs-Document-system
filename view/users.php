
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
<style>
    
    .actives, .inactive {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        color: white;
    }

    .actives {
        background-color: #28a745; /* Green */
    }

    .inactive {
        background-color: #dc3545; /* Red */
    }

 

</style>

</style>
<body>
    <div class="wrapper">
       <?php 
       
       include ('includes/sidebar.php'); ?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php include ('includes/header.php') ?>
                <?php 

                $conn =  new class_model();
                 
                $user = $conn->fetch_users();
                
                ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div id="message"></div>
                        <div class="col-md-12">
                        <?php if($userinfo['role'] == 'Admin' || $userinfo['role'] == 'Chairperson' ){ ?>
                        <button onclick="location.href='Add_User.php'" type="submit" class="btn btn-info btn-fill"><i class="nc-icon nc-simple-add mr-2">    </i>Add User</button>
                        <?php }else{} ?>
                          
                        <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Admin</h4>
                                    <p class="card-category">Table of Admin</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>No.</th>
                                            <th>Fullname</th>
                                            <th>role</th>
                                            <th>Date of Birth</th>
                                            <th>Phone No.</th>
                                            <th>Status</th>
                                        <?php if($userinfo['role'] == 'Admin' ){ ?>
                                            <th>Action</th>
                                            <?php }else{} ?>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $count = 1;
                                            foreach($user as $row){ ?>
                                            <tr>
                                                <td><?= $count ?></td>
                                                <td><?php echo $row['First_name'];?> <?php echo $row['Middle_name']; ?> <?php echo $row['Last_name'];   ?></td>
                                                <td><?php echo $row['role'];?> </td>
                                                <td><?php echo $row['DoB'];?> </td>
                                                <td><?php echo $row['Phone_No'];?></td>

                                                <td><?php  if ($row['Status']== "Active"){ ?>
                                                   <span class="actives" >Active</span>
                                                  <?php }elseif($row['Status'] == "Inactive"){ ?>
                                                    <span class="inactive">Inactive</span>
                                                <?php }else{} ?>
                                                </td>
                                                <?php if($userinfo['role'] == 'Admin'){ ?>
                                                <td>
                                                      <a href="edit_user.php?user=<?= $row['user_id']; ?>&user-name=<?php echo $row['First_name']; ?>" class=" font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">

                                                <i  class="nc-icon nc-settings-gear-64  " style="font-size: 20px; color: black;"></i>
                                                  </a>
                                                <a href="javascript:;" data-id="<?= $row['user_id']; ?>" class=" font-weight-bold text-xs delete" data-toggle="tooltip" data-original-title="delete user">
                                                <i  class="fa fa-trash  mr-2 " style="font-size: 20px; margin-left: 7px; color:rgb(199, 30, 30);"></i>
                                                  </a>
                                                
                                                </td>
                                              <?php }else{} ?>
                                            </tr>
                                            <?php $count++; } ?>
                                        </tbody>
                                    </table>
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
<script src="js/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        load_data();

        var count = 1;

        function load_data() {
            $(document).on('click', '.delete', function() {

                var id = $(this).attr("data-id");
               
                if (confirm("Are you sure want to remove this data?")) {
                    $.ajax({
                        url: 'controllers/delete_user.php',

                        method: "POST",
                        data: {
                            user_id: id
                        },
                      success: function(response) {

                          $("#message").html(response);
                          },
                          error: function(response) {
                            console.log("Failed");
                          }
                    })
                }
            });
        }

    });
</script>
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
