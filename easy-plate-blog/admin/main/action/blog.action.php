<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'blogdb');


    if (!$conn) {
        echo "Error connecting to db";
        exit();
    }

   if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $tags = $_POST['tags'];
    $image =$_FILES['image'];
    
     $fileName=$image['name'];
     $fileSize=$image['size'];
     $fileTmpName=$image['tmp_name'];
     $fileError=$image['error'];
     $fileType=$image['type'];

     $fileExt=explode('.', $fileName);
     $fileActualExt=strtolower(end($fileExt));

     $allowed=array('jpeg','jpg' ,'png');

    

    if (!isset($title) || empty($title)) {
        echo 'Please enter title';
        exit();
    }

    
    if (!isset($content) || empty($content)){
        echo "Please enter  content";
        exit();
    }

    if (!isset($category) || empty($category)) {
        echo "Please select any of the categorys";
        exit();


     if (in_array($fileActualExt, $allowed)) {
        if ($fileError===0) {
            if ($fileSize < 200000) {
                $fileNameNew= uniqid ('',true).".".$fileActualExt;
                $fileDestination='../../post_uploads/'.$fileNameNew;
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

    
            $sql2 = "INSERT INTO blog(user_id, title, content, category, tags, thumbnail) VALUES ('','$title','$content','$category','$tags','$thumbnail')";
            if (mysqli_query($conn, $sql2) == True) {
                // header("Location: ../front-end/register.php?Success=registrationSuccessful");
                header("Location:../starter.php?postSuccessful") ;
                exit();
            }else{
                echo "unable to post";
                exit();
            }

  }
}

 //  if (isset($_POST['submit'])){
 //   	 $title=$_POST['title'];
 //   	 $text=$_POST['content'];
 //   	 $category=$_POST['category'];
 //   	 $file=$_FILES['thumbnail'];
 //   	 $tags=$_POST['tags'];
 //     $url=$_POST['link'];


 //   	 $fileName=$file['name'];
 //   	 $fileSize=$file['size'];
 //   	 $fileTmpName=$file['tmp_name'];
 //   	 $fileError=$file['error'];
 //   	 $fileType=$file['type'];

 //   	 $fileExt=explode('.', $fileName);
 //   	 $fileActualExt=strtolower(end($fileName));

 //   	 $allowed=array('jpeg','jpg' ,'png');
 //   	 if (!isset($title) || empty($title)) {
 //        echo 'Please enter title';
 //        exit();
 //      }
 //     if (!isset($text) || empty($text)) {
 //        echo 'Please enter content';
 //        exit();
 //      }
 //     if (!isset($category) || empty($category)) {
 //        echo 'Please enter category';
 //        exit();
 //      }
 //     if (!isset($tags) || empty($tags)) {
 //        echo 'Please enter tags';
 //        exit();
 //      }
 //   	 if (in_array($fileActualExt, $allowed)) {
 //   	 	if ($fileError===0) {
 //   	 		if ($fileSize < 2000) {
 //   	 			$fileNameNew= uniqid ('',true).".".$fileActualExt;
 //          var_dump($fileNameNew);
 //          exit();
 //   	 			$fileDestination='../../post_uploads/'.$fileNameNew;
 //   	 			move_uploaded_file($fileTmpName, $fileDestination);
 //   	 		}else{
 //   	 			echo "Your file size is too large!";
 //   	 		}
 //   	 	}else{
 //   	 		echo "There was  an error uploading  image! ";
 //   	 	}
 //   	 }else{
 //   	 	echo "please your file format is not allowed ";
 //   	 }
     
 //     $sql = "INSERT INTO blog ( user_id,title,content, category, tags, thumbnail) VALUES ('',$title','$text','$category','$tags','$fileNameNew')";
 //    if (mysqli_query($conn, $sql) == True) {
 //        // header("Location: ../front-end/register.php?Success=registrationSuccessful");
 //        echo "postSuccessful";
 //        exit();
 //    }else{
 //        echo "Unable to post";
 //        exit();
 //     }


 //   }

 // ?>