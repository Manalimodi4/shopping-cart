<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
  </head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoppingcartdb";
$count = 0;

// Creating connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
?>
<div class="container">
  <!-- Trigger the modal with a button -->
  <div class="text-right">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add user</button>
  </div>
  <!-- Add user modal -->
  <div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add user</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="adduser.php">
						<h4>Name</h4>
						<input type="text" id="name" name="name" placeholder="Enter name"/><br />
						<h4>Email</h4>
						<input type="email" id="email" name="email" placeholder="Enter email" /><br />
						<h4>Password</h4>
						<input type="text" id="password" name="password" placeholder="Enter password"/><br />
            <h4> Credit </h4>
            <input type= "text" id="credit" name="credit" placeholder="Enter amount" /><br />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" data-dismiss="modal">Add</button>
				</div>
        </form>
			</div>
		</div>
	</div>
  <!-- retrieve data from table -->
 <?php $sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>
<tr>
<th>Id</th>
<th>Name</th>
<th>email</th>
<th>password</th>
<th>credit</th>
</tr>";


 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        
        echo "<tr>";
        echo "<td>" . $row['Id'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Password'] . "</td>";
        echo "<td>" . $row['Credit'] . "</td>";
        echo "</tr>";
    }
}
echo "</table>";
?>
</body>
</html>
