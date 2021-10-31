
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="pl">
    <link rel="stylesheet" href="stylepodstrony.css">
    <script src="https://kit.fontawesome.com/9fe81ea0be.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Zmiana hasła</title>
</head>
<body>
<div class="bg"></div>

<form method="post" action="zmnhsl.php" id="zmnhslform">
 <h1>Zmień hasło</h1>
	 <input type="password" name="has1" placeholder="Podaj nowe hasło"><br>
	<input type="password" name="has2" placeholder="Potwierdź hasło"><br>
	<input type="submit" value="Zmień" name="zmiena"><br>
	<input type="submit" name="pow" value="Powrót">
	<p class="komunikat">
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
			echo "'Nie udało się zmienić hasła";
		}else{
			unset($_SESSION['login']);
			header("location:index.php");
		}
	}
}
if (isset($_POST['pow'])) {
	header("location:rozmowy.php");
}
?>
	</p>
</form>
</body>
</html>