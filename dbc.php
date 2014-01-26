<?php

include('global.php');
//open a database connection

$dbc = mysql_connect($dbHost, $dbUser, $dbPass, $dbName)
        or die('Error Connecting to MySQL DataBase');

//select database
$db_select= mysql_select_db("$dbName", $dbc);
if(!$db_select)
		{
			die('Not connected' . mysql_error());
		}
else{}
?>
