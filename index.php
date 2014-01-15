<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
// if (isset($_SESSION['name'])) {
// header('Location: questions.php');
// }

?>

<html>
<head>
<title></title>
</head>
<body>

		
		
		<form name="login" action="questions.php" method="post" >
		<input type="text" name="empid" maxlength="20" value=""/>
		<input type="text" name="name" maxlength="20" value=""/>
		<input type="submit" name="login" value="Login" />
		</form>
</body>
</html>