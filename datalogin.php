<?php
	// Connects to Our Database 
 	mysql_connect("localhost", "root", "") or die( 'Could not connect:' . mysql_error()); 
 	mysql_select_db("wmldatabase") or die(mysql_error()); 
?>