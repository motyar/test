<!DOCTYPE html>
<html>
<body>
<?php
for ($i = 1; $i <= 100; $i++)
{
  if ( $i%3 == 0 && $i%5 == 0 )
   {
     echo $i . " FizzBuzz<br>"."\n" ;
   }
  else if ( $i%3 == 0 ) 
   {
     echo $i. " Fizz<br>"."\n";
   }
     else if ( $i%5 == 0 ) 
   {
     echo $i. " Buzz<br>"."\n";
   }
     else
   {
     echo $i."<br>";
   }
 }
?>
</body>
</html>
