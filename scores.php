<?php

session_start();

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
	<link href='http://fonts.googleapis.com/css?family=Monoton|Electrolize' rel='stylesheet' type='text/css'> 
	<style>
			body{
		
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

<div class="sp-container">
        <div class="sp-content">
               	<h2 class="frame-1">Thanks for Playing </h2>

            	<h2 class="frame-2">We do believe it was quiet informative</h2>

            	<h2 class="frame-3">Your Score will Be Shown!!</h2>

            	<h2 class="frame-4">Now!</h2>

            	<h2 class="frame-5"><span>Dear</span> <span><?php echo $_SESSION['name']; ?></span><span><?php echo ", Your score is ".$_SESSION['mark']; ?></span></h2>


        </div>
 </div>

<img class="tree" src="img/tree.png">
<form class="exit_form" name="login" action="logout.php" method="post" >
<input type="hidden" name="save" value="1">
<input type="submit" value="Logout!! n Try Again" class=" btn btn-primary btn-lg">
</form>
<div class="ground"></div>
</div>

<!-- javascript files -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/prefixfree.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>