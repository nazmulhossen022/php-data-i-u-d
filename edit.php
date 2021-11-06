
<?php
require_once "data.php";
require_once "action.php";



    $id = $_GET['edit'];
  
    $query = "SELECT * FROM `student` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);
  $edit_data = mysqli_fetch_assoc($result);

  $id = $edit_data['id'];
  $name = $edit_data['name'];
  $email = $edit_data['email'];
  $class = $edit_data['class'];
  $image = $edit_data['image'];
 
   
 
  
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
  </head>

  <style>
      img.img-thumbnail {
    width: 22%;
    margin: 18px 0 10px 0;
            }
input#exampleInputEmail1 {
    padding: 4px 18px;
    height: 50px;
}
  </style>
<body>

<div class="container">

<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <h3 class="text-center text-dark mt-2"> Edit Your Data </h3>
        <hr>
      </div>
    </div>



  <form action="action.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php  echo $id;  ?>">
  <div class="form-group my-3">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $name; ?>">
  </div>

  <div class="form-group my-3">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $email; ?>">
  </div>

  <div class="form-group my-3">
    <label for="exampleInputEmail1">Class</label>
    <input type="text" name="class" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $class; ?>">
  </div>

 

  <div class="form-group my-3">
    <label for="exampleInputEmail1">Your Image</label>
    <input type="hidden" name="oldimage" value="<?php echo $image; ?>">
    <input type="file" name="user_img" class="form-control pt-2" id="exampleInputEmail1" aria-describedby="emailHelp">
    <img src="<?php echo $image; ?>" width="120" class="img-thumbnail">
  </div>

  <button type="submit" class="btn btn-primary" name="update_data">Update Data</button>
  <a href="index.php" class="btn btn-success ml-5">Back Home</a>
  </form>
</div>


<script>

</script>

</body>
</html>