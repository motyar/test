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

?>