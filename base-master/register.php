<?php 
require_once('include/db.php');
require_once('config.php');
require_once('top.php');

// sending new user details while registering in db here
$message = '';
if (isset($register)) {
    // check user already exits
    $password = md5($password);
    $rows = $db->Q("SELECT * FROM `form` WHERE `email`= '$email'");
    if (! $rows) {
	    // step 4
        $db->Q("INSERT INTO `form`(`email`,`password`,'city') VALUES ('$email','$password','$city')");
        $message = '<h1>You are successfully registered plese click <a href="login.php">here</a> to login';
    } else {
        $message = 'sorry this email is already taken';
    }
}
?>
<!-- register form -->
<form action="" method="post">
	<label for="email">Email:</label>
	<input type="email" placeholder="email" name="email" required><br><br>
	<label for="password">Password:</label>
	<input type="password" placeholder="password" name="password" required><br><br>
	<label for ="citys"><b>city</b></label><br>
	<select name="citys" id="citys" style="width:500px">
	<option value ="value">city1</option>
	<option value="value">city</option></select>
	<input type="submit" name="register" value="Register">
</form>
<a href="login.php"><button>Login</button></a>
<h1><?php echo $message; ?></h1>
