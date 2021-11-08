
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
	
	<!-- The social media icon bar -->
	<div class="icon-bar-sticky">
	  <a href="#" class="waves-effect waves-light btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
	  <a href="#" class="waves-effect waves-light btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
	  <a href="#" class="waves-effect waves-light btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
	  <a href="#" class="waves-effect waves-light btn btn-social-icon btn-youtube"><i class="fa fa-youtube-play"></i></a>
	</div>
	<header class="top-bar">
		<div class="topbar">

		  <div class="container">
			<div class="row justify-content-end">
			  <div class="col-lg-6 col-12 d-lg-block d-none">
				<div class="topbar-social text-center text-md-left topbar-left">
				  <ul class="list-inline d-md-flex d-inline-block">
					<li class="ml-10 pr-10"><a href="#"><i class="text-white fa fa-question-circle"></i> Ask a Question</a></li>
					<li class="ml-10 pr-10"><a href="mailto:devfreak235@gmail.com"><i class="text-white fa fa-envelope"></i> devfreak235@gmail.com</a></li>
					<li class="ml-10 pr-10"><a href="tel:+233592914060"><i class="text-white fa fa-phone"></i> +(233) 059 291 4060</a></li>
				  </ul>
				</div>
			  </div>
			  <div class="col-lg-6 col-12 xs-mb-10">
				<div class="topbar-call text-center text-lg-right topbar-right">
				  <ul class="list-inline d-lg-flex justify-content-end">				  
					 <li class="mr-10 pl-10 lng-drop">
					  	<select class="header-lang-bx selectpicker">
							<option>USD</option>
							<option>EUR</option>
							<option>GBP</option>
							<option>INR</option>
						</select>
					 </li>
					 <li class="mr-10 pl-10 lng-drop">
					  	<select class="header-lang-bx selectpicker">
							<option data-icon="flag-icon flag-icon-us">Eng USA</option>
							<option data-icon="flag-icon flag-icon-gb">Eng UK</option>
						</select>
					 </li>
					 <li class="mr-10 pl-10"><a href="register.php"><i class="text-white fa fa-user d-md-inline-block d-none"></i> Register</a></li>
					 <li class="mr-10 pl-10"><a href="login.php"><i class="text-white fa fa-sign-in d-md-inline-block d-none"></i> Login</a></li>
					 <li class="mr-10 pl-10"><a href="../../admin/main/index.php"><i class="text-white fa fa-dashboard d-md-inline-block d-none"></i> Dashboard</a></li>
				  </ul>
				</div>
			  </div>
			 </div>
		  </div>
		</div>

		<nav hidden class="nav-white nav-transparent">
			<div class="nav-header">
				<a href="index.php" class="brand">
					<img src="../images/logo-light-text2.png" alt=""/>
				</a>
				<button class="toggle-bar">
					<span class="ti-menu"></span>
				</button>	
			</div>								
			<ul class="menu">		
				<li>
					<a href="#">About</a>
				</li>
				<li>
					<a href="index.php">Blogs</a>
				</li>
				<li>
					<a href="contact.php">Contact</a>
				</li>
			</ul>
			<ul class="attributes">
				<li class="d-md-block d-none"><a href="subscription.php" class="px-10 pt-15 pb-10"><div class="btn btn-primary py-5">Subscribe Now</div></a></li>
				<li><a href="#" class="toggle-search-fullscreen"><span class="ti-search"></span></a></li>
			</ul>

			<div class="wrap-search-fullscreen">
				<div class="container">
					<button class="close-search"><span class="ti-close"></span></button>
					<input type="text" placeholder="Search..." />
				</div>
			</div>
		</nav>
	</header>
	
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(../images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">About us</h2>
						<ol class="breadcrumb bg-transparent justify-content-center">
							<li class="breadcrumb-item"><a href="#" class="text-white-50"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">About us</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->	
	<section class="py-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<a href="#" class="pull-up">
						<div class="p-10">
							<span class="font-size-40 icon-Compiling"><span class="path1"></span><span class="path2"></span></span>
							<h3 class="my-15">Our Philosophy</h3>
							<div class="text-fade font-size-16 mb-10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod..</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<a href="#" class="pull-up">
						<div class="p-10">
							<span class="font-size-40 icon-Position1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
							<h3 class="my-15">Our Mission</h3>
							<div class="text-fade font-size-16 mb-10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod..</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<a href="#" class="pull-up">
						<div class="p-10">
							<span class="font-size-40 icon-Book-open"><span class="path1"></span><span class="path2"></span></span>
							<h3 class="my-15">Our Vission</h3>
							<div class="text-fade font-size-16 mb-10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod..</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<a href="#" class="pull-up">
						<div class="p-10">
							<span class="font-size-40 icon-Road-Cone"><span class="path1"></span><span class="path2"></span></span>
							<h3 class="my-15">Key Of Success</h3>
							<div class="text-fade font-size-16 mb-10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod..</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<section class="py-50 bg-white">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-12">
					<h2 class="mb-10">Why Us</h2>
					<h4 class="font-weight-400">It is a long established fact that a reade.</h4>
					<p class="font-size-16">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br><br> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
					<a href="#" class="btn btn-primary">Contact Us</a>
				</div>
				<div class="col-lg-6 col-12">
					<div class="popup-vdo mt-30 mt-md-0">
						<img src="../images/front-end-img/courses/4f.jpg" class="img-fluid rounded" alt="">
						<a href="https://www.youtube.com/watch?v=uK67pD7kI6s" class="popup-youtube play-vdo-bt waves-effect waves-circle btn btn-circle btn-primary btn-lg"><i class="mdi mdi-play"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="py-30 bg-img countnm-bx" data-jarallax='{"speed": 0.4}' style="background-image: url(../images/front-end-img/background/bg-1.jpg)" data-overlay="5">
		<div class="container">			
			<div class="box box-body bg-transparent mb-0">
				<div class="row justify-content-center align-items-center">
					<div class="col-lg-3 col-6">
						<div class="text-center mb-30 mb-lg-0">
							<div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center mx-auto">
								<span class="text-white font-size-40 icon-User"><span class="path1"></span><span class="path2"></span></span>
							</div>
							<h1 class="countnm my-10 text-white">5428</h1>
							<div class="text-uppercase text-white">Users</div>
						</div>
					</div>	
					<div class="col-lg-3 col-6">
						<div class="text-center mb-30 mb-lg-0">
							<div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center mx-auto">
								<span class="text-white font-size-40 icon-Book"></span>
							</div>
							<h1 class="countnm my-10 text-white">120</h1>
							<div class="text-uppercase text-white">Active Blogs</div>
						</div>
					</div>
					<div class="col-lg-3 col-6">
						<div class="text-center">
							<div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center mx-auto">
								<span class="text-white font-size-40 icon-Group"><span class="path1"></span><span class="path2"></span></span>
							</div>
							<h1 class="countnm my-10 text-white">7485</h1>
							<div class="text-uppercase text-white">All time Visitors</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</section>
	<section class="py-50">
		<div class="container">		
			<div class="row">
				<div class="col-12">
					<div class="owl-carousel owl-theme owl-btn-1" data-nav-arrow="true" data-nav-dots="false" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
						<div class="item">
							<div class="text-center">
								<div class="bg-primary-light w-50 mx-auto rounded-circle overflow-hidden">
									<img src="../images/front-end-img/avatar/4.jpg" class="avatar-lg w-auto" alt="">
								</div>
								<div class="max-w-750 mx-auto">									
									<div class="testimonial-info">
										<h4 class="name mb-0 mt-10">Peter Packer</h4>
										<p>-Art Director</p>
									</div>
									<div class="testimonial-content">
										<ul class="cours-star">
											<li class="active"><i class="fa fa-star"></i></li>
											<li class="active"><i class="fa fa-star"></i></li>
											<li class="active"><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
										</ul>
										<p class="font-size-16">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word...</p>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="text-center">
								<div class="bg-primary-light w-50 mx-auto rounded-circle overflow-hidden">
									<img src="../images/front-end-img/avatar/5.jpg" class="avatar-lg w-auto" alt="">
								</div>
								<div class="max-w-750 mx-auto">									
									<div class="testimonial-info">
										<h4 class="name mb-0 mt-10">Peter Packer</h4>
										<p>-Art Director</p>
									</div>
									<div class="testimonial-content">
										<ul class="cours-star">
											<li class="active"><i class="fa fa-star"></i></li>
											<li class="active"><i class="fa fa-star"></i></li>
											<li class="active"><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
										</ul>
										<p class="font-size-16">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word...</p>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="text-center">
								<div class="bg-primary-light w-50 mx-auto rounded-circle overflow-hidden">
									<img src="../images/front-end-img/avatar/9.jpg" class="avatar-lg w-auto" alt="">
								</div>
								<div class="max-w-750 mx-auto">									
									<div class="testimonial-info">
										<h4 class="name mb-0 mt-10">Peter Packer</h4>
										<p>-Art Director</p>
									</div>
									<div class="testimonial-content">
										<ul class="cours-star">
											<li class="active"><i class="fa fa-star"></i></li>
											<li class="active"><i class="fa fa-star"></i></li>
											<li class="active"><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
										</ul>
										<p class="font-size-16">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word...</p>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</section>
	<section class="py-100" data-jarallax='{"speed": 0.4}' style="background-image: url(https://images.unsplash.com/photo-1487611459768-bd414656ea10?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80);" data-overlay="5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-12">				
					<div class="text-center text-white">
						<h2 class="mb-15 font-weight-600 font-size-40">Best Online Blogging <br> of all Time</h2>
						<h4>For Once in your your life try!!</h4>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						<div class="mt-5"><a href="#" class="btn btn-primary">Enrol Now!</a></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="py-50">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-12 text-center">
					<h2>Our Team Of Developers</h2>
					<hr>
				</div>
			</div>			
			<div class="row justify-content-center align-items-center">				
			  <div class="col-12 col-lg-3 col-md-6 mx-3">
				<div class="box">
				  <div class="box-header no-border p-0" style="max-height: 200 !important; overflow: hidden;">				
					<a href="#">
					  <img class="img-fluid" src="../images/b1e9d23a-a623-40fb-8ba3-262e13f09195-removebg-preview.png" alt="" style="max-height: 200px;">
					</a>
				  </div>
				  <div class="box-body">
					  <div class="text-center">
						<div class="user-contact list-inline text-center">
							<a href="#" class="btn btn-circle mb-5 btn-xs btn-facebook"><i class="fa fa-facebook"></i></a>
							<a href="#" class="btn btn-circle mb-5 btn-xs btn-instagram"><i class="fa fa-instagram"></i></a>
							<a href="#" class="btn btn-circle mb-5 btn-xs btn-twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="btn btn-circle mb-5 btn-xs btn-warning"><i class="fa fa-envelope"></i></a>				
						</div>
						<h4 class="my-10"><a href="#">Joseph Agere</a></h4>
						<h6 class="user-info mt-0 mb-10 text-fade">Software Developer</h6>
						<p class="text-fade w-p85 mx-auto">Commited to producing high quality, user friendly and bugs free softwares.</p>
					  </div>
				  </div>
				</div>
			  </div>
			  <div class="col-12 col-lg-3 col-md-6 mx-3">
				<div class="box">
				  <div class="box-header no-border p-0">				
					<a href="#">
					  <div style="position: relative; overflow: hidden; max-height: 200px;"><img class="img-fluid" src="../images/prince.png" alt="" style=""></div>
					</a>
				  </div>
				  <div class="box-body">
					  <div class="text-center">
						<div class="user-contact list-inline text-center">
							<a href="#" class="btn btn-circle mb-5 btn-xs btn-facebook"><i class="fa fa-facebook"></i></a>
							<a href="#" class="btn btn-circle mb-5 btn-xs btn-instagram"><i class="fa fa-instagram"></i></a>
							<a href="#" class="btn btn-circle mb-5 btn-xs btn-twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="btn btn-circle mb-5 btn-xs btn-warning"><i class="fa fa-envelope"></i></a>					
						</div>
						<h4 class="my-10"><a href="#">Mireku Prince</a></h4>
						<h6 class="user-info mt-0 mb-10 text-fade">Web Developer</h6>
						<p class="text-fade w-p85 mx-auto">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
					  </div>
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</section>
	<section class="bg-light py-30">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-9 col-12">
					<div class="text-md-left text-center">
						<h2><strong> EasyBlog: </strong> fully responsive template in the for bloggers</h2>
						<p class="mb-0">Exclusive multi-purpose lightweight responsive with powerful features.</p>
					</div>
				</div>
				<div class="col-md-3 col-12">					
					 <div class="text-md-right text-center mt-30 mt-md-0">
						<a class="btn btn-primary" href="https://wa.link/dt9edj">Purchase Now</a> 
					 </div>
					 <div class="pull-right w-70 h-70 mt-1"><img src="../assets/32ac4d13-183a-44f0-b1c3-a59b5fa926b8.jpg" alt="" class="img-fluid"></div>
				</div>
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
	<script src="../assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="../assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
    <script src="../assets/vendor_components/OwlCarousel2/dist/owl.carousel.js"></script>
	
	<!-- EduAdmin front end -->
	<script src="js/template.js"></script>
	
	
	
</body>
</html>
