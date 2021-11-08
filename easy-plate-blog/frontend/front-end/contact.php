
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>EduAdmin - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/skin_color.css">
     
  </head>

<body class="theme-primary">
	
	<?php
		include 'inc/header.php';
	?>
	
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(../images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">Contact us</h2>
						<ol class="breadcrumb bg-transparent justify-content-center">
							<li class="breadcrumb-item"><a href="#" class="text-white-50"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">Contact us</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->
	
	<section class="py-50">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-7 col-12">
					<form class="contact-form" action="">
						<div class="text-left mb-30">
							<h2>Get In Touch</h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
						</div>
						<div class="row">
						  <div class="col-md-6">
							<div class="form-group">
							  <input type="text" class="form-control" placeholder="First Name">
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
							  <input type="text" class="form-control" placeholder="Last Name">
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
							  <input type="email" class="form-control" placeholder="Your Email">
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
							  <input type="tel" class="form-control" placeholder="Phone">
							</div>
						  </div>
						  <div class="col-md-12">
							<div class="form-group">
							  <input type="text" class="form-control" placeholder="Subject">
							</div>
						  </div>
						  <div class="col-lg-12">
						      <div class="form-group">
								<textarea name="message" rows="5" class="form-control" required="" placeholder="Message"></textarea>
							  </div>
						  </div>
						  <div class="col-lg-12">
							  <button name="submit" type="submit" value="Submit" class="btn btn-primary"> Send Message</button>
						  </div>
						</div>
					</form>
				</div>
				<div class="col-md-5 col-12 mt-30 mt-md-0">
					<div class="box box-body p-40 bg-dark mb-0">
						<h2 class="box-title text-white">Contact Info</h2>
						<div class="widget font-size-18 my-20 py-20 by-1 border-light">	
							<ul class="list list-unstyled text-white-80">
								<li class="pl-40"><i class="ti-location-pin"></i>University for development sudies,<br>School Road</li>
								<li class="pl-40 my-20"><i class="ti-mobile"></i>+(233) 592914060</li>
								<li class="pl-40"><i class="ti-email"></i>devfreak235@gmail.com</li>
							</ul>
						</div>
						<h4 class="mb-20">Follow Us</h4>
						<ul class="list-unstyled d-flex gap-items-1">
							<li><a href="https://devfreak1.000webhostapp.com" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-facebook"><i class="fa fa-link"></i></a></li>
							<li><a href="https://twitter.com/prince17193709" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://www.linkedin.com/in/prince-mireku-2a318b203" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-linkedin"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="https://www.youtube.com/c/designfreak/" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-youtube"><i class="fa fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section>
		<div class="row">
				<div class="col-12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2036.0525254483996!2d-1.0787535261851857!3d10.866582276205!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe2b5b4010680417%3A0xca40e83f74966363!2sC.K.%20Tedam%20university%20of%20technology%20and%20applied%20sciences!5e0!3m2!1sen!2sgh!4v1621203968589!5m2!1sen!2sgh" class="map" style="border:0;" allowfullscreen="true"></iframe>
				</div>
			</div>
	</section>
	
	
	<?php
	include 'inc/footer.php';
	?>
	
	
	<!-- Vendor JS -->
	<script src="js/vendors.min.js"></script>	
	<!-- Corenav Master JavaScript -->
    <script src="corenav-master/coreNavigation-1.1.3.js"></script>
    <script src="js/nav.js"></script>
	<script src="../assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
	
	<!-- EduAdmin front end -->
	<script src="js/template.js"></script>
	
	
	
</body>
</html>
