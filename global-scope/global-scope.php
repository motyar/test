<!DOCTYPE html>
<html>
<body>

<?php
function myTest() {
$x = 5; // local scope
 echo "<p>Variable x is inside function is: $x</p>";
}
myTest();
  // using x outside this function will generate an error
  echo "<p>Variable x inside function is: $x</p>";
?>
</body>
</html>
