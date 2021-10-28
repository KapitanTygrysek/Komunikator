<?php
require_once 'connection.php';
$sql="SELECT `id`, `login`FROM `uzytkownicy`";
$wsql=mysqli_query($con,$sql);
while ($wwsql=mysqli_fetch_array($wsql)) {
	echo "ID:(".$wwsql['id'].") Nick:(".$wwsql['login'].")";
}
if (isset($_POST['powrot'])) {
	header("location:rozmowy.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kontatky</title>
</head>
<body>
	<form method="post" action="kontakty.php">
<input type="submit" name="powrot" value="Powrót">
</form></body>
</html>