<!DOCTYPE html>
<html>
<head>
<title>Inserting data into database using php</title>
</head>
<body>
<?php

$name =$_POST['name'];
$dbconnect= mysqli_connect('localhost','root','','test');
 $sql = mysqli_query($dbconnect, "insert into students(id , name) values('','$name')");
 
 if($sql){
	 echo "data inserted successfully";
 }
 else{
	 echo "Failed to insert";
 }

$result =mysqli_query($dbconnection, "SELECT * FROM students");
echo"<table borde=1px>
 
<tr>
<td><form action=""  method ="POST"></td>
<td>Name</td>
<td><input type="text" name="name" ></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Add"></td>
</tr>;
while($row = mysqli_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['Name']."</td>';
	echo "</tr>";
}
echo"</table>";
mysqli_close($con);
</table>

</form>
?>
</body>
</html>