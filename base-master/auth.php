<?php 
session_start();
if (! $_SESSION['enteredId']) {
    header('location:login.php');
}
