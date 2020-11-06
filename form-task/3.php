    <html>  
    <body>  
    <form method="GET">
    Enter First Number:  
    <input type="number" name="number1" /><br><br>  
    Enter Second Number:  
    <input type="number" name="number2" /><br><br>  
    <input  type="submit" name="submit" value="Add">  
    </form>  
<?php  
if(isset($_GET ['submit'])) {  
	$number1 = $_GET['number1'];  
	$number2 = $_GET['number2'];  
	$sum =  $number1+$number2;     
	echo "The sum of $number1 and $number2 is: ".$sum;   
}  

// jkChanges 
?>  
    </body>  
    </html>  
