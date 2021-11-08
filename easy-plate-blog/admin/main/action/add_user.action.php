<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'blogdb');

if (!$conn) {
    echo "Error connecting to db";
}else{
    if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    // $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $profile = $_FILES['profile'];
    
     $fileName=$profile['name'];
     $fileSize=$profile['size'];
     $fileTmpName=$profile['tmp_name'];
     $fileError=$profile['error'];
     $fileType=$profile['type'];

     $fileExt=explode('.', $fileName);
     $fileActualExt=strtolower(end($fileExt));

     $allowed=array('jpeg','jpg' ,'png');

    

    if (!isset($username) || empty($username)) {
        echo "please enter your username";
        exit();
    }

    
    if (!isset($fname) || empty($fname)) {
        echo "please enter your firstname ";
        exit();
    }

    if (!isset($lname) || empty($lname)) {
        echo "please enter your lastname!";
        exit();
    }

    if (!isset($email) || empty($email)) {
        echo "please enter your email";
        exit();
    }

    if (!isset($password) || empty($password)) {
        echo "Please enter password";
        exit();
    }

    if (!isset($phone) || empty($phone)) {
        echo "Please enter phone";
        exit();
    }
    $sql = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Username already exist";
        exit();
    }
    
    // Email Exist
    $sql1 = "SELECT email FROM users WHERE email = '$email'";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {
        echo "Email already exist";
        exit();
    }


     if (in_array($fileActualExt, $allowed)) {
        if ($fileError===0) {
            if ($fileSize < 200000) {
                $fileNameNew= uniqid ('',true).".".$fileActualExt;
                $fileDestination='../../uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            }else{
                echo "Your file size is too large!";
            }
        }else{
            echo "There was  an error uploading  image! ";
        }
     }else{
        echo "please your file format is not allowed ";
     }

            
            $password = 1234;
            $password = md5($password);
            $sql2 = "INSERT INTO users(name, username, password, email, phone, address, profile_pic, subscription_type, is_verified,firstname,lastname) VALUES ('','$username','$password','$email','$phone','$address','$fileNameNew','free','false','$fname','$lname')";
            if (mysqli_query($conn, $sql2) == True) {
                // header("Location: ../front-end/register.php?Success=registrationSuccessful");
                header("Location:../add_users.php?registrationSuccessful") ;
                exit();
            }else{
                echo "Unable to register";
                exit();
      

            }
}
}


   



// $conn->close();




 








 
