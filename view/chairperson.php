
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
        background-color: #28a745;  
    }

    .inactive {
        background-color: #dc3545; 
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
                 
                $user = $conn->fetch_chairperson();
                
                ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div id="message"></div>
                        <div class="col-md-12">
                        <?php if($userinfo['role'] == 'Admin'  ){ ?>

                        <button onclick="location.href='Add_User.php'" type="submit" class="btn btn-info btn-fill mb-3"><i class="nc-icon nc-simple-add mr-2">    </i>Add User</button>
                        <?php }else{} ?>
                        <div class="row">
    <div class="col-md-5">
        <div class="form-group">
          
            <div class="input-group">
                <input type="text" id="search-folder" class="form-control" placeholder="Search Chairperson...">
                <span class="input-group-text">
                <i class="nc-icon nc-zoom-split" style="font-size: 40px;"></i>

                </span>
            </div>
        </div>
    </div>
</div>
                        <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Chairperson</h4>
                                    <p class="card-category">Table of Chairperson</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover chair">
                                        <thead>
                                            <th>No.</th>
                                            <th>Fullname</th>
                                            <th>role</th>
                                            <th>role</th>
                                            <th>Date of Birth</th>
                                            <th>Phone No.</th>
                                            <th>Status</th>
                                      
                                            <th>Action</th>
                                     
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $count = 1;
                                            foreach($user as $row){ ?>
                                            <tr>
                                                <td><?= $count ?></td>
                                                <td><?php echo $row['First_name'];?> <?php echo $row['Middle_name']; ?> <?php echo $row['Last_name'];   ?></td>
                                                <td><?php echo $row['role'];?> </td>
                                                <td><?php echo $row['Strand'];?> </td>
                                                <td><?php echo $row['DoB'];?> </td>
                                                <td><?php echo $row['Phone_No'];?></td>
                                                <td><?php  if ($row['Status']== "Active"){ ?>
                                                   <span class="actives" >Active</span>
                                                  <?php }elseif($row['Status'] == "Inactive"){ ?>
                                                    <span class="inactive">Inactive</span>
                                                <?php }else{} ?>
                                                </td>
                                                <?php if($userinfo['role'] == 'Admin' || $userinfo['role'] == 'Chairperson' ){
                                                    
                                                    if($_SESSION['user_id'] == $row['user_id'] || $userinfo['role'] == 'Admin' ){
                                                    
                                                    ?>
                                                <td>
                                                    <a href="edit_user.php?user=<?= $row['user_id']; ?>&user-name=<?php echo $row['First_name']; ?>" class=" font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">

                                                <i  class="nc-icon nc-settings-gear-64  " style="font-size: 20px; color: black;"></i>
                                                  </a>
                                                    <?php if($userinfo['role'] == 'Admin'){ ?>
                                                <a href="javascript:;" data-id="<?= $row['user_id']; ?>" class=" font-weight-bold text-xs delete" data-toggle="tooltip" data-original-title="delete user">
                                                <i  class="fa fa-trash  mr-2 " style="font-size: 20px; margin-left: 7px; color:rgb(199, 30, 30);"></i>
                                                  </a>
                                                  <?php } ?>
                                                  
                                                </td>
                                                <?php }else{ ?> <td></td> <?php } ?>
                                                    
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
    
</body>

<script src="js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search-folder').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('table.chair tbody tr').filter(function() {
                // Target the text in the first column or the column that should be searched
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                
            });
        });
    });
</script>
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
