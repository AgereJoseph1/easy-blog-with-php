<?php
    include '../../admin/main/class/class.user.php';
    $user = new USER();

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

    <title>EduAdmin - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/skin_color.css">
    <style>img[alt="www.000webhost.com"]{display:none;}</style>
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
						<h2 class="page-title text-white">All articles</h2>
						<ol class="breadcrumb bg-transparent justify-content-center">
							<li class="breadcrumb-item"><a href="#" class="text-white-50"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">Easy-Blogging</li>
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
				<div class="col-12">
					<h2>Trending Articles</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<?php
					$user->query("SELECT * FROM blog ORDER BY likes");
					if ($user->fetchAll()) {
						foreach ($user->fetchAll() as $blog) {
							if (strpos($blog['thumbnail'], 'https') !== false) {
								$thumbnail = $blog['thumbnail'];
							}else{
								$thumbnail = '../../admin/assets/blog/'.$blog['thumbnail'];
							}
							?>

							<div class="col-md-4 col-12">
								<div class="blog-post">
									<a href="blog_details.php?rblog=<?php echo $blog['id']; ?>"><div class="entry-image clearfix">
										<img class="img-fluid" src="<?php echo $thumbnail; ?>" alt="">
									</div></a>
									<div class="blog-detail">
										<div class="entry-title mb-10 d-flex justify-content-between align-items-center">
											<a href="#"><?php echo ucfirst($blog['title']) ?></a>
											<span class=""><i class="fa fa-heart-o mr-2"></i> <?php echo $blog['likes']; ?></span>
										</div>
										<div class="entry-meta mb-10">
											<ul class="list-unstyled">
												<li><a href="#"><i class="fa fa-folder-open-o"></i> <?php echo $blog['category']; ?></a></li>
												<li><a href="#"><i class="fa fa-comment-o"></i> 0</a></li>
												<li><a href="#"><i class="fa fa-calendar-o"></i> <?php echo $blog['dtime']; ?></a></li>
											</ul>
										</div>
										<div class="entry-content">
											<p><?php echo substr($blog['content'],0,120); ?> ...</p>
										</div>
										<div class="entry-share d-flex justify-content-between align-items-center">
											<div class="entry-button">
												<a href="blog_details.php?rblog=<?php echo $blog['id']; ?>" class="btn btn-primary btn-sm">Read more</a>
											</div>
											<div class="social">
												<strong>Share : </strong>
												<ul class="list-unstyled">
													<li>
														<a href="#"> <i class="fa fa-facebook"></i> </a>
													</li>
													<li>
														<a href="#"> <i class="fa fa-twitter"></i> </a>
													</li>
													<li>
														<a href="#"> <i class="fa fa-pinterest-p"></i> </a>
													</li>
													<li>
														<a href="#"> <i class="fa fa-dribbble"></i> </a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>

						<?php
						}
					}else{
						echo "<h3>No Data in our record</h3>";
					}
				?>
			</div>
		</div>
	</section>	
	
	<section class="py-50">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2>All Time Articles</h2>
					<hr>
				</div>
			</div>
			<div class="row">	
				<div class="col-lg-9 col-md-8 col-12">
					<div class="row">
						
							<div class="col-md-6 col-12">
								<div class="blog-post">
									<div class="entry-image clearfix">
										<img class="img-fluid" src="../images/front-end-img/courses/1f.jpg" alt="">
									</div>
									<div class="blog-detail">
										<div class="entry-title mb-10 d-flex justify-content-between align-items-center">
											<a href="#">this is my first blog</a>
											<span class=""><i class="fa fa-heart-o mr-2"></i> 0</span>
										</div>
										<div class="entry-meta mb-10">
											<ul class="list-unstyled">
												<li><a href="#"><i class="fa fa-folder-open-o"></i> IT Software</a></li>
												<li><a href="#"><i class="fa fa-comment-o"></i> 0</a></li>
												<li><a href="#"><i class="fa fa-calendar-o"></i> 2021-05-15 12:20:04</a></li>
											</ul>
										</div>
										<div class="entry-content">
											<p>lorem ipsum is the text here ...</p>
										</div>
										<div class="entry-share d-flex justify-content-between align-items-center">
											<div class="entry-button">
												<a href="blog_details.php?rblog=1" class="btn btn-primary btn-sm">Read more</a>
											</div>
											<div class="social">
												<strong>Share : </strong>
												<ul class="list-unstyled">
													<li>
														<a href="#"> <i class="fa fa-facebook"></i> </a>
													</li>
													<li>
														<a href="#"> <i class="fa fa-twitter"></i> </a>
													</li>
													<li>
														<a href="#"> <i class="fa fa-pinterest-p"></i> </a>
													</li>
													<li>
														<a href="#"> <i class="fa fa-dribbble"></i> </a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>

							
							<div class="col-md-6 col-12">
								<div class="blog-post">
									<div class="entry-image clearfix">
										<img class="img-fluid" src="https://i.natgeofe.com/n/f0dccaca-174b-48a5-b944-9bcddf913645/01-cat-questions-nationalgeographic_1228126.jpg" alt="">
									</div>
									<div class="blog-detail">
										<div class="entry-title mb-10 d-flex justify-content-between align-items-center">
											<a href="#">My cat is a good cat</a>
											<span class=""><i class="fa fa-heart-o mr-2"></i> 0</span>
										</div>
										<div class="entry-meta mb-10">
											<ul class="list-unstyled">
												<li><a href="#"><i class="fa fa-folder-open-o"></i> It Hardware</a></li>
												<li><a href="#"><i class="fa fa-comment-o"></i> 0</a></li>
												<li><a href="#"><i class="fa fa-calendar-o"></i> 2021-05-15 12:29:15</a></li>
											</ul>
										</div>
										<div class="entry-content">
											<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem voluptatem, soluta ...</p>
										</div>
										<div class="entry-share d-flex justify-content-between align-items-center">
											<div class="entry-button">
												<a href="blog_details.php?rblog=2" class="btn btn-primary btn-sm">Read more</a>
											</div>
											<div class="social">
												<strong>Share : </strong>
												<ul class="list-unstyled">
													<li>
														<a href="#"> <i class="fa fa-facebook"></i> </a>
													</li>
													<li>
														<a href="#"> <i class="fa fa-twitter"></i> </a>
													</li>
													<li>
														<a href="#"> <i class="fa fa-pinterest-p"></i> </a>
													</li>
													<li>
														<a href="#"> <i class="fa fa-dribbble"></i> </a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>

							
					</div>

					<!-- Pagination -->
					<div aria-label="Page navigation example">
					  <ul class="pagination mb-0">
						<li class="page-item"><a class="page-link" href="#">Previous</a></li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">Next</a></li>
					  </ul>
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
