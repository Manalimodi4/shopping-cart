<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "cartdb";

// $Id = isset($_POST['id']) ? $_POST['id'] : '';
$Name = isset($_POST['Name']) ? $_POST['Name'] : '';
$Email = isset($_POST['Email']) ? $_POST['Email'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
$Credit = isset($_POST['Credit']) ? $_POST['Credit'] : '';
$Status = isset($_POST['Status']) ? $_POST['Status'] : '';
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$insert = "INSERT INTO users (Name, Email, Password, Credit,Status)
VALUES ('$Name', '$Email', '$Password', $Credit,'$Status')";

if ($conn->query($insert) === TRUE) {
    header('Location: ../shopping-cart/index.php');
} else 
    echo "Error: " . $insert . "<br>" . $conn->error;

$conn->close();
?>