
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
<form method="post" action="zmianaemailu.php">
<h1>Wprowadź nowe hasło</h1>
	<input type="password" name="has1" placeholder="Wprowadź hasło:"><br>
	<input type="password" name="has2" placeholder="Potwierdź hasło:"><br>
	<input type="submit" name="zmiana" value="Zmień">
	<p class="komunikat">
	    <?php
require_once 'connection.php';
session_start();
$mail=$_SESSION['email'];
if (isset($_POST['zmiana'])) {
$has1=$_POST['has1'];
$has2=$_POST['has2'];
$haslo=password_hash($has1, PASSWORD_DEFAULT);
if ($has1!=$has2) {
	echo "Hasła nie są zgodne";
}else{
 $sql="UPDATE `uzytkownicy` SET `haslo`='".$haslo."'WHERE `email`='".$mail."'";
 mysqli_query($con,$sql);
 header("location:index.php");
}	
}

?>
	</p>
</form>
</body>
</html>