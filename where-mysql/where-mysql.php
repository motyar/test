<!DOCTYPE html>
<html>
<body>
<?php
$host= "localhost" ;
$user ="username" ;
$pass= "";
$db="myDB";
//create connection
$conn = new mysqli($host,$user,$pass,$db);
//check connection
if
($conn->connect_error) {
die("Connection failed: " .
$conn->connect_error);}
$sql="SELECT id, firstname,lastname FROM MyGuests WHERE lastname='Doe' " ;
$result = $conn->query($sql);
if ($result->num_rows >0) {
//output data of each row
while($row = $result->fetch_assoc()){
echo "<br> id: ".
$row["id"]. " - Name: ".
$row["firstname"]. "".
$row["lastname"] .
"<br>";}
} else{
echo "0 result" ;
}
$conn->close();
?>
</body>
</html>