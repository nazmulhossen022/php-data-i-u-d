<?php

session_start();

require_once "data.php";

if(isset($_POST['add_info'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $class = $_POST['class'];

  $user_img=$_FILES['user_img']['name'];
  $tmp_image = $_FILES['user_img']['tmp_name'];
  $upload="uploads/".$user_img;

  $query = "INSERT INTO `student`(`name`, `email`, `class`, `image`) VALUES ('$name','$email','$class','$upload')";

  $result = mysqli_query($conn, $query);

  move_uploaded_file($tmp_image, $upload);

 header('location:index.php');
 $_SESSION['response']="Successfully Inserted to the database!";
 $_SESSION['res_type']="success";

 
}

if(isset($_GET['delete'])){

  $id = $_GET['delete'];
  $sql="SELECT image FROM student WHERE id = $id";

  $result = mysqli_query($conn, $sql);
  $image = mysqli_fetch_assoc($result);
  $img_path = $image['image'];
  unlink($img_path);

  $query = "DELETE FROM student WHERE id=$id";
  $delet = mysqli_query($conn, $query);


  header('location:index.php');
	$_SESSION['response']="Successfully Deleted!";
	$_SESSION['res_type']="danger";



}


if(isset($_POST['update_data'])){

  $id = $_POST['id'];

  $name = $_POST['name'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $class = $_POST['class'];

  $oldimage = $_POST['oldimage'];


  if(isset($_FILES['user_img']['name'])&&($_FILES['user_img']['name']!="")){
    $newimage="uploads/".$_FILES['user_img']['name'];
    unlink($oldimage);
    move_uploaded_file($_FILES['user_img']['tmp_name'], $newimage);
  }
  else{
    $newimage=$oldimage;
  }



  $query = "UPDATE `student` SET `name`='$name',`email`='$email',`class`='$class',`image`='$newimage' WHERE `id`='$id'";

  $result = mysqli_query($conn, $query);


  $_SESSION['response']="Updated Successfully!";
  $_SESSION['res_type']="primary";
  header('location:index.php');

 
}











?>