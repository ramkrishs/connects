<?php

// Inialize session
session_start();
if(!isset($_SESSION['flag'])){
$_SESSION['flag']=0;
$_SESSION['reload']=0;

}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Bootstrap  -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<!-- Local style sheet -->
	<link rel="stylesheet" href="css/style.css" media="all" />
	<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1.0; user-scalable=no"/>
	<link href='http://fonts.googleapis.com/css?family=Monoton|Hanalei' rel='stylesheet' type='text/css'>   
	<style>
			body{
		background-color: #2980b9;
		padding: 0;
		margin: 0 auto;
		width: 960px;
		overflow: hidden;
	}
	</style>
	  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="js/html5shiv.js"></script>
	    <![endif]-->
</head>
<body>
<div class="cloud3 floatingtrd"></div>
<div class="cloud2 floatingsec"></div>
<div class="cloud1 floating"></div>
<img src="img/header_text.gif" class="header">
<div class="plane fly"></div>

<img class="tree" src="img/tree.png">
<form class="input_form" name="login" action="questions.php" method="post" >
<input type="text" class="input-lg" name="empid" placeholder="Employee id">
<input type="text" class="input-lg" name="name" placeholder="Name">
<input type="submit" value="GO" class=" btn btn-primary btn-lg">
</form>
<p class="caption float">Lets Play the Game!!</p>
<div class="ground"></div>








<!-- javascript files -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/prefixfree.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
