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
$sql = "INSERT INTO MyFriend(firstname,lastname,email) 
VALUES('PRADEEP', 'MOTYAR', 'pradeepmotyar@gmail.com')";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com')";
if ($conn->multi_query($sql) === TRUE) {

  echo "NEW RECORDS CREATED successfully" ;
} else {
  echo "Error : " .$sql . "<br>" .
  $conn->error;
}

$conn->close();
?>
