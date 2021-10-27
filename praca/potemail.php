<?php
require_once 'connection.php';  
if (isset($_POST['pot'])) {
	session_start();
	$mail=$_SESSION['email'];
	$ko1=$_SESSION['kod'];
	$ko2=$_POST['kod'];
	if ($ko1!=$ko2) {
		echo "<script type='text/javascript'>alert('KOD JEST BŁĘDNY')</script>";
	}else{
		unset($_SESSION['kod']);
		header("location:zmianaemailu.php");
	}

}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Zmiana hasła</title>
</head>
<body>
<form method="post" action="potemail.php">
	Podaj Kod:<input type="text" name="kod"><br>
	<input type="submit" name="pot" value="Potwierdź">
</form>
</body>
</html>