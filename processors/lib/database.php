<?php

	$db_hostname = 'localhost';
	$db_username = 'root';
	$db_password = 'matrix';
	$db_database = 'sitedata';
	$db_connect = mysql_connect($db_hostname, $db_username, $db_password);

	if (!$db_connect) {
		die("Cant connect" . mysql_error());
	}
	mysql_select_db($db_database) or die("Cant select db: " . mysql_error());
?>
