	<?php 
	require_once 'connection.php';
	session_start();
	if (!$_SESSION['login']){
		header("location:index.php");
	}else{
	if (isset($_POST['zmna'])) {
		$loginnew=$_POST['zmiana'];
		if ($loginnew=="") {
			echo "<script type='text/javascript'>alert('wpisz dane')</script>";
		}else{
	$login=$_SESSION['id'];
	$spre=mysqli_query($con,"SELECT count(login) FROM uzytkownicy WHERE login='".$loginnew."' ");
  	$r=mysqli_fetch_array($spre);
  	if ($r['count(login)']!=0) {
  	echo "Login jest w użytku wybierz inny";
  }else{
  	$zap="UPDATE uzytkownicy SET login='".$loginnew."' WHERE login='".$login."'";
  	$wsql=mysqli_query($con,$zap);
  	
  	if (!$wsql) {
  		echo "Nie udało się ";
  	}else{
  		echo "<script type='text/javascript'>alert('pomyśla zmiana nicku')</script>";
  		unset($_SESSION['login']);
  		unset($_SESSION['id']);
  		header("location:index.php");
  	}
  }	
	}
	}
  if (isset($_POST['wyjscie'])) {
  	header("location:rozmowy.php");
  }}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>ZMIANA NICKU</title>

 </head>
 <body>
 <form method="post" action="zmiana.php">
 	<h1>Zmień swój nick</h1><br>
 	<input type="text" name="zmiana"><br>
 	<input type="submit" name="zmna" value="Zmień"><br>
 	<input type="submit" name="wyjscie" value="Wyjście">
 </form>
 </body>
 </html>