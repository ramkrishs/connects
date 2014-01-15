<?php
//open a database connection
$dbHost = 'localhost';
$dbUser = 'game_admin';
$dbPass = 'rootpass';
$dbName = 'connectsdb';
$dbc = mysql_connect($dbHost, $dbUser, $dbPass, $dbName)
        or die('Error Connecting to MySQL DataBase');

//select database
$db_select= mysql_select_db("$dbName", $dbc);
if(!$db_select)
		{
			die('Not connected' . mysql_error());
		}
else{
	echo "Ta daa!! DB got connected";

		}
?>
