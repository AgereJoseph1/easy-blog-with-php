<?php
	require_once("../class/class.user.php");
	$user = new USER();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../PHPMailer-master/src/Exception.php';
    require '../PHPMailer-master/src/PHPMailer.php';
    require '../PHPMailer-master/src/SMTP.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0;  
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "dreamhigher2019@gmail.com";
    $mail->Password   = "Ernestina2435";
    // $mail->Username   = $user->smtpUsername;
    // $mail->Password   = $user->smtpPassword;
    $mail->IsHTML(true);

    // USER REGISTER
    if(isset($_POST['register'])){
        // print_r($_POST);
        // exit();
        if(!isset($_POST['email']) || empty($_POST['email'])){
            $user->set_alert("Please enter E-mail!", "error");
            $user->back();
            exit();
        }

        if($user->isExists("users", "email", $user->escape($_POST['email']))){
            $user->set_alert("Email already exists!", "error");
            $user->back();
            exit();
        }

        if(!isset($_POST['username']) || empty($_POST['username'])){
            $user->set_alert("Please enter Username!", "error");
            $user->back();
            exit();
        }

        if($user->isExists("users", "username", $user->escape($_POST['username']))){
            $user->set_alert("Username already exists!", "error");
            $user->back();
            exit();
        }

        if(!isset($_POST['password']) || empty($_POST['password'])){
            $user->set_alert("Please enter password", "error");
            $user->back();
            exit();
        }

        if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*([^a-zA-Z\d\s])).{8,}$/", $user->escape($_POST['password']))){
            $user->set_alert("Password should contain at least : <br>One UPPER case.<br>One lower case.<br>One number<br>One special character.<br>Length must be atleast 8 character.", "error");
            $user->back();
            exit();
        }

        if(!isset($_POST['re_password']) || empty($_POST['re_password'])){
            $user->set_alert("Please enter confirm password!", "error");
            $user->back();
            exit();
        }

        if($_POST['password'] != $_POST['re_password']){
            $user->set_alert("Password not match!", "error");
            $user->back();
            exit();
        }

        $email = $user->escape($_POST['email']);

        $user->query("INSERT INTO users(name, username, password, email, phone, address, profile_pic, subscription_type, is_verified, dtime) VALUES(:name, :username, :password, :email, :phone, :address, :profile_pic, :subscription_type, :is_verified, :dtime)");
        $user->bind("name", $user->escape($_POST['name']));
        $user->bind("username", $user->escape($_POST['username']));
        $user->bind("password", $user->escape($_POST['password']));
        $user->bind("email", $user->escape($_POST['email']));
        $user->bind("phone", "");
        $user->bind("address", "");
        $user->bind("profile_pic", "");
        $user->bind("subscription_type", "free");
        $user->bind("is_verified", "true");
        $user->bind("dtime", $user->get_date("today"));
        if($user->execute()){

            $insert_id = $user->insertID();
            $token = $user->auth_key(40);
            $user->query("INSERT INTO register_verify(reg_id, token) VALUES(:reg_id, :token)");
            $user->bind("reg_id", $insert_id);
            $user->bind("token", $token);
            if($user->execute()){
                $ins_id = $user->insertID();
                $auth = md5($ins_id);
                $content = '<b>Click here to verify your account</b> : <a href="'.$user->get_domain().'/easy-plate-blog/admin/main/verify.php?auth='.$auth.'&token='.$token.'">Verify</a>';
                $mail->AddAddress($email);
                $mail->SetFrom("dreamhigher2019@gmail.com");
                // $mail->SetFrom($user->smtpUsername, $user->companyName);
                $mail->Subject = "Verify your account";
                $mail->MsgHTML($content); 
                if(!$mail->Send()) {
                    $user->set_alert("You registered successfully but can't send verification email!.", "error");
                    $user->redirect('../../../frontend/front-end/login.php');
                    exit();
                }else{
                    $user->set_alert("Verification link sent to : $email", "success");
                    $user->redirect("../../../frontend/front-end/register.php");
                }
            }
            
        }
        exit();
    }


    
?>