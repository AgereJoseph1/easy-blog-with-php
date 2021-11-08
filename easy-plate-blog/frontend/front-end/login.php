<?php
    include '../../admin/main/class/class.user.php';
    $user = new USER();

    if($user->isLogedin()){
        $user->redirect("index.php");
        exit();
    }

    if(isset($_POST['login'])){
        if($user->isServer()){
                if(isset($_POST['username']) && !empty($_POST['username'])){
                    if(isset($_POST['password']) && !empty($_POST['password'])){
                        $username = $user->escape($_POST['username']);
                        $password = $user->escape($_POST['password']);

                        $user->query("SELECT id, is_verified FROM users WHERE MD5(username) = :username AND MD5(password) = :password");
                        $user->bind("username", md5($username));
                        $user->bind("password", md5($password));
                        if($user->rowCount() > 0){
                            $row = $user->fetchOne();
                            if($row["is_verified"] == "true"){
                                $user->create_session("user_id", $row['id']);
                                $user->redirect("index.php");
                            }else{
                                $error_msg = 'Emial not verified';
                            }
                        }else{
                            $error_msg = "Wrong Username or Password!";
                        }
                    }else{
                        $error_msg = "Please enter Password!";
                    }
                }else{
                    $error_msg = "Please enter Username!";
                }
        }else{
            $error_msg = "Can't recognize the request!";
        }
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

    <title>EasyPlate - Login</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/skin_color.css">
     
  </head>

<body class="theme-primary">
	

	<!--Page content --> 
	<section class="py-50">
		<div class="container">
			<div class="row justify-content-center no-gutters">
				<div class="col-lg-5 col-md-5 col-12">
					<div class="box box-body">
						<div class="content-top-agile pb-0 pt-20">
							<h2 class="text-primary">Let's Get Started</h2>
							<?php
                                if (isset($error_msg)) {
                                    echo '<div class="alert alert-danger alert-dismissible">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>'.$error_msg.'</strong>
                                    </div>';
                                }
                            ?>
							<p class="mb-0">Sign in to continue to Easy-Blog.</p>						
							<?php $user->get_alert() ?>
						</div>
						<div class="p-40">
							<form action="login.php" method="post">
								<div class="form-group">
									<div class="input-group mb-15">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
										</div>
										<input type="text" name="username" class="form-control pl-15 bg-transparent" placeholder="Username">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-15">
										<div class="input-group-prepend">
											<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
										</div>
										<input type="password" name="password" class="form-control pl-15 bg-transparent" placeholder="Password">
									</div>
								</div>
								  <div class="row">
									<div class="col-6">
									  <div class="checkbox ml-5">
										<input type="checkbox" id="basic_checkbox_1">
										<label for="basic_checkbox_1">Remember Me</label>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-6">
									 <div class="fog-pwd text-right">
										<a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-12 text-center">
									  <button type="submit" class="btn btn-info btn-block mt-15" name="login">SIGN IN</button>
									</div>
									<!-- /.col -->
								  </div>
							</form>	
							<div class="text-center">
								<p class="mt-15 mb-0">Don't have an account? <a href="register.php" class="text-warning ml-5">Register</a></p>
							</div>	
						</div>
					</div>								

					<div class="text-center">
					  <p class="mt-20">- Login With -</p>
					  <p class="d-flex gap-items-2 mb-0 justify-content-center">
						  <a class="btn btn-social-icon btn-round btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
						  <a class="btn btn-social-icon btn-round btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
						  <a class="btn btn-social-icon btn-round btn-instagram" href="#"><i class="fa fa-instagram"></i></a>
						</p>	
					</div>
				</div>
			</div>
		</div>
	</section>
	
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
