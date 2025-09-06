<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    
  
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
<script src="css/bootstrap.bundle.min.js"></script>

<body>
    <div class="wrapper">
       <?php include ('includes/sidebar.php') ?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php include ('includes/header.php') ?>

            <?php  require_once 'model/class_model.php'; 
            $conn =  new class_model();
            $folder = $conn->fetch_Folder();
            ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                <div id="message"></div>
                                    <h4 class="card-title">Folder Documents</h4>
                                    <p class="card-category">You can add different design folder
                
                                    </p>
                                </div>
                               
                                <div class="card-body all-icons">
                        <?php if($userinfo['role'] == 'Admin' || $userinfo['role'] == 'Chairperson' || $userinfo['role'] == 'Staff' ){ ?>
                                    
                                <button onclick="location.href='add_folder.php'" type="submit" class="btn btn-info btn-fill"><i class="nc-icon nc-simple-add">    </i>Add folder</button>
                                    
                        <?php }else{} ?>
                     <div class="row">
    <div class="col-md-5">
        <div class="form-group">
            <label for="search-folder">Search Folder</label>
            <div class="input-group">
                
                <input type="text" id="search-folder" class="form-control" placeholder="Search folders...">
                <span class="input-group-text">
                <i class="nc-icon nc-zoom-split" style="font-size: 40px;"></i>
                </span>
            </div>
        </div>
              <div class="input-group">
                <select type="text" id="search-folderdd" class="form-control" placeholder="Search folders...">
                  <center>  <option value="ALL">ALL</option>
                    <option value="HUMMS">HUMMS</option>
                    <option value="STEM">STEM</option>
                    <option value="ABM">ABM</option>
                    <option value="TVL-ICT">ICT</option>
                    <option value="TVL-HE">HE</option>
                    <option value="SPORTS">SPORTS</option>
                    <option value="TVL-HUMMS">HUMMS</option>
                    <option value="TVL">TVL</option> </center>
                 </select>
                 </div>
                <span class="input-group-text">
                

                </span>
                
            </div>
     
   
</div>

                        <div class="row">
                                    <?php if($userinfo['role'] == 'Admin' ){ ?>
                                    
                                        <?php foreach($folder as $row){ ?>
                                        <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6 " >
                                            <div class="font-icon-detail">
                                                <i class="<?php if($row['icon']== '1'){
                                                    echo 'nc-icon nc-email-85';
                                                }else if($row['icon']== '2'){
                                                    echo 'nc-icon nc-single-copy-04';
                                                }else if($row['icon']== '3'){
                                                    echo 'nc-icon nc-map-big';
                                                }else if($row['icon']== '4'){
                                                    echo 'nc-icon nc-layers-3';
                                                }else if($row['icon']== '5'){
                                                    echo 'nc-icon nc-badge';
                                                }else{
                                                } ?>"></i>
                                               
                                               
                                                <a href="files.php?file=<?= $row['id']; ?>&file-name=<?= $row['name']; ?>&file-strand=<?= $row['Strand']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="View Files">
    <p class="folder-name" style="color: black; text-decoration: underline;">
        <?= $row['name']; ?>
    </p>
</a>
<div class="border rounded  mb-3 bg-light mt-2 pt-2">
    <div class="mb-1" style='font-size: 12px;'>
        <span class="font-weight-bold">Created By:</span>
        <span><?= htmlspecialchars($row['First_name'] . ' ' . $row['Middle_name'] . ' ' . $row['Last_name']); ?></span>
    </div>
    <div  style='font-size: 12px;'>
        <span class="font-weight-bold">Date Created:</span>
        <span><?= htmlspecialchars($row['Date_created']); ?></span>
    </div>
     <div  style='font-size: 12px;'>
        <span class="font-weight-bold">Strand:</span>
        <span><?= htmlspecialchars($row['Strand']); ?></span>
    </div>
</div>
<a href="javascript:;" data-id="<?= $row['id']; ?>" class="text-secondary font-weight-bold text-xs delete" data-toggle="tooltip" data-original-title="Delete Folder">
    <i class="fa fa-trash mt-2 mr-2" style="font-size: 22px; color: red;"></i>
</a>
<a href="edit_folder.php?folder=<?= $row['id']; ?>&folder-name=<?= $row['name']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Folder">
    <i class="nc-icon nc-settings-gear-64 mt-2 ml-4" style="font-size: 19px; color: black;"></i>
</a>
                                            </div>
                                        </div>
                                     <?php } ?>
                                      
                                     <?php }elseif($userinfo['role'] == 'Chairperson' && $userinfo['Strand'] == 'TVL'  ){ ?> 
                                        <?php foreach($folder as $row){ ?>
                                            <?php if( $row['Strand'] == 'TVL-ICT' || $row['Strand'] == 'TVL-HE' || $row['Strand'] == 'TVL-AFA' || $row['Strand'] == 'ALL'){ ?>
                                        <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                            <div class="font-icon-detail">
                                                <i class="<?php if($row['icon']== '1'){
                                                    echo 'nc-icon nc-email-85';
                                                }else if($row['icon']== '2'){
                                                    echo 'nc-icon nc-single-copy-04';
                                                }else if($row['icon']== '3'){
                                                    echo 'nc-icon nc-map-big';
                                                }else if($row['icon']== '4'){
                                                    echo 'nc-icon nc-layers-3';
                                                }else if($row['icon']== '5'){
                                                    echo 'nc-icon nc-badge';
                                                }else{
                                                } ?>"></i>
                                               
                                               
                                                <a href="files.php?file=<?= $row['id']; ?>&file-name=<?= $row['name']; ?>&file-strand=<?= $row['Strand']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="View Files">
    <p class="folder-name" style="color: black; text-decoration: underline;">
        <?= $row['name']; ?>
    </p>
</a>
<div class="border rounded  mb-3 bg-light mt-2 pt-2">
    <div class="mb-1" style='font-size: 12px;'>
        <span class="font-weight-bold">Created By:</span>
        <span><?= htmlspecialchars($row['First_name'] . ' ' . $row['Middle_name'] . ' ' . $row['Last_name']); ?></span>
    </div>
    <div  style='font-size: 12px;'>
        <span class="font-weight-bold">Date Created:</span>
        <span><?= htmlspecialchars($row['Date_created']); ?></span>
    </div>
       <div  style='font-size: 12px;'>
        <span class="font-weight-bold">Strand:</span>
        <span><?= htmlspecialchars($row['Strand']); ?></span>
    </div>
</div>
 <?php if($row['user_id'] == $user_id){ ?>
                                                <a href="javascript:;" data-id="<?= $row['id']; ?>" class="text-secondary font-weight-bold text-xs delete" data-toggle="tooltip" data-original-title="delete user">
                                                <i  class="fa fa-trash mt-1 mr-2 " style="font-size: 20px; color: red;"></i>
                                                        </a>
                                                        <a href="edit_folder.php?folder=<?= $row['id']; ?>&folder-name=<?= $row['name']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                        <i  class="nc-icon nc-settings-gear-64 mt-2 ml-4 " style="font-size: 20px; color: black;"></i>
                                            </a>
                                               <?php }else{

                                               } ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php }elseif($userinfo['role'] == 'Chairperson'   ){ ?> 
                                        <?php foreach($folder as $row){ ?>
                                            <?php if($userinfo['Strand']== $row['Strand'] || $row['Strand'] == 'ALL'){ ?>
                                        <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                            <div class="font-icon-detail">
                                                <i class="<?php if($row['icon']== '1'){
                                                    echo 'nc-icon nc-email-85';
                                                }else if($row['icon']== '2'){
                                                    echo 'nc-icon nc-single-copy-04';
                                                }else if($row['icon']== '3'){
                                                    echo 'nc-icon nc-map-big';
                                                }else if($row['icon']== '4'){
                                                    echo 'nc-icon nc-layers-3';
                                                }else if($row['icon']== '5'){
                                                    echo 'nc-icon nc-badge';
                                                }else{
                                                } ?>"></i>
                                               
                                               
                                                <a href="files.php?file=<?= $row['id']; ?>&file-name=<?= $row['name']; ?>&file-strand=<?= $row['Strand']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="View Files">
    <p class="folder-name" style="color: black; text-decoration: underline;">
        <?= $row['name']; ?>
    </p>
</a>
<div class="border rounded  mb-3 bg-light mt-2 pt-2">
    <div class="mb-1" style='font-size: 12px;'>
        <span class="font-weight-bold">Created By:</span>
        <span><?= htmlspecialchars($row['First_name'] . ' ' . $row['Middle_name'] . ' ' . $row['Last_name']); ?></span>
    </div>
    <div  style='font-size: 12px;'>
        <span class="font-weight-bold">Date Created:</span>
        <span><?= htmlspecialchars($row['Date_created']); ?></span>
    </div>
       <div  style='font-size: 12px;'>
        <span class="font-weight-bold">Strand:</span>
        <span><?= htmlspecialchars($row['Strand']); ?></span>
    </div>
</div>
               <?php if($row['user_id'] == $user_id){ ?>
                                                <a href="javascript:;" data-id="<?= $row['id']; ?>" class="text-secondary font-weight-bold text-xs delete" data-toggle="tooltip" data-original-title="delete user">
                                                <i  class="fa fa-trash mt-1 mr-2 " style="font-size: 20px; color: red;"></i>
                                                        </a>
                                                        <a href="edit_folder.php?folder=<?= $row['id']; ?>&folder-name=<?= $row['name']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                        <i  class="nc-icon nc-settings-gear-64 mt-2 ml-4 " style="font-size: 20px; color: black;"></i>
                                            </a>
                                               <?php }else{

                                               } ?>
                                              
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php } ?>

                                        <?php }elseif($userinfo['role'] == 'Faculty'){ ?> 
                                        <?php foreach($folder as $row){ ?>
                                            <?php if($userinfo['Strand'] == $row['Strand'] || $row['Strand'] == 'ALL'){ ?>
                                        <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                            <div class="font-icon-detail">
                                                <i class="<?php if($row['icon']== '1'){
                                                    echo 'nc-icon nc-email-85';
                                                }else if($row['icon']== '2'){
                                                    echo 'nc-icon nc-single-copy-04';
                                                }else if($row['icon']== '3'){
                                                    echo 'nc-icon nc-map-big';
                                                }else if($row['icon']== '4'){
                                                    echo 'nc-icon nc-layers-3';
                                                }else if($row['icon']== '5'){
                                                    echo 'nc-icon nc-badge';
                                                }else{
                                                } ?>"></i>
                                               
                                               
                                                <a href="files.php?file=<?= $row['id']; ?>&file-name=<?= $row['name']; ?>&file-strand=<?= $row['Strand']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="View Files">
    <p class="folder-name" style="color: black; text-decoration: underline;">
        <?= $row['name']; ?>
    </p>
</a>
<div class="border rounded  mb-3 bg-light mt-2 pt-2">
    <div class="mb-1" style='font-size: 12px;'>
        <span class="font-weight-bold">Created By:</span>
        <span><?= htmlspecialchars($row['First_name'] . ' ' . $row['Middle_name'] . ' ' . $row['Last_name']); ?></span>
    </div>
    <div  style='font-size: 12px;'>
        <span class="font-weight-bold">Date Created:</span>
        <span><?= htmlspecialchars($row['Date_created']); ?></span>
    </div>
     <div  style='font-size: 12px;'>
        <span class="font-weight-bold">Strand:</span>
        <span><?= htmlspecialchars($row['Strand']); ?></span>
    </div>
</div>
               <?php if($row['user_id'] == $user_id){ ?>
                                                <a href="javascript:;" data-id="<?= $row['id']; ?>" class="text-secondary font-weight-bold text-xs delete" data-toggle="tooltip" data-original-title="delete user">
                                                <i  class="fa fa-trash mt-1 mr-2 " style="font-size: 20px; color: red;"></i>
                                                        </a>
                                                        <a href="edit_folder.php?folder=<?= $row['id']; ?>&folder-name=<?= $row['name']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                        <i  class="nc-icon nc-settings-gear-64 mt-2 ml-4 " style="font-size: 20px; color: black;"></i>
                                            </a>
                                               <?php }else{

                                               } ?>
                                              
  
                                              
                                            </div>
                                        </div>
                                     <?php } ?>
                                     <?php } ?>
                                        
                                        <?php }elseif($userinfo['role'] == 'Staff'){ ?> 
                                        <?php foreach($folder as $row){ ?>
                                            <?php if($userinfo['Strand'] == $row['Strand'] || $row['Strand'] == 'ALL'){ ?>
                                                
                                        <div id="folder-results" class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-6">
                                            <div class="font-icon-detail">
                                                <i class="<?php if($row['icon']== '1'){
                                                    echo 'nc-icon nc-email-85';
                                                }else if($row['icon']== '2'){
                                                    echo 'nc-icon nc-single-copy-04';
                                                }else if($row['icon']== '3'){
                                                    echo 'nc-icon nc-map-big';
                                                }else if($row['icon']== '4'){
                                                    echo 'nc-icon nc-layers-3';
                                                }else if($row['icon']== '5'){
                                                    echo 'nc-icon nc-badge';
                                                }else{
                                                } ?>"></i>
                                               
                                               
                                                <a href="files.php?file=<?= $row['id']; ?>&file-name=<?= $row['name']; ?>&file-strand=<?= $row['Strand']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="View Files">
    <p class="folder-name" style="color: black; text-decoration: underline; "> <?php echo $row['name'];?></p>
                                              
                                                </a>
                                                <div class="border rounded  mb-3 bg-light mt-2 pt-2">
    <div class="mb-1" style='font-size: 12px;'>
        <span class="font-weight-bold">Created By:</span>
        <span><?= htmlspecialchars($row['First_name'] . ' ' . $row['Middle_name'] . ' ' . $row['Last_name']); ?></span>
    </div>
    <div  style='font-size: 12px;'>
        <span class="font-weight-bold">Date Created:</span>
        <span><?= htmlspecialchars($row['Date_created']); ?></span>
    </div>
     <div  style='font-size: 12px;'>
        <span class="font-weight-bold">Strand:</span>
        <span><?= htmlspecialchars($row['Strand']);  ?></span>
    </div>
 
</div>

                                              <?php if($row['user_id'] == $user_id){ ?>
                                                <a href="javascript:;" data-id="<?= $row['id']; ?>" class="text-secondary font-weight-bold text-xs delete" data-toggle="tooltip" data-original-title="delete user">
                                                <i  class="fa fa-trash mt-1 mr-2 " style="font-size: 20px; color: red;"></i>
                                                        </a>
                                                        <a href="edit_folder.php?folder=<?= $row['id']; ?>&folder-name=<?= $row['name']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                        <i  class="nc-icon nc-settings-gear-64 mt-2 ml-4 " style="font-size: 20px; color: black;"></i>
                                            </a>
                                               <?php }else{

                                               } ?>
                                              
                                            </div>
                                        </div>
                                     <?php } ?>

                                
                                     <?php } ?>

                                     <?php }else{ ?>
                                       
                                        </div> <?php } ?>
                            

                                    </div>
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
               
                if (confirm("Are you sure want to remove this data?")) {
                    $.ajax({
                        url: 'controllers/delete_folder.php',

                        method: "POST",
                        data: {
                            folder_id: id
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
    if (sessionStorage.getItem("refreshBackPage") === "true") {
        sessionStorage.removeItem("refreshBackPage");
        location.reload(); 
    }
</script>

<script>
    $(document).ready(function() {
        
        $('#search-folder').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('.font-icon-list').filter(function() {
                $(this).toggle($(this).find('.folder-name').text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>
<script>
$(document).ready(function() {
  
    $('#search-folder').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('.font-icon-list').filter(function() {
            $(this).toggle($(this).find('.folder-name').text().toLowerCase().indexOf(value) > -1);
        });
    });


    $('#search-folderdd').on('change', function() {
        var selectedStrand = $(this).val();
        $('.font-icon-list').each(function() {
            var strand = $(this).find("span.font-weight-bold:contains('Strand:')").next().text().trim();
            if (selectedStrand === "ALL" || strand === selectedStrand) {
                $(this).show();
            } else {
                $(this).hide();
            }
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
