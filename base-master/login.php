<?php
session_start();
require_once('include/db.php');
require_once('config.php');
require_once('top.php');

if (isset($submit)) {
    $password = md5($password);
    $rows = $db->Q("SELECT * FROM `form` WHERE `email`= '$email' AND `password` = '$password'");
    foreach ($rows as $row) {
        $_SESSION['enteredId'] = $row['id'];
    }
    if ($rows == true) {
        $_SESSION['enteredUser'] = $email;
        header('location:dashboard.php');
    } else {
        $message = 'You are not registered please ';
    }
}
?>

<form action="" method="post">
	<label for="email">Email:</label>
	<input type="text" placeholder="email" name="email"><br><br>
	<label for="password">Password:</label>
	<input type="password" placeholder="password" name="password"><br><br>
	<input type="submit" name="submit" value="Login">
</form>
<?php echo $message; ?>
<a href="register.php"><button>Sign Up</button></a>