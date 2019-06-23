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
$dbname = "cartdb";
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
          <h4> User Id</h4>
						<input type="number" id="id" name="id" placeholder="Enter Id"/><br />
						<h4>Name</h4>
						<input type="text" id="Name" name="Name" placeholder="Enter name"/><br />
						<h4>Email</h4>
						<input type="email" id="Email" name="Email" placeholder="Enter email" /><br />
						<h4>Password</h4>
						<input type="text" id="Password" name="Password" placeholder="Enter password"/><br />
            <h4> Credit </h4>
            <input type= "number" id="Credit" name="Credit" placeholder="Enter amount" /><br />
            <h4> Status </h4>
            <input type= "text" id="Status" name="Status" placeholder="Enter Status" /><br />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary" value="Add User"/>
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
<th>Email</th>
<th>Password</th>
<th>Credit</th>
<th>Status</th>
<th>Edit</th>
</tr>";


 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Password'] . "</td>";
        echo "<td>" . $row['Credit'] . "</td>";
        echo "<td>" . $row['Status'] . "</td>";
        echo "<td><a href='records.php?id=" . $row['id']. "'>Edit</a></td>";
        echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
        echo "</tr>";
    }
}
echo "</table>";
?>
</body>
</html>
