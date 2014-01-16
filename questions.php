<?php

// Inialize session
session_start();

// Include database connection settings
include('dbc.php');

//connection string
$dbc = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
       
//SELECT a anserwer from table
$selectquery= " SELECT * FROM  `questions` WHERE `status` != 1 ORDER BY RAND( ) LIMIT 0 , 1";
$result = mysqli_query($dbc,$selectquery);
$row = mysqli_fetch_array($result);

	$_SESSION['answer']=$row['answers'];
			$_SESSION['descrip']=$row['description'];

			if(!isset($_SESSION['empid'])){
			$_SESSION['empid'] = $_POST['empid'];
			}

			if(!isset($_SESSION['name'])){
			$_SESSION['name'] = $_POST['name'];
			}
			$imgid=$row['q_id'];
			// if(!isset($_SESSION['imgid'])){
			// $_SESSION['imgid']=$row['q_id'];	

			// }
			// else {
				
			// 	if ($_SESSION['imgid']==5) {
			// 		$_SESSION['imgid']=0;	
			// 	}
			// 	$_SESSION['imgid']=$_SESSION['imgid']+1;
				
			// }
			if (!isset($_SESSION['mark'])) {
				# code...
				$_SESSION['mark']=0;
			}

			mysqli_query($dbc,"UPDATE `questions` SET `status`=1 WHERE `q_id`='$imgid'");
			echo "<br>". $imgid;




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
		echo ' <img src="images/'.$imgid.'_1.jpg" alt="Image 1" class="img_quest"> ';
		
		echo ' <img src="images/'.$imgid.'_2.jpg" alt="Image 2" class="img_quest"> ';
		?>
		<br>
		<br>
		<form action="questions.php" method="post">
		<input type="text" name="answerbox"/> 
		<input type="submit" value="next">
		</form>
		<input type="button" value="submit" >
		<div> 
			description: 
			<?php 
					
					
			?>
		</div>

	<script type="text/javascript">
		// function showdescription (str) {
		// 	var xmlhttp=new XMLHttpRequest();

		// 	// body...
		// }
	</script>	

	</body>
</html>

