<?php 
require_once 'connection.php';
session_start();
$id=$_SESSION['login'];
$zap="SELECT id, wiadomosc, uzytkownik_id, uzytkownik_id2 FROM wiad WHERE uzytkownik_id='".$id."' OR uzytkownik_id2='".$id."'";
$wzap=mysqli_query($con,$zap);
if (!$wzap) {
    echo "nie masz wiadomości";
}else{
while ($wwzap=mysqli_fetch_array($wzap)) {
    echo "<p id='rozmowa'>Rozmowa między ".$wwzap['uzytkownik_id']." a ".$wwzap['uzytkownik_id2']."<br>".$wwzap['wiadomosc']."<br></p>";
}}
    if (isset($_POST['wys'])) {
    $idodb=$_POST['idodb'];
    $wiad=$_POST['wiad'];
    $zap="INSERT INTO wiad VALUES (NUll,'".$wiad."','".$id."','".$idodb."')";

  $spre=mysqli_query($con,"SELECT count(id) FROM uzytkownicy WHERE id='".$idodb."' ");
  $r=mysqli_fetch_array($spre);
  if ($r['count(id)']!=0) 
    {
    mysqli_query($con,$zap);
    header("Location:rozmowy.php");
    }else
    {
        echo "Id nie istnieje";
    }
}
 if (isset($_POST['wyl'])) {
 	unset($_SESSION['login']);
 	header("location:index.php");	
 }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Language" content="pl">
 	<title>Komunikator</title>
 </head>
 <body>
<form method="POST" action="rozmowy.php">
    Do kogo wysłać (ID)<input type="number" name="idodb"><br>
    Wiadomość<input type="text" name="wiad"><br>
    <input type="submit" value="Wyślij"name="wys"><br>
    <input type="submit" value="Wyloguj" name="wyl">
</form>
 </body>
 </html>

