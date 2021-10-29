<?php
session_start(); 
if (!$_SESSION['login']) {
    header("location:index.php");
}else{
require_once 'connection.php';
echo "Twoje ID to: (".$_SESSION['login'].")";
$id=$_SESSION['login'];
$zap="SELECT id, wiadomosc, uzytkownik_id, uzytkownik_id2 FROM wiad WHERE uzytkownik_id='".$id."' OR uzytkownik_id2='".$id."'";



$wzap=mysqli_query($con,$zap);
if (!$wzap) {
    echo "nie masz wiadomości";
}else{
while ($wwzap=mysqli_fetch_array($wzap)) {
    $zap2="SELECT `login` FROM `uzytkownicy` WHERE id='".$wwzap['uzytkownik_id']."'";
$zap3="SELECT `login` FROM `uzytkownicy` WHERE id='".$wwzap['uzytkownik_id2']."'";
$wzap2=mysqli_query($con,$zap2);
$wwzap2=mysqli_fetch_array($wzap2);
$wzap3=mysqli_query($con,$zap3);
$wwzap3=mysqli_fetch_array($wzap3);
    echo "<p id='rozmowa'>Rozmowa między ".$wwzap2['login']."(".$wwzap['uzytkownik_id'].") a ".$wwzap3['login']."(".$wwzap['uzytkownik_id2'].")<br>".$wwzap['wiadomosc']."<br></p>";
}}
    if (isset($_POST['wys'])) {
    $idodb=$_POST['idodb'];
    $wiad=$_POST['wiad'];
    $zap="INSERT INTO wiad VALUES (NUll,'".$wiad."','".$id."','".$idodb."')";
    $_SESSION['idzap']=$idodb;
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
    unset($_SESSION['idzap']);
    mysqli_close($con);
 	header("location:index.php");	
 }
 if (isset($_POST['zmn'])) {
     header("location:zmiana.php");
 }
 if (isset($_POST['usn'])) {
     header("location:usun.php");
 }
 if (isset($_POST['kont'])) {
     header("location:kontakty.php");
 }
 if (isset($_POST['zmnhsl'])) {
     header("location:zmnhsl.php");
 }
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Language" content="pl">
 	<title>Komunikator</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
 </head>
 <body>
<form method="POST" action="rozmowy.php">
    Do kogo wysłać (ID)<input type="number" name="idodb" <?php echo "value='".@$_SESSION['idzap']."'"; ?>><br>
    Wiadomość<input type="text" name="wiad" id="essa"><br>
    <input type="submit" value="Wyślij"name="wys"><br>
    <input type="submit" value="Kontakty" name="kont"><br>
    <input type="submit" value="Wyloguj" name="wyl"><br>
    <input type="submit" name="zmn" value="Zmień nick"><br>
    <input type="submit" name="zmnhsl" value="Zmień hasło"><br>
    <input type="submit" name="usn" value="Usuń konto"><br>
</form>
 </body>
 </html>

