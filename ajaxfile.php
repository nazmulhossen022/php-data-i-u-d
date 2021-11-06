<?php
require_once "data.php";
 
$userid = $_POST['userid'];
 
$sql = "select * from `student` where id=".$userid;
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){

?>
<table border='0' width='100%'>
<tr>
    <td style="padding: 20px 52px;
    font-size: 20px;
    font-family: 'Circular-Loom';
    font-weight: 500;">
    <img src="<?php echo $row['image']; ?>" class="img-thumbnai-1">
    <p>Name : <?php echo $row['name']; ?></p>
    <p>Email : <?php echo $row['email']; ?></p>
    <p>Class : <?php echo $row['class']; ?></p>
    </td>
</tr>
</table>
 
<?php } ?>