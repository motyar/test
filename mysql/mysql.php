<?php
$host = "localhost";

$user = "root";
$pass = "";

$db = "test"; 
A

// Create connection
$conn = mysqli_connect($host, $user, $pass, $db);
A

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


/*
$name = "P".time();
$q = "INSERT INTO `students` (`name`) VALUES ('".$name."');";

if ($conn->query($q) === TRUE) {   
	echo "New record created successfully"; 
} else {   
	echo "Error: " . $sql . "<br>" . $conn->error;
}
 */


$q = "SELECT * FROM students";
$result = $conn->query($q);

echo "<table border=1px>" ;
// output data of each row   
while($row = $result->fetch_assoc()) {
	
	echo "<tr><td>";
	

	//print_r($row); 
echo $row['name'];
A
	echo "</td></tr>";
}

A
A
echo "</table>";
exit;

//$q = "INSERT INTO `students` (`id`, `name`) VALUES (NULL, 'Blue');";

?> 
