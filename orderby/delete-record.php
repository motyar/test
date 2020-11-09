<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "test";
//create connection 
$conn = new mysqli($host , $user,$pass,$db);
//check connection
if($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
//sql to delete a record
$sql = "DELETE FROM MyFRIEND ID=3" ;
if($con->query($sql)===TRUE) {
ECHO "Record deleted successfully" ;
} else {
echo "Error deleting record: " . 
$conn->error;
}
$conn->close();
?>