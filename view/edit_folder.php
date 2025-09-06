
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
        <title>MSU-MSHS SDRMS</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

     
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
	<script src="js/jquery.min.js"></script>

</head>

<body>
    <div class="wrapper">
    <?php include ('includes/sidebar.php'); ?>

        <div class="main-panel">
            <!-- Navbar -->
            <?php include ('includes/header.php') ?>
            <?php 
             require_once 'model/config/connection2.php'; 

                    
                    $GET_id = intval($_GET['folder']);
                    $folder_name = $_GET['folder-name'];
                    $sql = "SELECT * FROM `folders` WHERE `id`= ? AND `name` = ?";
                    $stmt = $conn->prepare($sql); 
                    $stmt->bind_param("is", $GET_id, $folder_name);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                   ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div id="message"></div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Folder</h4>
                                </div>
                                <div class="card-body">
                                    <form name="folder_form" method="POST">
                                     
                                            <div class="col-md-10 pr-1">
                                                <div class="form-group">
                                                    <label>Folder Name</label>
                                                    <input type="text" name="folder_name" class="form-control" value="<?=$row['name'];?>">
                                                    <input type="hidden" name="folder_id" value="<?= $row['id']; ?>" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Strand</label>
                                                    <input type="text" name="folder_name" class="form-control" value="<?=$row['Strand'];?>" disabled>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label for="customDropdown">Choose an Icon Design</label>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle form-control" type="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="<?php echo $row['icon']; ?>">
                                                            <?php echo 'Option'; echo $row['icon']; ?>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="customDropdown">
                                                            <a class="dropdown-item" href="#" data-value="1">
                                                                <i class="nc-icon nc-email-85"></i> Option 1
                                                            </a>
                                                            <a class="dropdown-item" href="#" data-value="2">
                                                                <i class="nc-icon nc-single-copy-04"></i> Option 2
                                                            </a>
                                                            <a class="dropdown-item" href="#" data-value="3">
                                                                <i class="nc-icon nc-map-big"></i> Option 3
                                                            </a>
                                                            <a class="dropdown-item" href="#" data-value="4">
                                                                <i class="nc-icon nc-layers-3"></i> Option 4
                                                            </a>
                                                            <a class="dropdown-item" href="#" data-value="5">
                                                                <i class="nc-icon nc-badge"></i> Option 5
                                                            </a>
                                                        </div>
            
                                                    </div>
                                                    <input type="hidden" name="myDropdown" id="selectedValue" value="<?php echo $row['icon']; ?>">
                                                </div>
                                            </div>
                        
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Update Folder info</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php include ('includes/footer.php') ?>

            <script>
                  // Dropdown item selection
    $(".dropdown-item").on("click", function() {
        var selectedText = $(this).html();
        var selectedValue = $(this).data("value");

        // Set the dropdown button text
        $("#customDropdown").html(selectedText);
        // Store the selected value in the hidden input field
        $("#selectedValue").val(selectedValue);
    });

    $(document).ready(function() {
   $('form[name="folder_form"]').on('submit', function(e){
      e.preventDefault();

      var a = $(this).find('input[name="folder_name"]').val();
      var b = $(this).find('input[name="myDropdown"]').val();
      const c = document.querySelector('input[name=folder_id]').value;

   

     if (a === '' &&  b ===''){
          $('#message').html('<div class="alert alert-danger"> Required All Fields!</div>');
        }else{
        $.ajax({
            url: 'controllers/edit_folder.php',
            method: 'post',
            data: {
              Folder_name: a,
              icons: b,
              folder_id:c

            },
            success: function(response) {

              $("#message").html(response);
              },
              error: function(response) {
                console.log("Failed");
              }
          });
        }
     });
    });
            </script>

        </div>
    </div>
    
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
