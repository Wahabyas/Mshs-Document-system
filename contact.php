<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Elearn project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="plugins/video-js/video-js.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>
<body>
	<style>
		/* Modal styles */
	.modal {
	  display: none; 
	  position: fixed; 
	  z-index: 999;
	  padding-top: 60px;
	  left: 0;
	  top: 0;
	  width: 100%;
	  height: 100%;
	  overflow: auto;
	  background-color: rgba(0,0,0,0.7);
	}
	
	.modal-content {
	  margin: auto;
	  display: block;
	  max-width: 80%;
	  border-radius: 8px;
	}
	
	.close {
	  position: absolute;
	  top: 30px;
	  right: 35px;
	  color: #fff;
	  font-size: 40px;
	  font-weight: bold;
	  cursor: pointer;
	}
	
	</style>
<div class="super_container">

	
	<header class="header">
			
		
		

	
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<a href="#">
									<div class="logo_content d-flex flex-row align-items-end justify-content-start">
										<div class="logo_img"><img src="images/MSHS3.png" alt=""></div>
										<div class="logo_text">MSHS - SDRMS</div>
									</div>
								</a>
							</div>
							<nav class="main_nav_contaner ml-auto">
								<ul class="main_nav">
									<li><a href="index.php">home</a></li>
								
									<li><a href="#" id="openModal">Organizational Chart</a></li>
									<li class="active"><a href="contact.php">contact</a></li>
										<li><a href="view/login.php">Login</a></li>
								</ul>
								

								<!-- Hamburger -->

								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
								</div>
							</nav>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Search Panel -->
			
	</header>

	<!-- Menu -->
	<div id="imageModal" class="modal">
		<span class="close">&times;</span>
		<img class="modal-content"  height="650px" id="orgImage">
	  </div>
	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="index.php">Home</a></li>
	
				<li class="menu_mm"><a href="view/login.php">Contact</a></li>
				<li class="menu_mm"><a href="view/login.php">login</a></li>
			</ul>
		</nav>
		<div class="menu_extra">
			<div class="menu_phone"><span class="menu_title">phone:</span>(+09) 073546182</div>
			<div class="menu_social">
				<span class="menu_title">follow us</span>
				<ul>
					<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	
	

	<div class="home">
	
		<div class="home_background parallax_background parallax-window" data-parallax="scroll" data-image-src="images/contacts.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">Contact</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="index.html">Home</a></li>
									<li>Contact</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container-fluid">
			<div class="row row-xl-eq-height">
				<!-- Contact Content -->
				<div class="col-xl-6">
					<div class="contact_content">
						<div class="row">
							<div class="col-xl-6">
								<div class="contact_about">
									<div class="logo_container">
										<a href="#">
											<div class="logo_content d-flex flex-row align-items-end justify-content-start"  style="margin-left: 70px;">
												<div class="logo_img"><img src="images/MSHS3.png" alt="Logo"></div>
												<div style="color: #2c2b31; " class="logo_text">MSHS - SDRMS</div>
											</div>
										</a>
									</div>
									<div class="contact_about_text">
										<p>MSU - Marawi Senior High School is committed to academic excellence and innovation. We provide a dynamic environment for learners to grow, excel, and lead with integrity and purpose.</p>
									</div>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="contact_info_container">
									<div class="contact_info_main_title">Get in Touch</div>
									<div class="contact_info">
										<div class="contact_info_item">
											<div class="contact_info_title">Address:</div>
											<div class="contact_info_line">MSU - Marawi Senior High School, Marawi City, Lanao del Sur</div>
										</div>
										<div class="contact_info_item">
											<div class="contact_info_title">Phone:</div>
											<div class="contact_info_line">(+09) 073546182</div>
										</div>
										<div class="contact_info_item">
											<div class="contact_info_title">Email:</div>
											<div class="contact_info_line">MSHS@gmail.com</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div hidden class="contact_form_container">
							<form action="#" id="contact_form" class="contact_form">
								<div>
									<div class="row">
										<div class="col-lg-6 contact_name_col">
											<input type="text" class="contact_input" placeholder="Full Name" required="required">
										</div>
										<div class="col-lg-6">
											<input type="email" class="contact_input" placeholder="Email Address" required="required">
										</div>
									</div>
								</div>
								<div><input type="text" class="contact_input" placeholder="Subject" required="required"></div>
								<div><textarea class="contact_input contact_textarea" placeholder="Your Message"></textarea></div>
								<button class="contact_button"><span>Send Message</span><span class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
							</form>
						</div>
					</div>
				</div>
	
				<!-- Contact Map -->
				<div class="col-xl-6 map_col">
					<div class="contact_map">
						<!-- Google Map -->
						<div id="google_map" class="google_map">
							<div class="map_container">
								<iframe
								width="100%"
								height="450"
								style="border:0"
								loading="lazy"
								allowfullscreen
								referrerpolicy="no-referrer-when-downgrade"
								src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126363.36540115144!2d124.21579865363495!3d8.00113665607301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x325579abf3d9d44d%3A0x7ef2dddf2b6d1a50!2sMindanao%20State%20University%20-%20Main%20Campus!5e0!3m2!1sen!2sph!4v1714813195193!5m2!1sen!2sph">
							  </iframe>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
	

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
	
				<!-- About -->
				<div class="col-lg-3 footer_col">
					<div class="footer_about">
						<div class="logo_container">
							<a href="#">
								<div class="logo_content d-flex flex-row align-items-end justify-content-start">
									<div class="logo_img"><img src="images/MSHS3.png" alt=""></div>
									<div style="color: #000000;" class="logo_text">MSHS SDRMS</div>
								</div>
							</a>
						</div>
						<div class="footer_about_text">
							<p>The MSHS School Document and Repository Management System securely stores and organizes school information, providing easy and private access for Admin, Chairperson, Faculty, and Staff.</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<div class="copyright">
	Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | MSHS School Document and Repository Management System
						</div>
					</div>
				</div>
	
				<div class="col-lg-3 footer_col">
					<div class="footer_links">
						<div class="footer_title">Quick Menu</div>
						<ul class="footer_list">
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="#">Document Management</a></li>
							<li><a href="#">User Access</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
	
				<!-- Useful Links -->
				<div class="col-lg-3 footer_col">
					<div class="footer_links">
						<div class="footer_title">Useful Links</div>
						<ul class="footer_list">
							<li><a href="#">Folder Management</a></li>
							<li><a href="#">Security Settings</a></li>
							<li><a href="#">Activity Logs</a></li>
							<li><a href="#">User Guides</a></li>
							<li><a href="#">System Updates</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
	
				<!-- Contact Us -->
				<div class="col-lg-3 footer_col">
					<div class="footer_contact">
						<div class="footer_title">Contact Us</div>
						<div class="footer_contact_info">
							<div class="footer_contact_item">
								<div class="footer_contact_title">Address:</div>
								<div class="footer_contact_line">Mindanao State University - MSHS, Marawi City, Philippines</div>
							</div>
							<div class="footer_contact_item">
								<div class="footer_contact_title">Phone:</div>
								<div class="footer_contact_line">(+09) 073546182</div>
							</div>
							<div class="footer_contact_item">
								<div class="footer_contact_title">Email:</div>
								<div class="footer_contact_line">MSHS@gmail.com</div>
							</div>
						</div>
					</div>
				</div>
	
			</div>
		</div>
	</footer>
</div>
<script>
	document.getElementById("openModal").addEventListener("click", function(e) {
	  e.preventDefault();
	  var modal = document.getElementById("imageModal");
	  var modalImg = document.getElementById("orgImage");
	  modal.style.display = "block";
	  modalImg.src = "images/orgchart.jfif"; // <-- Replace with your image path
	});
	
	// Close modal when clicking outside the image
	window.addEventListener("click", function(event) {
	  var modal = document.getElementById("imageModal");
	  var modalImg = document.getElementById("orgImage");
	  if (event.target === modal) {
		modal.style.display = "none";
	  }
	});
	
	// Optional: Close button (×)
	document.querySelector(".close").addEventListener("click", function() {
	  document.getElementById("imageModal").style.display = "none";
	});
	</script>
	<script>
		function initMap() {
		  var msuMain = { lat: 8.0012, lng: 124.2926 };
	  
		  var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 16,
			center: msuMain
		  });
	  
		  var marker = new google.maps.Marker({
			position: msuMain,
			map: map,
			title: 'Mindanao State University - Main Campus'
		  });
		}
	  </script>
	
	
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA" async defer></script>
<script src="js/contact.js"></script>
</body>
</html>