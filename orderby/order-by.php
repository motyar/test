<!DOCTYPE html>
<html>
<body>
<?php
$host = "localhost" ;
$user = "root";
$pass = "" ;
$db = "test" ;
// create connection
$conn = new mysqli($host,$root,$pass,$db);
//check connection
if($conn->connect_error){
die("connection failed: ".$conn->connect_error); 
}
echo "connection sucessfully" ;
$q= "SELECT  FROM students";
$result = $conn->query($q);
if ($result->num_rows>0)
{
//output data of each row
while($row=$result->fetch_assoc()) {
    echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();
?>

</body>
</html>