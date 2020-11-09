 <?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "test" ;
// Create connection
$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
// Create table
$sql = "INSERT INTO MyFriend(firstname,lastname,email)";
$result = $conn->query($sql);
if($result->num_rows>0){
	echo "<table><tr><th>ID</th><th>Name</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
  }
echo"</table>";
} else{
	

  echo "0 result" ;

}

$conn->close();
?>
