
 <!DOCTYPE html>
 <html>

 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="pl">
    <title>ZMIANA NICKU</title>
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
 <form method="post" action="zmiana.php">
 	<h1>Zmień swój nick</h1><br>
 	<input type="text" name="zmiana" id="zmiana" placeholder="wprowadź nick"><br>
 	<input type="submit" name="zmna" value="Zmień" id="zmna"><br>
 	<input type="submit" name="wyjscie" value="Wyjście" id="wyjscie">
 	<p class="komunikat"> 	<?php 
	require_once 'connection.php';
	session_start();
	if (!$_SESSION['login']){
		header("location:index.php");
	}else{
	if (isset($_POST['zmna'])) {
		$loginnew=$_POST['zmiana'];
		if ($loginnew=="") {
			echo "wprowadź dane";
		}else{
	$login=$_SESSION['id'];
	$spre=mysqli_query($con,"SELECT count(login) FROM uzytkownicy WHERE login='".$loginnew."' ");
  	$r=mysqli_fetch_array($spre);
  	if ($r['count(login)']!=0) {
  	echo "wprowadzona nazwa użytkownika jest zajęta wybierz inną ;)";
  }else{
  	$zap="UPDATE uzytkownicy SET login='".$loginnew."' WHERE login='".$login."'";
  	$wsql=mysqli_query($con,$zap);
  	
  	if (!$wsql) {
  		echo "Nie ma szans mordzia";
  	}else{
  		echo "pomyśla zmiana nicku";
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
 ?></p>
 </form>
 </body>
 </html>