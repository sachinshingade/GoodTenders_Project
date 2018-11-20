<?php
session_start();
# Logout 

//clear session from globals
$_SESSION = array();

//clear session from disk
session_destroy();

header('location:index.php');


?>


