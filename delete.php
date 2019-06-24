<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "cartdb";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (isset($_GET['id']) && is_numeric($_GET['id']))
{
$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
header('Location: ../shopping-cart/index.php');
}
//if value of Id is not set
else
{
echo "unable to delete";
}
?>