<?php

// Inialize session
session_start();

// Include database connection settings
include('dbc.php');
if(!isset($_SESSION['empid'])){
$_SESSION['empid'] = $_POST['empid'];
}

if(!isset($_SESSION['name'])){
$_SESSION['name'] = $_POST['name'];
}

if(!isset($_SESSION['imgid'])){
$_SESSION['imgid']=1;	

}
else {
	
	if ($_SESSION['imgid']==5) {
		$_SESSION['imgid']=0;	
	}
	$_SESSION['imgid']=$_SESSION['imgid']+1;
	
}


echo $_SESSION['imgid'];



?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Questions</title>
	</head>
	<body>
		<br>
		<br>
		<div>Welcome,<?php echo $_SESSION['name'];?> <a href="logout.php">      Logout</a>
		</div>
		<br>
		<br>
		<?php 
		echo ' <img src="images/'.$_SESSION['imgid'].'_1.jpg" alt="Image 1" class="img_quest"> ';
		
		echo ' <img src="images/'.$_SESSION['imgid'].'_2.jpg" alt="Image 2" class="img_quest"> ';
		?>
		<br>
		<br>
		<form action="questions.php" method="post">
		<input type="text" name="answerbox"/> 
		<input type="submit" value="submit">
		</form>
		<div>
			description:
		</div>


	</body>
</html>
