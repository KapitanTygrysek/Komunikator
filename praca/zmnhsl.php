<?php 
session_start();
require_once 'connection.php';
$id=$_SESSION['login'];
if (isset($_POST['zmiena'])) {
	$pas1=$_POST['has1'];
	$pas2=$_POST['has2'];
	if ($pas1!=$pas2) {
		echo "<script type='text/javascript'>alert('Hasła nie są zgodne')</script>";
	}else{
		$haslo=password_hash($pas1, PASSWORD_DEFAULT);
		$sql="UPDATE `uzytkownicy` SET `haslo`='".$haslo."'WHERE id='".$id."'";
		$wynik=mysqli_query($con,$sql);
		if (!$wynik) {
			echo "<script type='text/javascript'>alert('Nie udało się zmienić hasła')</script>";
		}else{
			unset($_SESSION['login']);
			header("location:index.php");
		}
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
<form method="post" action="zmnhsl.php">
	Podaj nowe hasło <input type="password" name="has1"><br>
	Potwierdź hasło<input type="password" name="has2"><br>
	<input type="submit" value="Zmień" name="zmiena">
</form>
</body>
</html>