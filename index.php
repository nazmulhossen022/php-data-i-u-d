
<?php
require_once "data.php";
require_once "action.php";


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

  <style>
      img.img-thumbnail {
    width: 170px;
    margin: 0px 0 0px 0;
    height: 120px;
            }
input#exampleInputEmail1 {
    padding: 4px 18px;
    height: 50px;
  }

img.img-thumbnai-1 {
    width: 58%;
    align-items: center;
    text-align: center;
    margin-bottom: 37px;
}
.name {
    width: 119px;
    display: block;
    margin-right: 76px;
}
.imgese {
    width: 250px;

}
.imgese img{

}
.class {
    width: 100px;
    display: block;
    margin-right: 100px;
}
.email {
    width: 124px;
    display: block;
    margin-right: 80px;
}

.button-list-index{
  margin-right: 132px;
}

.wid-edit{
width: 80%;
margin: 0 auto;
}

.table td, .table th {
    padding: 0.75rem;
    vertical-align: inherit;
    border-top: 1px
 solid #dee2e6;
}

.index{
  padding: 0px 25px;
}
  </style>

  </head>
<body>




<div class="container">

    <div class="row justify-content-center">
      <div class="col-md-10">
        <h3 class="text-center text-dark mt-2">CRUD App Using PHP & MySQLi (Object Oriented)</h3>
        <hr>
        <?php if (isset($_SESSION['response'])) { ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <b><?= $_SESSION['response']; ?></b>
        </div>
        <?php } unset($_SESSION['response']); ?>
      </div>
    </div>



  <form action="action.php" method="post" enctype="multipart/form-data">
  <div class="form-group my-3">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Full Name">
  </div>

  <div class="form-group my-3">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email">
  </div>

  <div class="form-group my-3">
    <label for="exampleInputEmail1">Class</label>
    <input type="text" name="class" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Phon Number">
  </div>

 

  <div class="form-group my-3">
    <label for="exampleInputEmail1">Your Image</label>
    <input type="file" name="user_img" class="form-control pt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email">
  </div>

  <button type="submit" class="btn btn-primary" name="add_info">Data Add</button>
  </form>

</div>

<div class="container-fluid wid-edit">
 
     <div class="row p-5">
     
        <!--data table-->
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
                <h2 class="mb-5">Data Inseart, Update, Delete</h2>
                <?php
                
                $query = "SELECT * FROM `student`";
                $result = mysqli_query($conn, $query);
                $num_results = mysqli_num_rows($result);

                ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Index</th>
                    <th scope="col">Name</th>
                    <th scope="col">Emil</th>
                    <th scope="col">Class</th>
                    <th scope="col">user image</th>
                    <th scope="col">Edit/Delet</th>
                    </tr>
                </thead>
                <tbody>

                  <?php
                  if($num_results > 0){
                    $i = 1;
                    while($show_data = mysqli_fetch_array($result)){
                      
                     
                    
                    ?>
                    <tr>
                    <th scope="row"><div class="index"><?php echo $i++; ?></div></th>
                    <td scope="col"><div class="name"><?php echo $show_data['name']; ?></div></td>
                    <td scope="col"><div class="email"><?php echo $show_data['email']; ?></div></td>
                    <td scope="col"><div class="class"><?php echo $show_data['class']; ?></div></td>
                    <td scope="col"><div class="imgese"><img src="<?php echo $show_data['image']; ?>" alt="image" class="img-thumbnail"></div></td>
                    <td scope="col">
                      <div class="d-inline text-white button-list-index">
                        <a data-id="<?php echo $show_data['id']; ?>" type="button" class="userinfo btn btn-success text-white d-inline" data-toggle="modal" data-target="#exampleModalCenter">Details</a>
                        <a href="edit.php?edit=<?php echo $show_data['id']; ?>" type="button" class="btn btn-primary d-inline" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</a>
                        <a href="action.php?delete=<?php echo $show_data['id']; ?>" onclick="return confirm('Do you want delete this record?');" type="button" class="d-inline btn btn-danger">Delete</a>
                      </div>
                    </td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>

        </div>
        </div>

        <!-- data view -->
       
        </div>

        <script type='text/javascript'>
            $(document).ready(function(){
                $('.userinfo').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#empModal').modal('show'); 
                        }
                    });
                });
            });
            </script>
        <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">User Information</h4>
                          <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
        </div>

</div>


<script>

</script>

</body>
</html>