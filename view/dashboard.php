
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
        #chartPreferences {
            width: 100%;
            height: 300px;
        }
    </style>
   






<body>
    <div class="wrapper">
     <?php 
   
     include ("includes/sidebar.php"); ?>
        <div class="main-panel">
            <!-- Navbar -->
           <?php include ('includes/header.php') ?>
           <?php $conn = new class_model();
          $user_id=  $_SESSION['user_id'];
           $fetchdelete = $conn->get_files_by_id($user_id);
            ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-6">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Graph for files</h4>
                                    <p class="card-category">All Files </p>
                                </div>
                                <div class="card-body ">
                                    <div id="chartActivity" class="ct-chart"></div>
                                </div>
                                <div class="card-footer ">
                                  
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Data information certified
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">User Statistic<?php
                                    
   
                                    
                                     ?></h4>
                                    <p class="card-category">Pie Chart of all users</p>
                                </div>
                                <div class="card-body ">
                                    <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                                    <div class="legend">
                                        <?php if($userinfo['role'] == 'Admin'){ ?>
                                        <i class="fa fa-circle text-info"></i> Admin
                                        <i class="fa fa-circle text-danger"></i> Chairperson
                                        <i class="fa fa-circle text-warning"></i> Faculty
                                        <i class="fa fa-circle " style="color: violet;"></i> Staff
                                            <?php }else{ ?>
                                                <i  class="fa fa-circle text-info"></i> Chairperson
                                        <i class="fa fa-circle text-danger"></i> Faculty
                                        <i class="fa fa-circle text-warning"></i> Staff
                                    
                                        <?php } ?>
                                    </div>
                                    <hr>
                              
                                </div>
                            </div>
                        </div>
                     
<!-- lalalal -->

<!-- lalala -->
                    </div>
                   
                </div>
                
                <div class="row justify-content-end">
            <div class="col-md-6">
                            <div class="card  card-tasks">
                                <div class="card-header ">
                                    <h4 class="card-title">Delete Request</h4>
                                    <p class="card-category" style="color:red">Note: If you Agree, File will be deleted Permanently</p>
                                    <div id="message"></div>
                               
                                </div>
                                <div class="card-body ">
                                    <div class="table-full-width">
                                        <table class="table">
                                            <tbody>
                                    <?php 
                                    if($fetchdelete){
                                    foreach($fetchdelete as $row){ ?>
                                        <tr>
                                                    <td>
                                                      
                                                    </td>
                                                    <td>Your file <strong>"<?=$row['file_name']?>"</strong> Under the Folder <strong>"<?= $row['folder_name']; ?>"</strong> That was sent <strong>"<?=$row['upload']?>"</strong> Wanted to be deleted by <strong>"<?=$row['First_name']?> <?=$row['Middle_name']?> <?=$row['Last_name']?>"</strong>   Do you confirm this action?"</td>
                                                    <td class="td-actions text-right">
                                                    <a href="javascript:;" data-id="<?= $row['file_id']; ?>" class="btn btn-info btn-simple btn-link Agree" title="Approve request">
                                                            <i class="fa fa-check"></i>
                                                            </a>
                                                        <a href="javascript:;" data-id="<?= $row['file_id']; ?>" class="btn btn-danger btn-simple btn-link delete" title="Remove request">

                                                            <i class="fa fa-times"></i>
                                    </a>
                                                    </td>
                                                </tr>
                                                <?php } 
                                    }else{
                                                ?>
                                              
                                                <tr>
                                                    <td>
                                                    
                                                    </td>
                                                    <td > <strong>No Delete request for a moment</strong>
                                                    </td>
                                                    <td class="td-actions text-right">
                                                    
                                                    </td>
                                                </tr>
                                            
                                              <?php } ?>
                                          
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
   
    <div class="dropdown show-dropdown">
      

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

    <script src="js/jquery.min.js"></script>

<script>
$(document).ready(function() {

    load_data();

    var count = 1;

    function load_data() {
        $(document).on('click', '.delete', function() {

            var id = $(this).attr("data-id");
           
            if (confirm("Are you sure want to remove this Request?")) {
                $.ajax({
                    url: 'controllers/remove.php',
                    method: "POST",
                    data: {
                        file_id: id
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

<script>
$(document).ready(function(){
    $.ajax({
        url: 'controllers/get_data1.php',
        method: 'GET',
        success: function(response) {
            new Chartist.Bar('#chartActivity', {
                labels: response.labels,
                series: response.series
            }, {
                height: "245px",
                axisY: {
                    onlyInteger: true,
                    offset: 20
                }
            });
        },
        error: function(err) {
            console.error("Chart data fetch failed:", err);
        }
    });
});
</script>
<script>
 $(document).ready(function() {
    $.getJSON('controllers/get_data.php', function(data) {
        if (data.labels && data.series && data.labels.length === data.series.length) {
           
            const combinedLabels = data.labels.map((label, index) => {
                return `${label} (${data.series[index]})`;
            });

            new Chartist.Pie('#chartPreferences', {
                labels: combinedLabels,
                series: data.series
            });
        } else {
            console.error('Invalid data format:', data);
        }
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error("AJAX error:", textStatus, errorThrown);
    });
});

</script>
<script>
$(document).ready(function() {

    load_data();

    var count = 1;

    function load_data() {
        $(document).on('click', '.Agree', function() {

            var id = $(this).attr("data-id");
           
            if (confirm("Are you sure want to Approve this Action?")) {
                $.ajax({
                    url: 'controllers/agree.php',

                    method: "POST",
                    data: {
                        file_id: id
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
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

      

    });
</script>


<!-- Scripts at the bottom for better performance -->

</html>
