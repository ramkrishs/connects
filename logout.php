<?php

// Inialize session
session_start();
include('global.php');
$dbc = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
mysqli_query($dbc,"UPDATE `questions` SET `status`=0 WHERE `q_id`!=999");

$save_value=$_POST['save'];
if ($save_value=="1" && isset($save_value)) {
	$user_empid=$_SESSION['empid'];
	$user_name=$_SESSION['name'];
	$user_score=$_SESSION['mark'];
	//insert query
	mysqli_query($dbc,"INSERT INTO `results`(`empid`, `name`, `score`) VALUES ('$user_empid','$user_name','$user_score')");
}
// Delete certain session
// unset($_SESSION['descrip']);
// unset($_SESSION['empid']);
// unset($_SESSION['mark']);
// unset($_SESSION['name']);
// unset($_SESSION['answer']);
unset($_SESSION['flag']);
unset($_SESSION['reload']);
// Delete all session variables

session_destroy();

// Jump to login page
header('Location: index.php');


?>
