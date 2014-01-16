<?php
session_start();
$useranswer=$_POST['answerbox'];
$sysanswer=$_SESSION['answer'];
if (strcasecmp($useranswer,$sysanswer)==0) {
		
		echo $_SESSION['descrip'];
		$_SESSION['mark']=$_SESSION['mark']+1;
					}
					echo "<br/> Ur mark".$_SESSION['mark'];
?>
