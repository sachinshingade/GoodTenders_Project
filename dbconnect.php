<?php
 
 	$dbhost = '94.130.142.174';
 	$dbuser = 'wms';
 	$dbpass = 'jW]%OBqw$_sk';
 	$db = 'cms_goodtenders';
 
 
 	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 	return $conn;

?>