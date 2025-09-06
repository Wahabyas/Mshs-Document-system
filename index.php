<!DOCTYPE html>
<html lang="en">
<head>
<title>MSHS-SDRMS</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Elearn project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link href="plugins/video-js/video-js.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>
<style>
	
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

	<!-- Header -->

	<header class="header">
			
	
		<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<a href="#">
									<div class="logo_content d-flex flex-row align-items-center justify-content-start">
										<div class="logo_img"><img src="images/MSHS3.png" alt=""></div>
										<div class="logo_text">MSHS - SDRMS</div>
									</div>
								</a>
							</div>
							<nav class="main_nav_contaner ml-auto">
								<ul class="main_nav">
									<li class="active"><a href="#">home</a></li>
									<li><a href="#" id="openModal">Organizational Chart</a></li>
									<li><a href="contact.php">contact</a></li>
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
				<li class="active"><a href="#">home</a></li>
									
								
									<li><a href="#" id="openModal">Organizational Chart</a></li>
									<li><a href="contact.php">contact</a></li>
									<li><a href="view/login.php">Login</a></li>
				
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
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slide 1 -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/Outsidepuc.jpg)"></div>
					<div class="home_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content text-center">
										<div class="home_logo"><img src="images/MSHS2.png" alt="MSHS Logo"></div>
										<div class="home_text">
											<div class="home_title">MSHS Student Document and Repository Management System</div>
											<div class="home_subtitle">Secure. Private. Organized.</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	
			
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/2ndslide.jpg)"></div>
					<div class="home_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content text-center">
										<div class="home_logo"><img src="images/MSHS2.png" alt="MSHS Logo"></div>
										<div class="home_text">
											<div class="home_title">Role-Based Access Control</div>
											<div class="home_subtitle">Admin, Chairperson, Faculty, and Staff — each with secure, permission-based access.</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	
			
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/3rdslide.jpg)"></div>
					<div class="home_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content text-center">
										<div class="home_logo"><img src="images/MSHS2.png" alt="MSHS Logo"></div>
										<div class="home_text">
											<div class="home_title">Protecting MSHS Information</div>
											<div class="home_subtitle">Ensuring confidentiality, integrity, and availability for all school records.</div>
										</div>
										<div class="home_buttons">
											<div class="button home_button"><a href="#">Learn More<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
											<div class="button home_button"><a href="#">View System Features<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
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
	

	<!-- Featured Course -->
	<div class="d-flex flex-row align-items-start justify-content-between gap-1">

		<div class="home_slider_nav home_slider_prev trans_200"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
		<div class="home_slider_nav home_slider_next trans_200"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
	</div>
	
	<!-- Courses -->
	<div class="courses">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="section_title text-center"><h2>Secure Your Documents and Files</h2></div>
					<div class="section_subtitle">This system provides a secure way to manage, organize, and store documents and sensitive data using a folder-based structure tailored for our school.</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col">
					
					<!-- Courses Slider -->
					<div class="courses_slider_container">
						<div class="owl-carousel owl-theme courses_slider">
							
							<!-- Slider Item -->
							<div class="owl-item">
								<div class="course">
									<div class="course_image"><img src="images/documentsecuritygraphic.jpg" alt=""></div>
									<div class="course_body">
										<div class="course_header d-flex flex-row align-items-center justify-content-start">
											<div class="course_tag"><a href="#">Featured</a></div>
											<div class="course_price ml-auto">Secure</div>
										</div>
										<div class="course_title"><h3><a href="#">Document Security</a></h3></div>
										<div class="course_text">Ensure the protection of school records and sensitive data through access-controlled file storage.</div>
									
									</div>
								</div>
							</div>
	
							<!-- Slider Item -->
							<div class="owl-item">
								<div class="course">
									<div class="course_image"><img src="images/document-management-in-the-cloud.jpg" alt=""></div>
									<div class="course_body">
										<div class="course_header d-flex flex-row align-items-center justify-content-start">
											<div class="course_tag"><a href="#">New</a></div>
											<div class="course_price ml-auto">Organized</div>
										</div>
										<div class="course_title"><h3><a href="#">Document Management</a></h3></div>
										<div class="course_text">Easily upload, update, and manage digital files and documents within a secure platform.</div>
										
									</div>
								</div>
							</div>
	
							<!-- Slider Item -->
							<div class="owl-item">
								<div class="course">
									<div class="course_image"><img src="images/DMS.jpg" alt="https://unsplash.com/@annademy"></div>
									<div class="course_body">
										<div class="course_header d-flex flex-row align-items-center justify-content-start">
											<div class="course_tag"><a href="#">Folder-Based</a></div>
											<div class="course_price ml-auto">Structured</div>
										</div>
										<div class="course_title"><h3><a href="#">Folder Organization</a></h3></div>
										<div class="course_text">Sort files by Strand, category, or user using an intuitive folder-based layout for easy access.</div>
										<div class="course_footer d-flex align-items-center justify-content-start">
										
										</div>
									</div>
								</div>
							</div>
	
						</div>
						
						<!-- Courses Slider Nav -->
						
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<!-- Milestones -->

	<div class="milestones">
		<!-- Background image artis https://unsplash.com/@thepootphotographer -->
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/487774243_1177126410558641_3448395722110070202_n.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row milestones_container justify-content-center">
							
				

				<!-- Milestone -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img height="70px" width="60px" src="images/icon_3.png" alt=""></div>
						<div class="milestone_counter" data-end-value="500">0</div>
						<div class="milestone_text">Students</div>
					</div>
				</div>

				
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img height="70px" width="90px" src="images/icon_2.png" alt=""></div>
						<div class="milestone_counter" data-end-value="30">0</div>
						<div class="milestone_text">Teachers</div>
					</div>
				</div>

				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img height="70px" width="90px" src="images/icon_2.png" alt=""></div>
						<div class="milestone_counter" data-end-value="30">0</div>
						<div class="milestone_text">Staff</div>
					</div>
				</div>
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"  ><img height="70px" width="90px" src="images/icon_2.png" alt="" ></div>
						<div class="milestone_counter" data-end-value="6">0</div>
						<div class="milestone_text">Chairperson</div>
					</div>
				</div>
				

			</div>
		</div>
	</div>

	<!-- Sections -->

	<div class="grouped_sections">
		<div class="container">
			<div class="row">
	
				<!-- Why Choose Us -->
				<div class="col-lg-4 grouped_col">
					<div class="grouped_title">Why Trust Us?</div>
					<div class="accordions">
	
						<div class="accordion_container">
							<div class="accordion d-flex flex-row align-items-center active"><div>Why should you trust us?</div></div>
							<div class="accordion_panel">
								<div>
									<p>Our system is designed to securely store and manage sensitive school data. With state-of-the-art encryption and user role-based access, we ensure that all information remains confidential and protected from unauthorized access.</p>
								</div>
							</div>
						</div>
	
						<div class="accordion_container">
							<div class="accordion d-flex flex-row align-items-center"><div>How do we ensure document security?</div></div>
							<div class="accordion_panel">
								<div>
									<p>We utilize a folder-based management system to organize school documents, making it easy to categorize and retrieve them while maintaining a high level of security and privacy. The platform is user-friendly and ensures efficient document handling by authorized personnel only.</p>
								</div>
							</div>
						</div>
	
						<div class="accordion_container">
							<div class="accordion d-flex flex-row align-items-center"><div>Who can access the data?</div></div>
							<div class="accordion_panel">
								<div>
									<p>Access is granted based on user roles—ADMIN, Chairperson, Faculty, and Staff. Each role is assigned specific permissions, allowing authorized individuals to manage data and documents while maintaining the integrity of the system.</p>
								</div>
							</div>
						</div>
	
						<div class="accordion_container">
							<div class="accordion d-flex flex-row align-items-center"><div>Is the system easy to use?</div></div>
							<div class="accordion_panel">
								<div>
									<p>Yes, our system is designed with user experience in mind. Its simple and intuitive interface allows authorized users to easily navigate and manage data, documents, and permissions with minimal training.</p>
								</div>
							</div>
						</div>
	
					</div>
				</div>
	
				<!-- Events -->
				<div class="col-lg-4 grouped_col">
					<div class="grouped_title">Upcoming Events</div>
					<div class="events">
	
						<!-- Event -->
						<div class="event d-flex flex-row align-items-start justify-content-start">
							<div>
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">20</div>
									<div class="event_month">April</div>
								</div>
							</div>
							<div class="event_body">
								<div class="event_title"><a href="#">System Training for Faculty</a></div>
								<div class="event_subtitle">Location: Online Platform</div>
							</div>
						</div>
	
						<!-- Event -->
						<div class="event d-flex flex-row align-items-start justify-content-start">
							<div>
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">23</div>
									<div class="event_month">April</div>
								</div>
							</div>
							<div class="event_body">
								<div class="event_title"><a href="#">Document Management Training</a></div>
								<div class="event_subtitle">Location: Online Platform</div>
							</div>
						</div>
	
						<!-- Event -->
						<div class="event d-flex flex-row align-items-start justify-content-start">
							<div>
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">25</div>
									<div class="event_month">April</div>
								</div>
							</div>
							<div class="event_body">
								<div class="event_title"><a href="#">Launch of New School Data System</a></div>
								<div class="event_subtitle">Location: Online Platform</div>
							</div>
						</div>
	
						<!-- Event -->
						<div class="event d-flex flex-row align-items-start justify-content-start">
							<div>
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">27</div>
									<div class="event_month">April</div>
								</div>
							</div>
							<div class="event_body">
								<div class="event_title"><a href="#">Faculty Onboarding for New System</a></div>
								<div class="event_subtitle">Location: Online Platform</div>
							</div>
						</div>
	
						
						<div class="event d-flex flex-row align-items-start justify-content-start">
							<div>
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">29</div>
									<div class="event_month">April</div>
								</div>
							</div>
							<div class="event_body">
								<div class="event_title"><a href="#">School Data Security Workshop</a></div>
								<div class="event_subtitle">Location: Online Platform</div>
							</div>
						</div>
	
					</div>
				</div>
	
			
				<div class="col-lg-4 grouped_col">
					<div class="grouped_title">Latest News</div>
					<div class="news">
						
						
						<div class="news_post d-flex flex-row align-items-start justify-content-start">
							<div><div class="news_post_image"><img src="images/MSHS3.png" alt=""></div></div>
							<div class="news_post_body">
								<div class="news_post_date">April 02, 2025</div>
								<div class="news_post_title"><a href="news.html">New School Data Management System Launch</a></div>
								<div class="news_post_author">By <a href="#">jalipha Ampog</a></div>
							</div>
						</div>
	
						
						<div class="news_post d-flex flex-row align-items-start justify-content-start">
							<div><div class="news_post_image"><img src="images/MSHS3.png" alt=""></div></div>
							<div class="news_post_body">
								<div class="news_post_date">April 02, 2025</div>
								<div class="news_post_title"><a href="news.html">Securing Your School’s Digital Infrastructure</a></div>
								<div class="news_post_author">By <a href="#">Krys Illupa</a></div>
							</div>
						</div>
	
						
						<div class="news_post d-flex flex-row align-items-start justify-content-start">
							<div><div class="news_post_image"><img src="images/MSHS3.png" alt=""></div></div>
							<div class="news_post_body">
								<div class="news_post_date">April 02, 2025</div>
								<div class="news_post_title"><a href="news.html">Best Practices in Document Management</a></div>
								<div class="news_post_author">By <a href="#">Suhaib Mastura</a></div>
							</div>
						</div>
	
						
						<div class="news_post d-flex flex-row align-items-start justify-content-start">
							<div><div class="news_post_image"><img src="images/MSHS3.png" alt=""></div></div>
							<div class="news_post_body">
								<div class="news_post_date">April 02, 2025</div>
								<div class="news_post_title"><a href="news.html">How to Ensure Data Privacy in Schools</a></div>
								<div class="news_post_author">By <a href="#"></a></div>
							</div>
						</div>
	
					</div>
				</div>
			</div>
		</div>
	</div>
	

	



	

	

	

	<footer class="footer">
		<div class="container">
			<div class="row">
	
				
				<div class="col-lg-3 footer_col">
					<div class="footer_about">
						<div class="logo_container">
							<a href="#">
								<div class="logo_content d-flex flex-row align-items-center justify-content-start">
									<div class="logo_img"><img src="images/MSHS3.png" alt=""></div>
									<div style="color: #44425a;" class="logo_text">MSHS SDRMS</div>
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
		
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/video-js/video.min.js"></script>
<script src="plugins/video-js/Youtube.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
</body>

</html>