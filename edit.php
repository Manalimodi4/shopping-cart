<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "cartdb";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if(isset($_GET['id']))
{
  $id=$_GET['id'];
  if(isset($_POST['insert']))
  {
  $Name=$_POST['Name'];
  $Email=$_POST['Email'];
  $Password=$_POST['Password'];
  $Credit =$_POST['Credit'];
  $Status =$_POST['Status'];
  $updated=mysql_query("UPDATE users SET 
        Name='$Name', Email='$Email', Password='$Password' Credit=$Credit,Status='$Status' WHERE id='$id'")
or die();
if($updated)
{
$msg="Successfully Updated!!";
header('Location:index.php');
}
}
} 
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit form</title>
<link type="text/css" media="all" rel="stylesheet" href="style.css">
</head>

<body>
<?php 
  if(isset($_GET['id']))
  {
  $id=$_GET['id'];

   $sql="SELECT * FROM users WHERE id='$id'";
   $result = mysqli_query($conn, $sql);
  while($profile=$result->fetch_assoc())
  {
    $Name=$profile['Name'];
    $Email=$profile['Email'];
    $Password=$profile['Password'];
    $Credit=$profile['Credit'];
    $Status=$profile['Status'];
?>
<div class="display">
  <form action="" method="post" name="insertform">
  <h4>Name</h4>
  <input type="text" id="Name" name="Name" value="<?php echo $Name; ?>" placeholder="Enter name"/><br />
  <h4>Email</h4>
 <input type="email" id="Email" name="Email"value="<?php echo $Email; ?>" placeholder="Enter email" /><br />
 <h4>Password</h4>
 <input type="text" id="Password" name="Password" value="<?php echo $Password; ?>" placeholder="Enter password"/><br />
 <h4> Credit </h4>
<input type= "number" id="Credit" name="Credit" value="<?php echo $Credit; ?>" placeholder="Enter amount" /><br />
<h4> Status </h4>
<input type= "text" id="Status" name="Status" value="<?php echo $Status; ?>" placeholder="Enter Status" /><br />  
<input type="submit" name="update" value="Update" id="inputid1" />
</form>
</div>
<?php } } ?>
</body>
</html>

