
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Zmiana hasła</title>
	   <link rel="stylesheet" href="stylepodstrony.css">
    <script src="https://kit.fontawesome.com/9fe81ea0be.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
<div class="bg"></div>
<form method="post" action="potemail.php">
<h2>Wprowadź kod z wiadomości wysłanej na adres e-mail</h2>
	<input type="text" name="kod" placeholder="Podaj Kod"><br>
	<input type="submit" name="pot" value="Potwierdź">
	<p class="komunikat">
<?php
require_once 'connection.php';  
if (isset($_POST['pot'])) {
	session_start();
	$mail=$_SESSION['email'];
	$ko1=$_SESSION['kod'];
	$ko2=$_POST['kod'];
	if ($ko1!=$ko2) {
		echo "KOD JEST BŁĘDNY";
	}else{
		unset($_SESSION['kod']);
		header("location:zmianaemailu.php");
	}

}
 

?>
	</p>
</form>
</body>
</html>