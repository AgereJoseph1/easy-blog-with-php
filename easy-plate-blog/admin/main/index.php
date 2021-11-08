<?php
	include './class/class.user.php';
    $user = new USER();

    if(!$user->isLogedin()){
        $user->redirect("../../frontend/front-end/login.php");
        exit();
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

    <title>EduAdmin - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/skin_color.css">
     
  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
	<!-- <div id="loader"></div> -->
	
  <?php 
  	include 'inc/header.php';
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xl-8">														
					<div class="box no-shadow mb-0 bg-transparent">
						<div class="box-header no-border px-0">
							<h4 class="box-title">Date: <div class="badge badge-primary-light"><?php echo date("Y-m-d",strtotime($user->get_date("today"))) ?></div></h4>				
							<?php echo $user->get_alert(); ?>
							<div class="box-controls pull-right d-md-flex d-none">
								<?php
									$user->query("SELECT subscription_type FROM users WHERE id =".$user->sessionID());
									if ($user->fetchOne()['subscription_type'] == 'free') {
										echo '
											<a data-toggle="modal" data-target="#viewAnalytics" href="javascript:void(0)">View All</a>
										';
									}else{
										echo '
											<a href="posts.php">View All</a>
										';
									}
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-4 col-12">
							<div class="box box-body">
							  <h6 class="text-uppercase">Total Views</h6>
							  <div class="flexbox mt-2">
								<span class="fa fa-eye font-size-40"></span>
								<span class=" font-size-30">
								<?php
								$user->query("SELECT views FROM blog WHERE user_id = ".$user->sessionID());
								if ($user->fetchAll()) {
									$views = 0;
									foreach ($user->fetchAll() as $view) {
										$views = $views + intval($view['views']);
									}
									echo $views;
								}else{
									echo "0";
								}
								?>
								</span>
							  </div>
							</div>
						</div>
						<div class="col-xl-4 col-12">
							<div class="box box-body">
							  <h6 class="text-uppercase">Total likes</h6>
							  <div class="flexbox mt-2">
								<span class="icon-Heart text-danger font-size-40"></span>
								<span class=" font-size-30">
									<?php
									$user->query("SELECT likes FROM blog WHERE user_id = ".$user->sessionID());
									if ($user->fetchAll()) {
										$likes = 0;
										foreach ($user->fetchAll() as $like) {
											$likes = intval($likes + intval($like['likes']));
										}
										echo $likes;
									}else{
										echo "0";
									}
									?>
								</span>
							  </div>
							</div>
						</div>
						<div class="col-xl-4 col-12">
							<div class="box box-body">
							  <h6 class="text-uppercase">All Dislikes</h6>
							  <div class="flexbox mt-2">
								<span class="fa fa-frown-o font-size-40"><span class="path1"></span><span class="path2"></span></span>
								<span class=" font-size-30">
									<?php
										$user->query("SELECT dislikes FROM blog WHERE user_id = ".$user->sessionID());
										if ($user->fetchAll()) {
											$dislikes = 0;
											foreach ($user->fetchAll() as $dislike) {
												$dislikes = $dislikes + intval($dislike['dislikes']);
											}
											echo $dislikes;
										}else{
											echo "0";
										}
									?>
								</span>
							  </div>
							</div>
						</div>


					<!-- potential message -->

					<div class="col-lg-12 col-12 my-25">
						<div class="box pull-up">
							<div class="box-body bg-img" style="background-image: url(../images/bg-5.png);" data-overlay-light="9">
								<div class="d-lg-flex align-items-center justify-content-between">
									<div class="d-md-flex align-items-center mb-30 mb-lg-0 w-p100">
										<img src="https://www.multipurposethemes.com/admin/eduadmin-template/images/svg-icon/color-svg/custom-14.svg" class="img-fluid max-w-150" alt="" />
										<div class="ml-30">
											<h4 class="mb-10">Take A Tour Through Easy-plate for Effective Bogging !</h4>
											<p class="mb-0 text-fade">It is a long established fact that a reader will be distracted <br>of a page when looking at its layout. </p>
										</div>
									</div>
									<div>
										<button type="button" class="waves-effect waves-light btn-block btn btn-primary" style="white-space: nowrap;">Start Now!</button>
									</div>
								</div>							
							</div>
						</div>
					</div>


<!------------------------  -	Displays last 4 post from user 	------------------------>
				<?php
					$user->query("SELECT * FROM blog WHERE user_id = ".$user->sessionId()." LIMIT 4");
					if ($user->fetchAll()) {
						?>

						<div class="col-12">
							<div class="box no-shadow mb-0 bg-transparent">
								<div class="box-header no-border px-0">
									<h4 class="box-title">Recent post</h4>	
									<ul class="box-controls pull-right d-md-flex d-none">
									  <li>
										<button class="btn btn-primary-light px-10"><a href="posts.php">View All</a></button>
									  </li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-12">
							<?php
								foreach ($user->fetchAll() as $blog) {
									if (strpos($blog['thumbnail'], 'https') !== false) {
										$thumbnail = $blog['thumbnail'];
									}else{
										$thumbnail = '../../admin/assets/blog/'.$blog['thumbnail'];
									}
									?>
										<div class="col-12">
											<div class="media bg-white mb-20 d-block d-md-flex">
											  <div class="w-100">
												<img class="avatar avatar-lg w-100 h-75" src="<?php echo $thumbnail ?>" alt="">
											  </div>
											  <div class="media-body">
												<p><strong><?php echo $blog['title'] ?></strong></p>
												<p class="text-muted"><?php echo substr($blog['content'],0,150) ?><span class="text-muted"> ...</span></p>

												<ul class="list-inline mt-10">
													<li><a href="#" class="text-primary mr-md-4 pr-md-4"><span class="fa fa-commenting-o mr-2"></span> 12</a></li> 
													<li><a href="#" class="text-primary"> <span class="fa fa-heart-o mr-2"></span> <?php echo $blog['likes'] ?></a></li>
													<li class="pull-right">
														<a href="edit_post.php?post_id=<?php echo $blog['id'] ?>"><button type="button" class="btn btn-box-tool btn-sm btn-rounded" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-pencil"></i></button></a>
														<a class="postDel" href="action/user.action.php?delpost=<?php echo $blog['id'] ?>"><button type="button" class="btn btn-box-tool btn-sm btn-rounded" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fa fa-trash"></i></button></a>
													</li>
												</ul>						

											  </div>
											</div>				
										</div>
									<?php
								}
							?>
						</div>
								<?php
							}
						?>
					</div>
					<br><br>
					<div class="row">
						<div class="col-lg-6 col-12">
							<a href="#" class="box bg-danger bg-hover-danger pull-up">
								<div class="box-body">
									<div class="d-flex align-items-center">
										<div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center">
											<span class="text-white icon-Cart2 font-size-40"><span class="path1"></span><span class="path2"></span></span>
										</div>
										<div class="ml-10">
											<h4 class="text-white mb-0">+233 059 291 4060</h4>
											<h5 class="text-white-50 mb-0">Toll Free For Support</h5>
										</div>
									</div>							
								</div>
							</a>
						</div>
						<div class="col-lg-6 col-12">
							<a href="#" class="box bg-primary bg-hover-primary pull-up">
								<div class="box-body">
									<div class="d-flex align-items-center">
										<div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center">
											<span class="text-white icon-Mail font-size-40"></span>
										</div>
										<div class="ml-10">
											<h4 class="text-white mb-0">devfreak235@gmail.com</h4>
											<h5 class="text-white-50 mb-0">Feel Free to Email Us</h5>
										</div>
									</div>							
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-12">
					<div class="box no-shadow mb-0 bg-transparent">
						<div class="box-header no-border px-0">
							<h4 class="box-title"></h4>							
							<div class="box-controls pull-right d-md-flex d-none">
							  <a href="#"></a>
							</div>
						</div>
					</div>
					<div>
						<div class="col-xl-12 col-12">
						  <div class="info-box box-inverse bg-img" style="background-image: url(../images/gallery/creative/img-10.jpg);" data-overlay="5">
							<span class="info-box-icon push-bottom rounded"><span class="icon-Chart-line font-size-50 mr-10"><span class="path1"></span><span class="path2"></span></span></span>

							<div class="info-box-content">
							  <span class="info-box-text">Followers</span>
							  <span class="info-box-number">55,005</span>

							  <div class="progress">
								<div class="progress-bar" style="width: 85%"></div>
							  </div>
							  <span class="progress-description">
									85% Increase in 28 Days
								  </span>
							</div>
							<!-- /.info-box-content -->
						  </div>
						  <!-- /.info-box -->
						</div>

					<!-- Total Number of Posts -->
						<div class="col-xl-12 col-12">
						  <!-- small box -->
						  <div class="small-box box-inverse bg-img" style="background-image: url(../images/gallery/thumb/7.jpg);" data-overlay="5">
							<div class="inner">
							  <h3>
							  	<?php
							  		$user->query("SELECT COUNT(id) as id FROM blog WHERE user_id =".$user->sessionID());
							  		echo $user->fetchOne()['id'];
							  	?>
							  </h3>

							  <p>Total Posts</p>
							</div>
							<div class="icon text-white">
							  <span class="icon-Equalizer"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
							</div>
							<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-right"></i></a>
						  </div>
						</div>
						<div class="box">
							<div class="box-header">
								<h4 class="box-title">New Activity</h4>
							</div>
							<div class="box-body">
								<div class="act-div">
									<div class="bg-gray-100 p-15 rounded10 mb-20">
										<div>
											<span class="badge badge-sm badge-dot badge-warning mr-5"></span>
											Fuzzy Logic
										</div>
										<h4 class="my-20">Dont forget to submit the task!</h4>
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center">
												<img src="../images/avatar/1.jpg" class="avatar avatar-sm mr-10 avatar-pill">
												<p class="text-fade font-size-12 mb-0">Johen doe</p>
											</div>
											<p class="text-fade font-size-12 mb-0">08 Nov 2020</p>
										</div>
									</div>
									<div class="bg-gray-100 p-15 rounded10 mb-20">
										<div>
											<span class="badge badge-sm badge-dot badge-primary mr-5"></span>
											Biometric
										</div>
										<h4 class="my-20">Explain what do you know about<br> Biometric! (&gt;100 words)</h4>
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center">
												<img src="../images/avatar/2.jpg" class="avatar avatar-sm mr-10 avatar-pill">
												<p class="text-fade font-size-12 mb-0">Mical doe</p>
											</div>
											<p class="text-fade font-size-12 mb-0">08 Nov 2020</p>
										</div>
									</div>
									<div class="bg-gray-100 p-15 rounded10 mb-20">
										<div>
											<span class="badge badge-sm badge-dot badge-warning mr-5"></span>
											Fuzzy Logic
										</div>
										<h4 class="my-20">Dont forget to submit the task!</h4>
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center">
												<img src="../images/avatar/1.jpg" class="avatar avatar-sm mr-10 avatar-pill">
												<p class="text-fade font-size-12 mb-0">Johen doe</p>
											</div>
											<p class="text-fade font-size-12 mb-0">08 Nov 2020</p>
										</div>
									</div>
									<div class="bg-gray-100 p-15 rounded10">
										<div>
											<span class="badge badge-sm badge-dot badge-primary mr-5"></span>
											Biometric
										</div>
										<h4 class="my-20">Explain what do you know about Biometric! (&gt;100 words)</h4>
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center">
												<img src="../images/avatar/2.jpg" class="avatar avatar-sm mr-10 avatar-pill">
												<p class="text-fade font-size-12 mb-0">Mical doe</p>
											</div>
											<p class="text-fade font-size-12 mb-0">08 Nov 2020</p>
										</div>
									</div>									
								</div>
							</div>
							<div class="box-footer text-center p-0">
								<a href="#" class="btn btn-block btn-primary-light">View all</a>
							</div>
						</div>

						
					</div>						
					<div class="box no-shadow mb-0 bg-transparent">
						<div class="box-header no-border px-0">
							<h4 class="box-title">Scheduled Task</h4>							
							<div class="box-controls pull-right d-md-flex d-none">
							  <a href="#">View All</a>
							</div>
						</div>
					</div>
					<div>
						<div class="box mb-15 pull-up">
							<div class="box-body">
								<div class="d-flex align-items-center justify-content-between">
									<div class="d-flex align-items-center">
										<div class="mr-15 bg-warning-light h-50 w-50 l-h-60 rounded text-center">
											<span class="icon-Book-open font-size-24"><span class="path1"></span><span class="path2"></span></span>
										</div>
										<div class="d-flex flex-column font-weight-500">
											<a href="#" class="text-dark hover-primary mb-1 font-size-16">Read on effective blogging</a>
											<span class="text-fade">Eula kelly, 6 May</span>
										</div>
									</div>
									<a href="#">
										<span class="icon-Arrow-right font-size-24"><span class="path1"></span><span class="path2"></span></span>
									</a>
								</div>
							</div>
						</div>
						<div class="box mb-15 pull-up">
							<div class="box-body">
								<div class="d-flex align-items-center justify-content-between">
									<div class="d-flex align-items-center">
										<div class="mr-15 bg-primary-light h-50 w-50 l-h-60 rounded text-center">
											<span class="icon-Mail font-size-24"></span>
										</div>
										<div class="d-flex flex-column font-weight-500">
											<a href="#" class="text-dark hover-primary mb-1 font-size-16">Send Email to Subscribers</a>
											<span class="text-fade">Oilve Garza, 4 May</span>
										</div>
									</div>
									<a href="#">
										<span class="icon-Arrow-right font-size-24"><span class="path1"></span><span class="path2"></span></span>
									</a>
								</div>
							</div>
						</div>
						<div class="box mb-10 pull-up">
							<div class="box-body">
								<div class="d-flex align-items-center justify-content-between">
									<div class="d-flex align-items-center">
										<div class="mr-15 bg-danger-light h-50 w-50 l-h-60 rounded text-center">
											<span class="icon-Book-open font-size-24"><span class="path1"></span><span class="path2"></span></span>
										</div>
										<div class="d-flex flex-column font-weight-500">
											<a href="#" class="text-dark hover-primary mb-1 font-size-16">Study for Finals</a>
											<span class="text-fade">Franklin Harvey, 2 May</span>
										</div>
									</div>
									<a href="#">
										<span class="icon-Arrow-right font-size-24"><span class="path1"></span><span class="path2"></span></span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Contact View -->
          <div class="modal fade" id="viewAnalytics" tabindex="-1">
            <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title">View All Analytics</h5>
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                  <div class="box">
                  <!-- /.box-header -->
                  <table class="table">
                    
                          <tr>
                          <td><a href="../frontend/subscription.php" class="btn btn-primary col-12"><span class="fa fa-lock mr-3"></span>Subscribe to Premium</a></td></tr>
                                          </table>
                  </div>
                  <!-- /.box -->  
              </div>
            </div>
            </div>
          </div>
          <!-- /.modal -->

		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">FAQ</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Purchase Now</a>
		  </li>
		</ul>
    </div>
	  &copy; 2020 <a href="javascript:void(0);">Multipurpose Themes</a>. All Rights Reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar">
	  
	<div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>  <!-- Create the tabs -->
    <ul class="nav nav-tabs control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab" class="active"><i class="mdi mdi-message-text"></i></a></li>
      <li class="nav-item"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="mdi mdi-playlist-check"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>	
			<p>Users</p>
			<a href="javascript:void(0)" class="text-right text-grey"><i class="ti-plus"></i></a>
		  </div>
		  <div class="lookup lookup-sm lookup-right d-none d-lg-block">
			<input type="text" name="s" placeholder="Search" class="w-p100">
		  </div>
          <div class="media-list media-list-hover mt-20">
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="../images/avatar/1.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="../images/avatar/2.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="../images/avatar/3.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="../images/avatar/4.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>			
			
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="../images/avatar/1.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="../images/avatar/2.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="../images/avatar/3.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="../images/avatar/4.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>
			  
		  </div>

      </div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>	
			<p>Todo List</p>
			<a href="javascript:void(0)" class="text-right text-grey"><i class="ti-plus"></i></a>
		  </div>
        <ul class="todo-list mt-20">
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_1" class="filled-in">
			  <label for="basic_checkbox_1" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_2" class="filled-in">
			  <label for="basic_checkbox_2" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_3" class="filled-in">
			  <label for="basic_checkbox_3" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_4" class="filled-in">
			  <label for="basic_checkbox_4" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_5" class="filled-in">
			  <label for="basic_checkbox_5" class="mb-0 h-15"></label>
			  <span class="text-line">Maecenas scelerisque</span>
			  <small class="badge bg-primary"><i class="fa fa-clock-o"></i> 1 week</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_6" class="filled-in">
			  <label for="basic_checkbox_6" class="mb-0 h-15"></label>
			  <span class="text-line">Vivamus nec orci</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 1 month</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_7" class="filled-in">
			  <label for="basic_checkbox_7" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_8" class="filled-in">
			  <label for="basic_checkbox_8" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_9" class="filled-in">
			  <label for="basic_checkbox_9" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_10" class="filled-in">
			  <label for="basic_checkbox_10" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
		  </ul>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->

	<div id="chat-box-body">
		<div id="chat-circle" class="waves-effect waves-circle btn btn-circle btn-lg btn-warning l-h-70">
            <div id="chat-overlay"></div>
            <span class="icon-Group-chat font-size-30"><span class="path1"></span><span class="path2"></span></span>
		</div>

		<div class="chat-box">
            <div class="chat-box-header p-15 d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button class="waves-effect waves-circle btn btn-circle btn-primary-light h-40 w-40 rounded-circle l-h-45" type="button" data-toggle="dropdown">
                      <span class="icon-Add-user font-size-22"><span class="path1"></span><span class="path2"></span></span>
                  </button>
                  <div class="dropdown-menu min-w-200">
                    <a class="dropdown-item font-size-16" href="#">
                        <span class="icon-Color mr-15"></span>
                        New Group</a>
                    <a class="dropdown-item font-size-16" href="#">
                        <span class="icon-Clipboard mr-15"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                        Contacts</a>
                    <a class="dropdown-item font-size-16" href="#">
                        <span class="icon-Group mr-15"><span class="path1"></span><span class="path2"></span></span>
                        Groups</a>
                    <a class="dropdown-item font-size-16" href="#">
                        <span class="icon-Active-call mr-15"><span class="path1"></span><span class="path2"></span></span>
                        Calls</a>
                    <a class="dropdown-item font-size-16" href="#">
                        <span class="icon-Settings1 mr-15"><span class="path1"></span><span class="path2"></span></span>
                        Settings</a>
                    <div class="dropdown-divider"></div>
					<a class="dropdown-item font-size-16" href="#">
                        <span class="icon-Question-circle mr-15"><span class="path1"></span><span class="path2"></span></span>
                        Help</a>
					<a class="dropdown-item font-size-16" href="#">
                        <span class="icon-Notifications mr-15"><span class="path1"></span><span class="path2"></span></span> 
                        Privacy</a>
                  </div>
                </div>
                <div class="text-center flex-grow-1">
                    <div class="text-dark font-size-18">Mayra Sibley</div>
                    <div>
                        <span class="badge badge-sm badge-dot badge-primary"></span>
                        <span class="text-muted font-size-12">Active</span>
                    </div>
                </div>
                <div class="chat-box-toggle">
                    <button id="chat-box-toggle" class="waves-effect waves-circle btn btn-circle btn-danger-light h-40 w-40 rounded-circle l-h-45" type="button">
                      <span class="icon-Close font-size-22"><span class="path1"></span><span class="path2"></span></span>
                    </button>                    
                </div>
            </div>
            <div class="chat-box-body">
                <div class="chat-box-overlay">   
                </div>
                <div class="chat-logs">
                    <div class="chat-msg user">
                        <div class="d-flex align-items-center">
                            <span class="msg-avatar">
                                <img src="../images/avatar/2.jpg" class="avatar avatar-lg">
                            </span>
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary font-weight-bold">Mayra Sibley</a>
                                <p class="text-muted font-size-12 mb-0">2 Hours</p>
                            </div>
                        </div>
                        <div class="cm-msg-text">
                            Hi there, I'm Jesse and you?
                        </div>
                    </div>
                    <div class="chat-msg self">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary font-weight-bold">You</a>
                                <p class="text-muted font-size-12 mb-0">3 minutes</p>
                            </div>
                            <span class="msg-avatar">
                                <img src="../images/avatar/3.jpg" class="avatar avatar-lg">
                            </span>
                        </div>
                        <div class="cm-msg-text">
                           My name is Anne Clarc.         
                        </div>        
                    </div>
                    <div class="chat-msg user">
                        <div class="d-flex align-items-center">
                            <span class="msg-avatar">
                                <img src="../images/avatar/2.jpg" class="avatar avatar-lg">
                            </span>
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary font-weight-bold">Mayra Sibley</a>
                                <p class="text-muted font-size-12 mb-0">40 seconds</p>
                            </div>
                        </div>
                        <div class="cm-msg-text">
                            Nice to meet you Anne.<br>How can i help you?
                        </div>
                    </div>
                </div><!--chat-log -->
            </div>
            <div class="chat-input">      
                <form>
                    <input type="text" id="chat-input" placeholder="Send a message..."/>
                    <button type="submit" class="chat-submit" id="chat-submit">
                        <span class="icon-Send font-size-22"></span>
                    </button>
                </form>      
            </div>
		</div>
	</div>
	
	<!-- Page Content overlay -->
	
	
	<!-- Vendor JS -->
	<script src="js/vendors.min.js"></script>
	<script src="js/pages/chat-popup.js"></script>
    <script src="../assets/icons/feather-icons/feather.min.js"></script>	

	<script src="../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
	
	<!-- EduAdmin App -->
	<script src="js/template.js"></script>
	<script src="js/pages/dashboard2.js"></script>
	
</body>
</html>
