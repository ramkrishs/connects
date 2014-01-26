<?php

// Inialize session
session_start();

$_SESSION['reload']=$_SESSION['reload']+1;

// Include database connection settings
include('dbc.php');

//connection string
$dbc = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if($_SESSION['reload']>1)
{
	$_SESSION['flag']=1;
	
}      
//SELECT a anserwer from  db table
if($_SESSION['flag']==0){
		unset($_SESSION['start_time']);
		$selectquery= " SELECT * FROM  `questions` WHERE `status` != 1 ORDER BY RAND( ) LIMIT 0 , 1";
		$result = mysqli_query($dbc,$selectquery);
		$row = mysqli_fetch_array($result);
		$rowcount=mysqli_num_rows($result);
		 if ($rowcount==0){
		 	
		 	header('Location: scores.php');
		 }
		 			if ($_SESSION['flag']==0) {
						$_SESSION['answer']=$row['answers'];
						$_SESSION['descrip']=$row['description'];
						$_SESSION['imgid']=$row['q_id'];
					}

					if(!isset($_SESSION['empid'])){
					$_SESSION['empid'] = $_POST['empid'];

					}

					if(!isset($_SESSION['name'])){
					$_SESSION['name'] = $_POST['name'];
					}
							
					if (!isset($_SESSION['mark'])) {
						# code...
						$_SESSION['mark']=0;
					}
		$imgid=$_SESSION['imgid'];		
		//update status to 1
		mysqli_query($dbc,"UPDATE `questions` SET `status`=1 WHERE `q_id`='$imgid'");
}
else{
if (isset($_POST['answerbox'])) {
	if (strcasecmp($_SESSION['answer'],$_POST['answerbox'])==0) {
		$_SESSION['mark']=$_SESSION['mark']+1;
		$user_response="Right! Well Done.";
		$user_description="Answer is"." ".$_SESSION['descrip'];
		$_SESSION['reload']=0;
		$_SESSION['flag']=0;
		$stoptimer=true;
	
	
	}
	else{
		if (isset($_POST['answerbox'])) {
			if ($_POST['answerbox']!="") {
		 		 	$user_response="Wrong!! Try again ";
		 		 	$user_description="";
		 }
		}
		 
		
	}

}
}

//timer code

// $minutes and $seconds are added together to get total time.
$minutes = 0; // Enter minutes
$seconds = 30; // Enter seconds
$time_limit = ($minutes * 60) + $seconds + 1; // Convert total time into seconds
if(!isset($_SESSION["start_time"]))
{
// Add $time_limit (total time) to start time. And store into session variable.	
$_SESSION["start_time"] = time() + $time_limit;
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

</head>
<body>
<nav class="navbar navbar-default " role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-5">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Insurance Connectz</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-5">
          <p class="navbar-text navbar-right">Welcome!! <?php echo $_SESSION['name'];?></p>
          <p class="navbar-text navbar-right"><a href="logout.php" class="navbar-link">Logout</a></p>
        </div>
</nav>
<div class="container">
	<div class="row">
	<div class="col-sm-6">
		<br>
		<?php echo ' <img src="images/'.$_SESSION['imgid'].'_1.jpg" alt="Image 1" class="img_quest"> '; ?>
		<br>
	</div>
	<div class="col-sm-6">
		<?php echo ' <img src="images/'.$_SESSION['imgid'].'_2.jpg" alt="Image 2" class="img_quest"> '; ?>
	</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-sm-12 col-sm-offset-2">
		<input id="timer" class="float" readonly>
		<form action="questions.php" method="post" class="answer_form">
		<input type="text" class="input-lg" name="answerbox" id="inp_box" placeholder="Your Answer"/>
		<input type="submit" value="submit" id="sub_btn" class="btn btn-primary btn-lg">
		<label id="usr_txt"><?php echo $user_response; ?></label>
		</form>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 ">
			<div class="description_area">
				<br>
				<blockquote>
				<p id="at" data-in-effect="fadeInLeftBig"><?php echo $user_description; ?></p>
				</blockquote>
			</div>
		</div>

	</div>
</div>
<footer>
</footer>



<!-- javascript files -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.lettering.js"></script>
<script type="text/javascript" src="js/jquery.textillate.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/prefixfree.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">

var ct = setInterval("calculate_time()",100); // Start clock.
function calculate_time()
{

 var end_time = "<?php echo $_SESSION["start_time"]; ?>"; // Get end time from session variable (total time in seconds).
 var dt = new Date(); // Create date object.
 var time_stamp = dt.getTime()/1000; // Get current minutes (converted to seconds).
 var total_time = end_time - Math.round(time_stamp); // Subtract current seconds from total seconds to get seconds remaining.
 var mins = Math.floor(total_time / 60); // Extract minutes from seconds remaining.
 var secs = total_time - (mins * 60); // Extract remainder seconds if any.
 if(secs < 10){secs = "0" + secs;} // Check if seconds are less than 10 and add a 0 in front.
 document.getElementById("timer").value = secs; // Display remaining minutes and seconds.
 // Check for end of time, stop clock and display message.
 
  if(secs <= 0)
  {
   clearInterval(ct);
   document.getElementById("timer").value = ":00";
   
  		$.post( "ajaxcall.php", function( data ) {});
		$('#usrtxt').val("Timer Up My Friend");
		location.reload();

   }
  
 }
<?php 	if (isset($stoptimer)&&$stoptimer) {?>
	$('#inp_box').css("visibility", "hidden");
	$('#sub_btn').val("Next");
	clearInterval(ct);
<?php }?>

 </script>
</body>
</html>
