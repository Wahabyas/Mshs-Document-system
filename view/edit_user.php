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


$GET_id = intval($_GET['user']);
$file_name = $_GET['user-name'];
$sql = "SELECT * FROM `user` WHERE `user_id`= ? AND `First_name` = ?";
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
                                    <h4 class="card-title">Edit User</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data" action="controllers/edit_user.php" >
                            <div class="" id="message"></div>
                            <input type="hidden" name="user_ids" value="<?= $row['user_id'] ?>">
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <select class="form-control" id="role" name="role" required>
                                                        <option value="<?=$row['role']?>" ><?=$row['role']?></option>
        <?php if($userinfo['role'] == 'Admin' ){ ?>

                                                        <option value="Admin">Admin</option>
      

                                                        <option value="Chairperson">Chairperson</option>
        
                                                       
                                                        <option value="Faculty">Faculty</option>
                                                        <option value="Staff">Staff</option>

                                                        <?php }else{?>
                                                            
                                                            
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" name="Uname" placeholder="Username" value="<?=$row['username']?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Password</label>
                                                    <input type="Password" class="form-control" name="password" placeholder="Password" value="<?=$row['password']?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" name="Fname" placeholder="First name"required value="<?=$row['First_name']?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pl-1">
                                                <div class="form-group">
                                                    <label>Middel name</label>
                                                    <input type="text" class="form-control" name="Mname" placeholder="Middle Name" required value="<?=$row['Middle_name']?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name="Lname" class="form-control" placeholder="Last Name" required value="<?=$row['Last_name']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date">Select Date</label>
                                                    <input type="date" class="form-control" id="date" name="date" required value="<?=$row['DoB']?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pr-1">
                                                <div class="form-group">
                                                    <label for="Status">Strand</label>
                                                    <select class="form-control" id="Strand" name="Strand" required>
                                                        <option value="<?=$row['Strand']?>"><?=$row['Strand']?></option>
        <?php if($userinfo['role'] == 'Admin' ){ ?>

                                                        <option  value="STEM">STEM</option>
                                                        <option value="ABM">ABM</option>
                                                        <option value="HUMMS">HUMMS</option>
                                                        <option  value="TVL-ICT">TVL-ICT</option>
                                                        <option  value="TVL-HE">TVL-HE</option>
                                                        <option  value="SPORTS">SPORTS</option>
                                                        <?php }else{ ?>
                                                            <option  value="<?=$row['Strand']?>"><?=$row['Strand']?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 pr-1">
                                                <div class="form-group">
                                                    <label for="Status">Status</label>
                                                    <select class="form-control" id="Status" name="Status" required>
                                                        <option value="<?=$row['Status']?>"><?=$row['Status']?></option>
                                                        <option  value="Active" style="background-color: yellowgreen;">Active</option>
                                                        <option value="Inactive" style="background-color: red;">Inactive</option>
                                                       
    
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Phone No.</label>
                                                    <input name="phone" type="number" class="form-control" placeholder="Phone No." required value="<?=$row['Phone_No']?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label for="profileImage">Upload Profile Picture</label>
                                                    <input type="file" class="form-control" id="profileImage" name="profileImage" accept="image/*"  value="<?=$row['profile_name']?>">
                                                </div>
                                                <?php if (!empty($row['profile_name'])): ?>
    <img  src="../imageupload/<?=$row['profile_name']?>"width="100" height="100" style="object-fit: cover; border-radius: 50%;margin-left:100px;">
<?php endif; ?>
                                            </div>
                                            

                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label for="profileImage">Upload Background Picture</label>
                                                    <input type="file" class="form-control" id="Background" name="backgroundImage" accept="image/*"  value="<?=$row['Background']?>">
                                                </div>
                                                <?php if (!empty($row['Background'])): ?>
    <img  src="../imageupload/<?=$row['Background']?>"width="100" height="100" style="object-fit: cover; border-radius: 50%;margin-left:100px;">
<?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <textarea rows="4" cols="80" name="aboutMe" class="form-control" placeholder="Here can be your description" required  ><?=$row['About_me']?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="reason-group" style="display: none;">
    <label for="reason">Reason for Inactive</label>
    <input type="text" class="form-control" id="reason" name="Reason" placeholder="Enter reason for inactivation" value='<?=$row['Reason']?>'>
</div>
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
 
    $(".dropdown-item").on("click", function() {
        var selectedText = $(this).html();
        var selectedValue = $(this).data("value");

      
        $("#customDropdown").html(selectedText);
       
        $("#selectedValue").val(selectedValue);
    });

 
    $('form').on('submit', function(e) {
        e.preventDefault(); 

        var role = $("#role").val();
        var username = $('input[name="Uname"]').val();
        var user_id = $('input[name="user_ids"]').val();
        var password = $('input[name="password"]').val();
        var firstName = $('input[name="Fname"]').val();
        var middleName = $('input[name="Mname"]').val();
        var lastName = $('input[name="Lname"]').val();
        var date = $("#date").val();
        var Strand = $('select[name="Strand"]').val();
        var Status = $('select[name="Status"]').val();
        var phone = $('input[name="phone"]').val();
        var profileImage = $('#profileImage')[0].files.length;
        var backgroundImage = $('#Background')[0].files.length;
        var aboutMe = $('textarea[name="aboutMe"]').val();

      
        if (!role || !username || !password || !firstName || !lastName || !date || !phone || !aboutMe || !Strand) {
            $('#message').html('<div class="alert alert-danger">Please fill out all required fields!</div>');
            return;
        }

       
        var formData = new FormData(this); 

        $.ajax({
            url: 'controllers/edit_user.php', 
            method: 'POST',
            data: formData,
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

    // Show/hide reason input based on Status selection
    $('#Status').on('change', function() {
        if ($(this).val() === 'Inactive') {
            $('#reason-group').show();
            $('#reason').attr('required', true);
        } else {
            $('#reason-group').hide();
            $('#reason').val('');
            $('#reason').removeAttr('required');
        }
    });

    // On page load, show reason if status is already Inactive
    $(document).ready(function() {
        if ($('#Status').val() === 'Inactive') {
            $('#reason-group').show();
            $('#reason').attr('required', true);
        }
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