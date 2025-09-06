
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
        <?php include('includes/sidebar.php'); ?>

        <div class="main-panel">
            <!-- Navbar -->
            <?php include('includes/header.php') ?>
<?php 
             require_once 'model/config/connection2.php'; 


$GET_id = intval($_GET['file']);
$file_name = $_GET['file-name'];
$sql = "SELECT * FROM `file` WHERE `file_id`= ? AND `file_name` = ?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("is", $GET_id, $file_name);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {

?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit File</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data" >
                            <div class="" id="message"></div>
                                        <div class="row">
                                         

                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>File Name</label>
                                                    <input type="text" class="form-control" name="Filename" placeholder="Username" required value="<?= $row['file_name'] ?>">
                                                </div>
                                            </div>
                                          
                                        </div>
                                     <input type="text" name="fileid"  value="<?= $row['file_id'] ?>"  hidden>
                                   
                                   
                                     
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('includes/footer.php') ?>

        </div>
    </div>
 <script src="js/jquery.min.js"></script>

 <script type="text/javascript">
       
       $(document).ready(function() {
    // Dropdown item selection
 

    // Handle form submission
    $('form').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

       
        var username = $('input[name="Filename"]').val();
        var fileid = $('input[name="fileid"]').val();
    

        // Validation check
        if (!username) {
            $('#message').html('<div class="alert alert-danger">Please fill out all required fields!</div>');
            return;
        }

        // Proceed with AJAX request
        var formData = new FormData(this); // Sends the entire form data, including files

        $.ajax({
            url: 'controllers/edit_file.php', // Change URL to match your backend
            method: 'POST',
            data: formData, // Send form data
            contentType: false,
            processData: false,
            success: function(response) {
                $("#message").html('<div class="alert alert-success">' + response + '</div>');
            },
            error: function(xhr, status, error) {
                console.log("Submission failed: " + error);
                $('#message').html('<div class="alert alert-danger">Submission failed. Please try again.</div>');
            }
        });
    });
});


   </script>
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