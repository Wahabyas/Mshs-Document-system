
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

            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add User</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data" >
                            <div class="" id="message"></div>
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <select class="form-control" id="role" name="role" required>
                                                        <option value="" disabled selected>Select Role</option>
                                                <?php if($userinfo['role'] == 'Admin'){ ?>
                                                        
                                                        <option value="Admin">Admin</option>
                                                        <?php }else{} ?>

                                                        <option value="Chairperson">Chairperson</option>
                                                        <option value="Faculty">Faculty</option>
                                                        <option value="Staff">Staff</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" name="Uname" placeholder="Username" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Password</label>
                                                    <input type="Password" class="form-control" name="password" placeholder="Password"required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" name="Fname" placeholder="First name"required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 pl-1">
                                                <div class="form-group">
                                                    <label>Middel name</label>
                                                    <input type="text" class="form-control" name="Mname" placeholder="Middle Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name="Lname" class="form-control" placeholder="Last Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date">Select Date</label>
                                                    <input type="date" class="form-control" id="date" name="date" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label for="Status">Strand</label>
                                                    <select class="form-control" id="Strand" name="Strand" required>
                                                        <option disabled selected></option>
                                                <?php if($userinfo['role'] == 'Admin'){ ?>

                                                        <option  value="STEM">STEM</option>
                                                        <option value="ABM">ABM</option>
                                                        <option value="HUMMS">HUMMS</option>
                                                        <option  value="TVL">TVL</option>
                                                        <option  value="SPORTS">SPORTS</option>
                                                        <option  value="Null">Null</option>
                                                        <?php }else{ ?>
                                                            <option  value="<?= $userinfo['Strand'] ?>"><?= $userinfo['Strand'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Phone No.</label>
                                                    <input name="phone" type="number" class="form-control" placeholder="Phone No." required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label for="profileImage">Upload Profile Picture</label>
                                                    <input type="file" class="form-control" id="profileImage" name="profileImage" accept="image/*" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label for="profileImage">Upload Background Picture</label>
                                                    <input type="file" class="form-control" id="Background" name="backgroundImage" accept="image/*" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <textarea rows="4" cols="80" name="aboutMe" class="form-control" placeholder="Here can be your description" required ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
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
    $(".dropdown-item").on("click", function() {
        var selectedText = $(this).html();
        var selectedValue = $(this).data("value");

        // Set the dropdown button text
        $("#customDropdown").html(selectedText);
        // Store the selected value in the hidden input field
        $("#selectedValue").val(selectedValue);
    });

    // Handle form submission
    $('form').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        var role = $("#role").val();
        var username = $('input[name="Uname"]').val();
        var password = $('input[name="password"]').val();
        var firstName = $('input[name="Fname"]').val();
        var middleName = $('input[name="Mname"]').val();
        var lastName = $('input[name="Lname"]').val();
        var date = $("#date").val();
        var Strand = $('select[name="Strand"]').val();
        var phone = $('input[name="phone"]').val();
        var profileImage = $('#profileImage')[0].files.length;
        var backgroundImage = $('#Background')[0].files.length;
        var aboutMe = $('textarea[name="aboutMe"]').val(); // Assuming "About Me" is part of the form

        // Validation check
        if (!role || !username || !password || !firstName || !lastName || !date || !phone || !aboutMe || !Strand) {
            $('#message').html('<div class="alert alert-danger">Please fill out all required fields!</div>');
            return;
        }

        // Proceed with AJAX request
        var formData = new FormData(this); // Sends the entire form data, including files

        $.ajax({
            url: 'controllers/add_user.php', // Change URL to match your backend
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
  
</body>

<script>
$(document).ready(function () {
    $('#role').change(function () {
        let selectedRole = $(this).val();

        if (selectedRole === 'Admin') {
            $('#Strand').html(`
                <option value="Null">Null</option>
            `);
        } else if(selectedRole === 'Chairperson') {
            $('#Strand').html(`
                <option value="TVL">TVL</option>
                 <option value="STEM">STEM</option>
                <option value="ABM">ABM</option>
                <option value="HUMMS">HUMMS</option>
                 <option value="SPORTS">SPORTS</option>
            `);
        }else {
            $('#Strand').html(`
                <option disabled selected></option>
                <option value="STEM">STEM</option>
                <option value="ABM">ABM</option>
                <option value="HUMMS">HUMMS</option>
                <option value="TVL-ICT">TVL-ICT</option>
                <option value="TVL-HE">TVL-HE</option>
                <option value="TVL-AFA">TVL-AFA</option>
                <option value="SPORTS">SPORTS</option>
            `);
        }
    });
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