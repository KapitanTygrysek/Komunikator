<?php 
require_once 'connection.php';
session_start();
if (!$_SESSION['login']){
		header("location:index.php");
	}else{
$id=$_SESSION['login'];
$login=$_SESSION['id'];
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
	echo "<script type='text/javascript'>alert('Błędne hasło')</script>";
}}

 if (isset($_POST['nn'])) {

     header("location:rozmowy.php");
 }}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>usuwanie kont</title>
</head>
<body>
<form method="post" action="usun.php">
	<h1>Czy napewno chcesz usunąć konto</h1><br>
	Wpisz hasło aby móc usunąć konto<input type="password" name="hasl"><br>
	<input type="submit" name="tt" value="tak"><input type="submit" name="nn" value="Nie">
</form>
</body>
</html>