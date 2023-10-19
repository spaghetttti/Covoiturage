<?php 
require_once("../db.php");
var_dump($_POST);
if ( !isset($_POST['email'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
} else {
    // auth($_POST['email'], $_POST['password']);
}
?>