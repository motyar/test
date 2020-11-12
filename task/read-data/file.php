<?php
$myfile = fopen("input.txt" , "r")or die("Unable to open file!");
echo fread($myfile,filesize("input.txt"));
fclose($myfile);
?>