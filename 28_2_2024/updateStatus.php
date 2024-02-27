<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maji";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values from the POST request
$tableName = $_POST['tableName'];

echo "$tableName";
// Perform the update operation
$sql = "UPDATE tabletype SET tableTypeStatus = 'ไม่ว่าง' WHERE tableTypeId = '$tableName'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
