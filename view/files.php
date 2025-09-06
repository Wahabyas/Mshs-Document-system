
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>MSHS-SDRMS</title>
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

            <!-- End Navbar -->
            <?php 

require_once 'model/config/connection2.php'; 


$folder_id = intval($_GET['file']);
$file_name = $_GET['file-name'];
$file_strand = $_GET['file-strand'];
$count = 1;
$conn = new class_model();
 $file=$conn->get_files_by_folder($folder_id);

?>
<input name="user_id" type="text" value="<?php echo $_SESSION['user_id'] ?>" hidden >
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                        <button onclick="location.href='Add_files.php?file=<?= $folder_id; ?>&file-name=<?php $file_name; ?>&file-strand=<?php echo $file_strand; ?>'"  type="submit" class="btn btn-info btn-fill mb-3"><i class="nc-icon nc-simple-add mr-2">    </i>Add File</button>
                        <div class="row">
    <div class="col-md-5">
        <div class="form-group">
        
            <div class="input-group">
                <input type="text" id="search-folder" class="form-control" placeholder="Search Documents...">
                <span class="input-group-text">
                <i class="nc-icon nc-zoom-split" style="font-size: 40px;"></i>

                </span>
            </div>
        </div>
    </div>
</div>
                            <div class="card strpied-tabled-with-hover">
                                <div id="message"></div>
                                <div class="card-header ">
                                    <h4 class="card-title">FILES OF <strong><?= $file_name ?></strong> FOLDER</h4>
                                    <p class="card-category"></p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table  class="table table-hover table-striped folder-name">
                                        <thead>
                                            <th>No.</th>
                                            <th>Name of file</th>
                                       
                                            <th>Date of Upload</th>
                                            <th>size</th>
                                            <th>Form</th>
                                            <th>role</th>
                                            <th>Sender</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                        <?php if ($file){
    foreach($file as $row){
?>
<tr>
    <td><?= $count++; ?></td>
    <td><?= $row['file_name']; ?></td>
    
    <td><?= $row['upload']; ?></td>
    <td><?= $row['size']; ?></td>
    <td><?= $row['Form']; ?></td>
    <td><?= $row['role']; ?></td>
    <td><?= $row['First_name']; ?> <?= $row['Middle_name']; ?>. <?= $row['Last_name']; ?></td>
  

    
    <td>
        <a href="controllers/download_file.php?file=<?= urlencode($row['file']) ?>" title="Download">
            <i class="nc-icon nc-cloud-download-93" style="font-size: 20px;"></i>
        </a>
        <a href="controllers/view_file.php?file=<?= urlencode($row['file']) ?>" target="_blank" title="View/Print">
    <i class="fa fa-eye text-primary ml-2" style="font-size: 20px;"></i>
</a>
        <?php if($userinfo['role'] == 'Admin' || $userinfo['role'] == 'Chairperson' || $userinfo['role'] == 'Staff'  ){ ?>
        
        
        
          

        <a href="edit_file.php?file=<?= $row['file_id']; ?>&file-name=<?php echo $row['file_name']; ?>" class="font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
            <i class="nc-icon nc-settings-gear-64 ml-2" style="font-size: 20px;"></i>
        </a>
        <?php }else{} ?>
        <?php if($_SESSION['user_id'] == $row['sender']){ ?>
        <a href="javascript:;" data-id="<?= $row['file_id']; ?>" class="text-secondary font-weight-bold text-xs realdelete" data-toggle="tooltip" data-original-title="delete user">
            <i class="fa fa-trash text-danger ml-2" style="font-size: 20px;"></i>
    </a>
    <?php }elseif($_SESSION['user_id'] != $row['sender']){ ?>
    <a href="javascript:;" data-id="<?= $row['file_id']; ?>" class="text-secondary font-weight-bold text-xs delete" data-toggle="tooltip" data-original-title="delete user">
            <i class="fa fa-trash text-danger ml-2" style="font-size: 20px;"></i>
    </a>
    <?php } ?>
        </a>
    </td>
</tr>
<?php
    }
} else { ?>

    <td  >No data</td>
    <td  >No data</td>
    <td  >No data</td>
    <td  >No data</td>
    <td  >No data</td>
    <td  >No data</td>
    <td  >No data</td>
    <td  >No data</td>
 

  
    


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
   
 <script src="js/jquery.min.js"></script>

<script>
$(document).ready(function() {

    load_data();

    var count = 1;

    function load_data() {
        $(document).on('click', '.delete', function() {

            var id = $(this).attr("data-id");
            var user_id = $('input[name="user_id"]').val();
           
            if (confirm("Are you sure want to remove this data?")) {
                $.ajax({
                    url: 'controllers/delete_file1.php',

                    method: "POST",
                    data: {
                        file_id: id,
                        user_idx: user_id,
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
$(document).ready(function() {

    load_data();

    var count = 1;

    function load_data() {
        $(document).on('click', '.realdelete', function() {

            var id = $(this).attr("data-id");
            var user_id = $('input[name="user_id"]').val();
           
            if (confirm("Are you sure want to remove this data?")) {
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
<script>
    $(document).ready(function() {
        $('#search-folder').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('table.folder-name tbody tr').filter(function() {
                // Target the text in the first column or the column that should be searched
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
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
