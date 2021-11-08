<?php
    include '../class/class.user.php';
    $user = new USER();
    
    if(!$user->isLogedin()){
        $user->redirect("../login.php");
        exit();
    }


    // BLOGGING
    if (isset($_POST['blogPost'])) {
        if (!isset($_POST['title']) || empty($_POST['title'])) {
            $user->set_alert("Ttile can't be empty", "error");
            $user->back();
            exit();
        }

        if (!isset($_POST['content']) || empty($_POST['content'])) {
            $user->set_alert("Content can't be empty", "error");
            $user->back();
            exit();
        }

        $file = $_FILES['thumbnail'];
        if(!empty($file['tmp_name'])){
            if($upload = $user->file_upload($file, "image", "../../assets/blog/")){
                if($upload['status'] == "success"){
                    $filename = $upload['file_name'];
                }else{
                    $user->set_alert($upload['msg'], "error");
                    $user->back();
                    exit();
                }
            }
        }elseif (isset($_POST['url']) || !empty($_POST['url'])) {
            $filename = $user->escape($_POST['url']);
        }else{
            $user->set_alert("Please insert thumbnail", "error");
            $user->back();
            exit();
        }

        $user->query("INSERT INTO blog(user_id, title, content, category, tags, likes, dislikes, views, thumbnail, dtime, status) VALUES(:user_id, :title, :content, :category, :tags, :likes, :dislikes, :views, :thumbnail, :dtime, :status)");
        $user->bind("user_id", $user->sessionID());
        $user->bind("title", $user->escape($_POST['title']));
        $user->bind("content", $user->escape($_POST['content']));
        $user->bind("category", $user->escape($_POST['category']));
        $user->bind("tags", $user->escape($_POST['tags']));
        $user->bind("likes", 0);
        $user->bind("dislikes", 0);
        $user->bind("views", 0);
        $user->bind("thumbnail", $filename);
        $user->bind("dtime", $user->get_date("today"));
        $user->bind("status", 'pending');
        if ($user->execute()) {
            $user->set_alert("Post Sent to admin for review", "success");
            $user->redirect('../index.php');
            exit();
        }else{
            $user->set_alert("Unable to insert data", "error");
            $user->back();
            exit();
        }
    }



    // EDIT POST
    if (isset($_POST['editPost'])) {
        $file = $_FILES['thumbnail'];
        if(!empty($file['tmp_name'])){
            if($upload = $user->file_upload($file, "image", "../../assets/blog/")){
                if($upload['status'] == "success"){
                    $filename = $upload['file_name'];
                }else{
                    $user->set_alert($upload['msg'], "error");
                    $user->back();
                    exit();
                }
            }
        }elseif (isset($_POST['url']) || !empty($_POST['url'])) {
            $filename = $user->escape($_POST['url']);
        }else{
            $user->set_alert("Please insert thumbnail", "error");
            $user->back();
            exit();
        }

        $user->query("UPDATE blog SET title = :title, content = :content, thumbnail = :thumbnail, category = :category, tags = :tags, status = 'pending', dtime =:dtime WHERE id = :id");

        $user->bind("id", $user->escape($_POST['post_id']));
        $user->bind("title", $user->escape($_POST['title']));
        $user->bind("content", $user->escape($_POST['content']));
        $user->bind("thumbnail", $filename);
        $user->bind("category", $user->escape($_POST['category']));
        $user->bind("tags", $user->escape($_POST['tags']));
        $user->bind("dtime", $user->get_date("today"));
        if ($user->execute()) {
            $user->set_alert("Post updated successuflly", "success");
            $user->redirect('../index.php');
            exit();
        }else{
            $user->set_alert("something went wrong", "error");
            $user->back();
            exit();
        }
    }



    // DELETE POST
    if (isset($_GET['delpost'])) {
        if (empty($_GET['delpost'])) {
            $user->set_alert("Can't delete post", "error");
            $user->back();
            exit();
        }

        $post_id = $user->escape($_GET['delpost']);
        $user->query("DELETE FROM blog WHERE id = '$post_id' AND user_id =".$user->sessionID());
        if ($user->execute()) {
            $user->set_alert("Post deleted successuflly", "success");
            $user->back();
            exit();
        }else{
            $user->set_alert("Unable delete post", "error");
            $user->back();
            exit();
        }
    }

    
?>