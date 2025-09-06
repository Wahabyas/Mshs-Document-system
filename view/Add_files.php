
<!DOCTYPE html>
<html lang="en">
<Style>
  

</Style>
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
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

  

             
            $GET_id = intval($_GET['file']);
$file_name = $_GET['file-name'];
$file_strand = $_GET['file-strand'];
 
            ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Files</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data" >
                            <div class="" id="message"></div>
                                        <div class="row">
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>File name</label>
                                                    <input type="text" class="form-control" name="Fname" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Strand</label>
                                                    <input type="text" class="form-control" name="strand" placeholder="" value="<?= $file_strand ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label for="file">Upload File here</label>
                                                    <input type="file" class="form-control" id="file" name="file" accept="file/*" required>
                                                </div>
                                            </div>
                                        </div>
                                  
                                      
                                      <input hidden type="number" name="user_id" value="<?=$_SESSION['user_id'];?>" >
                                          
                                      <input hidden type="number" name="folder_id" value="<?=$GET_id;?>" >
                                         
                                       
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
       
     

    // Handle form submission
    $('form').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

      
        var Fname = $('input[name="Fname"]').val();
        var file = $('input[name="file"]').val();
        var strand = $('input[name="strand"]').val();
        var user_id = $('input[name="user_id"]').val();
        var folder_id = $('input[name="folder_id"]').val();

     

        // Validation check
        if (!Fname || !file || !user_id || !folder_id) {
            $('#message').html('<div class="alert alert-danger">Please fill out all required fields!</div>');
            return;
        }

       
        var formData = new FormData(this);

        $.ajax({
            url: 'controllers/add_file.php', 
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

</html>