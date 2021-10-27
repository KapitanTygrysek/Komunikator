<?php
require_once 'connection.php';
session_start();
$mail=$_SESSION['email'];
if (isset($_POST['zmiana'])) {
$has1=$_POST['has1'];
$has2=$_POST['has2'];
$haslo=password_hash($has1, PASSWORD_DEFAULT);
if ($has1!=$has2) {
	echo "<script type='text/javascript'>alert('Hasła nie są zgodne')</script>";
}else{
 $sql="UPDATE `uzytkownicy` SET `haslo`='".$haslo."'WHERE `email`='".$mail."'";
 mysqli_query($con,$sql);
 header("location:index.php");
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
<form method="post" action="zmianaemailu.php">
	Wprowadź hasło:<input type="password" name="has1"><br>
	Potwierdź hasło:<input type="password" name="has2"><br>
	<input type="submit" name="zmiana" value="Zmień">
</form>
</body>
</html>