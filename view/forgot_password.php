<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin & Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	<link rel="canonical" href="mshsimage/MSHS.jpg" />
	<title>Mshs</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
   






	.site-header {
		background-color: #fff;
		border-bottom: 1px solid #dee2e6;
		padding: 10px 20px;
		display: flex;
		justify-content: space-between;
		align-items: center;
		flex-wrap: wrap;
	}

	.site-header img {
		height: 50px;
	}

	.site-header h4 {
		margin: 0;
		font-weight: 600;
		color: #333;
	}

	.user-dropdown .dropdown-menu {
		right: 500px;
		left: auto;

	}

    @media (max-width: 804px) {
	/* Center the dropdown container itself */
	.user-dropdown {
		display: flex;
		justify-content: center; /* Align the dropdown horizontally at center */
		width: 100%; /* Ensure it takes up full width */
        margin-top: 30px;
	}

	/* Make sure the dropdown items are centered as well */
	.user-dropdown .dropdown-menu {
		left: auto;
		right: auto; /* Center the dropdown menu horizontally */
	}
    .uno{
        margin-top: -30px;
    }
}

</style>

<body>
	<header class="site-header shadow-sm">
		<div class="d-flex align-items-center gap-3">
			<img src="mshsimage/MSHS3.png" alt="School Logo">
			<h4 class="mb-0">School Document Repository and Management System</h4>
		</div>
		<div class="dropdown user-dropdown">
			<button class="btn btn-outline-primary dropdown-toggle" style=" background:rgba(255, 255, 255, 0.66); color: black;" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
				Select Role
			</button>
			<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
				<li><a class="dropdown-item" href="login.php">Admin</a></li>
				<li><a class="dropdown-item" href="login4chair.php">Chairperson</a></li>
				<li><a class="dropdown-item" href="login4fac.php">Faculty</a></li>
				<li><a class="dropdown-item" href="login4staff.php">Staff</a></li>
				<li><a class="dropdown-item" href="/MSHS-DOCUMENT SYSTEM/index.php">( Go Back )</a></li>
			</ul>
		</div>
	</header>

	<main class="d-flex w-100 uno" style="background: url(mshsimage/IMG20250404092709.jpg);  background-size: cover;">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-12 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

					
					 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Please fill up the form to confirm your identity</h4>
                                </div>
                                <div class="card-body">
                            <div class="" id="message"></div>
                                    <form method="POST" enctype="multipart/form-data" action="controllers/edit_user.php" >
                         
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <select class="form-control" id="role" name="role" required>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Chairperson">Chairperson</option>
                                                        <option value="Faculty">Faculty</option>
                                                        <option value="Staff">Staff</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" name="Fname" placeholder="First name"required value="">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pl-1">
                                                <div class="form-group">
                                                    <label>Middel name</label>
                                                    <input type="text" class="form-control" name="Mname" placeholder="Middle Name" required value="">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name="Lname" class="form-control" placeholder="Last Name" required value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="date">Select Date</label>
                                                    <input type="date" class="form-control" id="date" name="date" required value="">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pr-1">
                                                <div class="form-group">
                                                    <label for="Status">Strand</label>
                                                    <select class="form-control" id="Strand" name="Strand" required>
                                                  
   

                                                        <option  value="STEM">STEM</option>
                                                        <option value="ABM">ABM</option>
                                                        <option value="HUMMS">HUMMS</option>
                                                        <option  value="TVL-ICT">TVL-ICT</option>
                                                        <option  value="TVL-HE">TVL-HE</option>
                                                        <option  value="SPORTS">SPORTS</option>
                                                        <option  value=' '>Null</option>
                                               
                                                          
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                
                                      
                                     
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Phone No.</label>
                                                    <input name="phone" type="number" class="form-control" placeholder="Phone No." required value="">
                                                </div>
                                            </div>
                                           </div>
                                            

                                      
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <textarea rows="4" cols="80" name="aboutMe" class="form-control" placeholder="Here can be your description" required  ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
										<button onclick="location.href='login.php'" class="btn btn-info btn-fill pull-right">Go back</button>
                                        <div class="clearfix"></div>
                                    </form>
                            <div class="" id="message11"></div>

                                </div>
                            </div>
                   
                        </div>
                    </div>
                </div>
            </div>


					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/jquery.min.js"></script>
	<script>

	document.addEventListener("DOMContentLoaded", function () {
		const checkbox = document.querySelector('input[name="remember-me"]');
		const passwordInput = document.querySelector('input[name="password"]');

		checkbox.addEventListener('change', function () {
			if (this.checked) {
				passwordInput.type = "text";
			} else {
				passwordInput.type = "password";
			}
		});
	});
</script>


	<script src="css/app.css"></script>
	<script src="css/bootstrap.bundle.min.js"></script>
   <script>

	$('form').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

      
        var role = $('select[name="role"]').val();
        var Fname = $('input[name="Fname"]').val();
        var Mname = $('input[name="Mname"]').val();
        var Lname = $('input[name="Lname"]').val();
        var date = $('input[name="date"]').val();
        var Strand = $('select[name="Strand"]').val();
        var phone = $('input[name="phone"]').val();
        var aboutMe = $('textarea[name="aboutMe"]').val();
        if (!role || !Fname || !Mname || !Lname || !date  || !phone || !aboutMe) {
            $('#message').html('<div class="alert alert-danger">Please fill out all required fields!</div>');
            return;
        }

 
        var formData = new FormData(this); 

        $.ajax({
            url: 'controllers/forgot_password.php', 
            method: 'POST',
            data: formData, 
            contentType: false,
            processData: false,
            success: function(response) {
                $("#message").html(response);
				
            },
            error: function(xhr, status, error) {
                console.log("Submission failed: " + error);
                $('#message').html('<div class="alert alert-danger">Submission failed. Please try again.</div>');
            }
        });
    });



   </script>
</body>

</html>
