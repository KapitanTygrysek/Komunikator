<?php 
require_once 'connection.php';
session_start();
if (!$_SESSION['login']){
		header("location:index.php");
	}else{
$id=$_SESSION['login'];
$login=$_SESSION['id'];


 if (isset($_POST['nn'])) {

     header("location:rozmowy.php");
 }}
?>
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
	<title>usuwanie kont</title>
</head>
<body>
<div class="bg"></div>
<form method="post" action="usun.php">
	<h1>Czy napewno chcesz usunąć konto</h1><br>
	<input type="password" name="hasl" placeholder="Wpisz hasło aby móc usunąć konto"><br>
	<input type="submit" name="tt" value="Potwierdź"><input type="submit" name="nn" value="Anuluj">
	<p class="komunikat">
	    <?php
        if (isset($_POST['tt'])) {
	$sql3="SELECT `haslo` FROM `uzytkownicy` WHERE id='".$id."'";
	$wsql3=mysqli_query($con,$sql3);
	$wwsql3=mysqli_fetch_array($wsql3);
	$pass=$_POST['hasl'];
if (password_verify($pass, $wwsql3['haslo'])) {
$sql = "DELETE FROM `uzytkownicy` WHERE id='".$id."'";
$sql2 = "DELETE FROM `wiad` WHERE `uzytkownik_id`= '".$id."' OR `uzytkownik_id2`= '".$id."'";
mysqli_query($con,$sql2);
mysqli_query($con,$sql);
 	unset($_SESSION['login']);
header("location:index.php");
}else{
	echo "Błędne hasło";
}}
        ?>
	</p>
</form>
</body>
</html>