<?php
require "header.php";

if($_SESSION) {
unset($_SESSION['uname']);
session_destroy();
$message = "You are now logged out";
//echo "<a href='index.php' title='Home'>Home</a>";
   header( 'Location: index.php');
}

?>