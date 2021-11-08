<?php
    include '../../admin/main/class/class.user.php';
    $user = new USER();

    if (!isset($_GET['rblog']) || empty($_GET['rblog'])) {
    	$user->redirect('index.php');
    	exit();
    }

    $blog_id = $user->escape($_GET['rblog']);
    $user->query("SELECT * FROM blog WHERE id ='$blog_id'");
    if (!$user->fetchOne()) {
    	$user->redirect('index.php');
    	exit();
    }else{
    	$blog = $user->fetchOne();
    	if (strpos($blog['thumbnail'], 'https') !== false) {
			$thumbnail = $blog['thumbnail'];
		}else{
			$thumbnail = '../../admin/assets/blog/'.$blog['thumbnail'];
		}

		$title = $blog['title'];
    }

?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://www.multipurposethemes.com/admin/eduadmin-template/images/favicon.ico">

    <title><?php echo $title ?></title>
    
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
						<h2 class="page-title text-white">Blog Title Here</h2>
						<ol class="breadcrumb bg-transparent justify-content-center">
							<li class="breadcrumb-item"><a href="#" class="text-white-50"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">Blog Content</li>
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
				<div class="col-lg-9 col-md-8 col-12">
					<div class="blog-post mb-30">
						<div class="entry-image clearfix">
							<img class="img-fluid" src="<?php echo $thumbnail ?>" alt="">
						</div>
						<div class="blog-detail">
							<div class="entry-meta mb-10">
								<ul class="list-unstyled">
									<li><a href="#"><i class="fa fa-folder-open-o"></i><?php echo $blog['category']; ?></a></li>
									<li><a href="#"><i class="fa fa-heart-o"></i><?php echo $blog['likes']; ?></a></li>
									<li><a href="#"><i class="fa fa-calendar-o"></i><?php echo date("Y-m-d",strtotime($blog['dtime'])) ?></a></li>
								</ul>
							</div>
							<hr>
							<div class="entry-title mb-10">
								<a href="#" class="font-size-24"><?php echo ucfirst($title); ?></a>
							</div>
							<div class="entry-content">
								<p style="font-size: 17px;"><?php echo $blog['content'] ?></p>
							</div>


							  <div class="mt-45 pb-15 mb-25 bb-1"></div>
							  <div class="row justify-content-center">
								<span class="px-40"><i class="fa fa-thumbs-up fa-2x text-danger mr-2"></i><strong>0</strong></span>
								<span class="px-40"><i class="fa fa-thumbs-down fa-2x text-dark mr-2"></i><strong>0</strong></span>
							  </div>
							  	
						</div>
					</div>
					<div class="box">
						<div class="box-body">							
							<div class="widget">
								<h4 class="mt-0 pb-15 mb-25 bb-1">TAGS</h4>
								<div class="widget-tags">
									<ul class="list-unstyled">
										<?php 
											if ($blog['tags'] != null) {
												$tags = $user->split($blog['tags'], ',');
												foreach ($tags as $tag) {
													echo '<li class="mr-1"><a href="#">'.strtoupper($tag).'</a></li>';
												}
											}
										?>
									</ul>
								</div>								
							</div>
						</div>
					</div>
					<div class="box">
						<div class="box-body">							
						  <div class="widget">
								<h4 class="mt-0 pb-15 mb-25 bb-1">Related Post</h4>
								<div class="tab-pane" id="tab2" role="tabpanel">
									<div class="px-15 pt-15">
										<div class="row">
											<?php
												$category = $blog['category'];
												$user->query("SELECT id, thumbnail, dtime, content FROM blog WHERE id != '$blog_id' AND category LIKE '%$category%' LIMIT 3");
												if (!$user->fetchAll()) {
													
													$user->query("SELECT id, thumbnail, dtime, title FROM blog WHERE id != '$blog_id' ORDER BY likes DESC LIMIT 3");
													$row = $user->fetchAll();
												}else{
													$row = $user->fetchAll();
												}

												foreach ($row as $blog) {

													if (strpos($blog['thumbnail'], 'https') !== false) {
														$thumbnail = $blog['thumbnail'];
													}else{
														$thumbnail = '../admin/assets/rooms/'.$blog['thumbnail'];
													}
													?>

													<div class="col-lg-4 col-md-6 col-12">
												<div class="box">
													<a href="blog_details?rblog=<?php echo $blog['id'] ?>">
														<img class="card-img-top" src="<?php echo $thumbnail ?>" alt="Card image cap">
													</a>
													<div class="box-body"> 
														<div class="text-left">
															<a href="blog_details?rblog=<?php echo $blog['id'] ?>"><p class="mb-10 text-light font-size-12"><i class="fa fa-calendar mr-5"></i> <?php echo $blog['dtime']; ?></p>
															<p class="box-text"><?php echo $blog['title'] ?>...</p></a>
														</div>
													</div>
												</div>
											</div>

													<?php
												}
											?>
										</div>
									</div>

								</div>
							</div>
						</div>


					<!-- Leave a reply -->

					<div class="box">
						<div class="box-body">							
						  	<div class="widget">
								<h4 class="mt-0 pb-15 mb-25 bb-1">Leave a Reply</h4>
								<form id="contactform" class="form-row">
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<input type="email" class="form-control" placeholder="Website URL">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<input type="email" class="form-control" placeholder="Your Name">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<input type="email" class="form-control" placeholder="Email Adress">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<input type="email" class="form-control" placeholder="Phone Number">
										</div>
									</div>
									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<textarea class="form-control" rows="7" placeholder="message"></textarea>
										</div>
									</div>

									<div class="col-lg-12 col-md-12">
										<button name="submit" type="submit" value="Send" class="btn btn-primary"><span>Submit Now</span></button>
									</div>
								</form>							
						  	</div>
						</div>
					</div>
					

					<div class="box">
						<div class="box-body">
							<div class="blog-comment">
								<h4 class="mt-0 pb-15 mb-25 bb-1">04 Comments</h4>
								<div class="comment-1">
									<div class="comment-photo">
										<img class="img-fluid" src="../images/front-end-img/avatar/1.jpg" alt="">
									</div>
									<div class="comment-info">
										<h4 class="theme-color"> Kevin Martin <span>Sep 15, 2020</span></h4>
										<div class="port-post-social float-right">
											<a href="#">Reply</a>
										</div>
										<p>Sit amet nibh vulputate cursus a sit amet mauris lorem ipsum dolor sit amet of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio <a href="#">http://themeforest.net</a> Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat </p>
									</div>
								</div>
								<div class="comment-1 comment-2">
									<div class="comment-photo">
										<img class="img-fluid" src="../images/front-end-img/avatar/2.jpg" alt="">
									</div>
									<div class="comment-info">
										<h4 class="theme-color"> Kevin Martin <span>Sep 15, 2020</span></h4>
										<div class="port-post-social float-right">
											<a href="#">Reply</a>
										</div>
										<p>Vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor Lorem ipsum dolor sit amet of Lorem Ipsum. Proin gravida nibh..</p>
									</div>
								</div>
								<div class="comment-1 comment-2">
									<div class="comment-photo">
										<img class="img-fluid" src="../images/front-end-img/avatar/3.jpg" alt="">
									</div>
									<div class="comment-info">
										<h4 class="theme-color"> Kevin Martin <span>Sep 15, 2020</span></h4>
										<div class="port-post-social float-right">
											<a href="#">Reply</a>
										</div>
										<p>Aenean sollicitudin, lorem quis bibendum auctor Lorem ipsum dolor sit amet of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet..</p>
									</div>
								</div>
								<div class="comment-1">
									<div class="comment-photo">
										<img class="img-fluid" src="../images/front-end-img/avatar/4.jpg" alt="">
									</div>
									<div class="comment-info">
										<h4 class="theme-color"> Kevin Martin <span>Sep 15, 2020</span></h4>
										<div class="port-post-social float-right">
											<a href="#">Reply</a>
										</div>
										<p>Bibendum auctor Lorem ipsum dolor sit amet of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris <a href="#">http://themeforest.net</a> Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat </p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
				<div class="col-lg-3 col-md-4 col-12">
					<div class="side-block px-20 py-10 bg-white">
						<div class="widget courses-search-bx placeholdertx mb-10">
							<div class="form-group">
								<div class="input-group">
									<label>Search...</label>
									<input name="name" type="text" required="" class="form-control">
								</div>
							</div>
						</div>	
						<div class="widget clearfix">
							<h4 class="pb-15 mb-15 bb-1">Categories</h4>
							<div class="media-list media-list-divided">
								<a class="px-0 media media-single" href="#">
								  <span class="title ml-0">Biology Course </span>
								  <span class="mx-0 badge badge-secondary-light">125</span>
								</a>

								<a class="px-0 media media-single" href="#">
								  <span class="title ml-0">Contemporary Art</span>
								  <span class="mx-0 badge badge-primary-light">124</span>
								</a>

								<a class="px-0 media media-single" href="#">
								  <span class="title ml-0">Elizabethan Theater</span>
								  <span class="mx-0 badge badge-info-light">425</span>
								</a>

								<a class="px-0 media media-single" href="#">
								  <span class="title ml-0">Geometry Course</span>
								  <span class="mx-0 badge badge-success-light">321</span>
								</a>

								<a class="px-0 media media-single" href="#">
								  <span class="title ml-0">Informatic Course</span>
								  <span class="mx-0 badge badge-danger-light">159</span>
								</a>

								<a class="px-0 media media-single" href="#">
								  <span class="title ml-0">Live Drawing</span>
								  <span class="mx-0 badge badge-warning-light">452</span>
								</a>
							  </div>
						</div>
						<div class="widget clearfix">
							<h4 class="pb-15 mb-25 bb-1">Archives</h4>
							<ul class="list list-unstyled">
								<li><a href="#"><i class="fa fa-angle-double-right"></i> November 2020</a></li>
								<li><a href="#"><i class="fa fa-angle-double-right"></i> October 2020</a></li>
								<li><a href="#"><i class="fa fa-angle-double-right"></i> September 2020</a></li>
								<li><a href="#"><i class="fa fa-angle-double-right"></i> August 2020</a></li>
								<li><a href="#"><i class="fa fa-angle-double-right"></i> July 2020</a></li>
							</ul>
						</div>
						<div class="widget">
							<h4 class="pb-15 mb-25 bb-1">Tags</h4>
							<div class="widget-tags">
								<ul class="list-unstyled">
									<li><a href="#">Bootstrap</a></li>
									<li><a href="#">HTML5</a></li>
									<li><a href="#">Wordpress</a></li>
									<li><a href="#">CSS3</a></li>
									<li><a href="#">Creative</a></li>
									<li><a href="#">Multipurpose</a></li>
									<li><a href="#">Bootstrap</a></li>
									<li><a href="#">HTML5</a></li>
									<li><a href="#">Wordpress</a></li>
								</ul>
							</div>
						</div>

						<!-- Recent Post -->
						<div class="widget">
							<h4 class="pb-15 mb-25 bb-1">Recent Posts </h4>
							<div class="recent-post clearfix">
								<div class="recent-post-image">
									<img class="img-fluid bg-primary-light" src="../images/front-end-img/courses/cor-logo-1.png" alt="">
								</div>
								<div class="recent-post-info">
									<a href="#">Curabitur id scelerisque diam. Pellentesque ut lectus arcu.</a>
									<span><i class="fa fa-calendar-o"></i> September 30, 2020</span>
								</div>
							</div>
							<div class="recent-post clearfix">
								<div class="recent-post-image">
									<img class="img-fluid bg-primary-light" src="../images/front-end-img/courses/cor-logo-5.png" alt="">
								</div>
								<div class="recent-post-info">
									<a href="#">Curabitur id scelerisque diam. Pellentesque ut lectus arcu.</a>
									<span><i class="fa fa-calendar-o"></i> September 30, 2020</span>
								</div>
							</div>
							<div class="recent-post clearfix">
								<div class="recent-post-image">
									<img class="img-fluid bg-primary-light" src="../images/front-end-img/courses/cor-logo-4.png" alt="">
								</div>
								<div class="recent-post-info">
									<a href="#">Curabitur id scelerisque diam. Pellentesque ut lectus arcu.</a>
									<span><i class="fa fa-calendar-o"></i> September 30, 2020</span>
								</div>
							</div>
						</div>


						<div class="widget">
							<h4 class="pb-15 mb-25 bb-1">Newsletter</h4>
							<div class="widget-newsletter">
								<div class="newsletter-icon">
									<i class="fa fa-envelope-o"></i>
								</div>
								<div class="newsletter-content">
									<i>Fusce tincidunt, metus at dignissim fringilla, lorem velit posuere mi, sed pretium turpis leo ac metus. Aenean sit amet sapien eget eros </i>
								</div>
								<div class="newsletter-form mt-20">
									<div class="form-group">
										<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Name">
									</div>
									<a class="btn btn-primary btn-block" href="#">Submit</a>
								</div>
							</div>
						</div>


						<div class="widget">
							<h4 class="pb-15 mb-25 bb-1">Testimonials</h4>
							<div class="owl-carousel" data-nav-dots="false" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
								<div class="item">
									<div class="testimonial-widget">
										<div class="testimonial-content">
											<p>In odio metus, porta vitae neque vitae, faucibus viverra orci. Quisque in lorem aliquam, ullamcorper turpis a, aliquam dui. In accumsan aliquam viverra.</p>
										</div>
										<div class="testimonial-info mt-20">
											<div class="testimonial-avtar">
												<img class="img-fluid" src="../images/front-end-img/avatar/1.jpg" alt="">
											</div>
											<div class="testimonial-name">
												<strong>Johen Doe</strong>
												<span>Project Manager</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="testimonial-widget">
										<div class="testimonial-content">
											<p>Morbi condimentum leo eu lacinia accumsan. Phasellus cursus rhoncus elit, mattis convallis sapien efficitur non phasellus et erat sapien phasellus. </p>
										</div>
										<div class="testimonial-info mt-20">
											<div class="testimonial-avtar">
												<img class="img-fluid" src="../images/front-end-img/avatar/2.jpg" alt="">
											</div>
											<div class="testimonial-name">
												<strong>Johen Doe</strong>
												<span>Design</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="testimonial-widget">
										<div class="testimonial-content">
											<p>In odio metus, porta vitae neque vitae, faucibus viverra orci. Quisque in lorem aliquam, ullamcorper turpis a, aliquam dui. In accumsan aliquam viverra.</p>
										</div>
										<div class="testimonial-info mt-20">
											<div class="testimonial-avtar">
												<img class="img-fluid" src="../images/front-end-img/avatar/3.jpg" alt="">
											</div>
											<div class="testimonial-name">
												<strong>Johen Doe</strong>
												<span>Project Manager</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="testimonial-widget">
										<div class="testimonial-content">
											<p>Morbi condimentum leo eu lacinia accumsan. Phasellus cursus rhoncus elit, mattis convallis sapien efficitur non phasellus et erat sapien phasellus. </p>
										</div>
										<div class="testimonial-info mt-20">
											<div class="testimonial-avtar">
												<img class="img-fluid" src="../images/front-end-img/avatar/4.jpg" alt="">
											</div>
											<div class="testimonial-name">
												<strong>Johen Doe</strong>
												<span>Design</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="widget mb-10">
							<h4 class="pb-15 mb-25 bb-1">Quick contact</h4>
							<form class="gray-form">
								<div class="form-group">
									<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Name">
								</div>
								<div class="form-group">
									<input type="email" class="form-control" id="exampleInputphone" placeholder="Email">
								</div>

								<div class="form-group">
									<textarea class="form-control" rows="4" placeholder="message"></textarea>
								</div>
								<a class="btn btn-primary btn-block" href="#">Submit</a>
							</form>
						</div>	
					</div>
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
	<script src="../assets/vendor_components/OwlCarousel2/dist/owl.carousel.js"></script>
	
	<!-- EduAdmin front end -->
	<script src="js/template.js"></script>
	<script src="js/pages/widget.js"></script>
	
	
	
</body>
</html>
