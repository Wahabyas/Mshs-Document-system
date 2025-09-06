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
   
	.alert {
		padding: 15px;
		border-radius: 5px;
		margin-top: 20px;
		font-size: 1rem;
		transition: opacity 0.3s ease;
		width: 100%;
		max-width: 500px;
		margin-left: auto;
		margin-right: auto;
	}

	.alert-danger {
			background-color:rgba(194, 4, 20, 0.83);
		border-color: #f5c6cb;
		color:rgb(195, 195, 195);
		border: 1px solid #f5c6cb;
	}

	.alert-success {
		background-color:rgba(1, 122, 29, 0.78);
		border-color: #c3e6cb;
		align-items; center;
		color:rgb(255, 255, 255);
		border: 1px solid #c3e6cb;
	}

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

	<main class="d-flex w-100 uno"  style="background: url(mshsimage/IMG20250404092709.jpg);  background-size: cover;">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

					
						<div class="card" style=" background:rgba(255, 255, 255, 0.66);">
							<div class="card-body">
								<div class="form-group" id="alert-msg"></div>
								<div class="m-sm-4">
									<div class="text-center mb-3">
										<img src="mshsimage/MSHS3.png" alt="Admin Avatar" class="img-fluid rounded-circle" width="192" height="192" />
									</div>
										<div class="text-center mt-4">
							<h1 class="h2">Staff</h1>
							
						</div>

									<form method="post" name="login_form">
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" name="username" placeholder="Enter your Username" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
											
										</div>
										<div>
											<label class="form-check">
												<input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" >
												<span class="form-check-label">Show Password</span><a href="forgot_password.php"><span class="form-check-label" style='color:rgb(0, 77, 154)'>Forgot password?</span></a>
											</label>
										</div>
										<div class="text-center mt-3">
											<button type="submit" id="btn-login" class="btn btn-lg btn-primary">Sign in</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/jquery.min.js"></script>


	<script src="js/app.js"></script>
	<script src="css/bootstrap.bundle.min.js"></script>


	<script>
	jQuery(function () {
    $('form[name="login_form"]').on('submit', function (e) {
        e.preventDefault();

        var u_username = $(this).find('input[name="username"]').val();
        var p_password = $(this).find('input[name="password"]').val();

      
        if (u_username === '' && p_password === '') {
            $('#alert-msg').html('<div class="alert alert-danger">Required Username and Password!</div>');
				setTimeout(' window.location.href = "login4Staff.php"; ', 1000);
        }
        else if (p_password === '') {
            $('#alert-msg').html('<div class="alert alert-danger">Password is required!</div>');
				setTimeout(' window.location.href = "login4Staff.php"; ', 1000);
        }
       
        else if (u_username === '') {
            $('#alert-msg').html('<div class="alert alert-danger">Username is required!</div>');
				setTimeout(' window.location.href = "login4Staff.php"; ', 1000);
        } 
        else {
           
            $.ajax({
                type: 'POST',
                url: 'controllers/login_process4staff.php',
                data: {
                    username: u_username,
                    password: p_password
                },
                beforeSend: function () {
                    $('#alert-msg').html('');
                }
            })
            .done(function (t) {
                if (t == 0) {
                    $('#alert-msg').html('<div class="alert alert-danger">Incorrect username or password!</div>');
						setTimeout(' window.location.href = "login4Staff.php"; ', 1000);
                } else {
                    $('#alert-msg').html('<div class="alert alert-success">Welcome Staff</div>');
                    $("#btn-login").html(' &nbsp; Signing In ...');
                    setTimeout(' window.location.href = "dashboard.php"; ', 2000);
                }
            });
        }
    });
});

	</script>
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

</body>

</html>
