<?php
session_start(); 
if (!$_SESSION['login']) {
    header("location:index.php");
}else{
require_once 'connection.php';

$id=$_SESSION['login'];
$zap="SELECT id, wiadomosc, uzytkownik_id, uzytkownik_id2 FROM wiad WHERE uzytkownik_id='".$id."' OR uzytkownik_id2='".$id."'";



$wzap=mysqli_query($con,$zap);
if (!$wzap) {
    echo "<p id='nmw'>nie masz wiadomości</p>";
}else{
}

 if (isset($_POST['wyl'])) {
    unset($_SESSION['login']);
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
    <link rel="stylesheet" href="stylerozmowy.css">
    <script src="https://kit.fontawesome.com/9fe81ea0be.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">
</head>

<body>
    <div class="bg"></div>
    <form method="POST" action="rozmowy.php" id="form">
        <div class="settings">

            <ul id="list">
                <li><i class="fas fa-sign-out-alt"></i><input type="submit" value="Wyloguj" name="wyl" id="wyl"></li><br>
                <li><i class="fas fa-exchange-alt"></i><input type="submit" name="zmn" value="Zmień nick" id="zmn"></li><br>
                <li><i class="fas fa-exchange-alt"></i><input type="submit" name="zmnhsl" value="Zmień hasło" id="zmnhsl"></li><br>
                <li><i class="fas fa-user-minus"></i><input type="submit" name="usn" value="Usuń konto" id="usn"></li><br>
            </ul>
        </div>

        <div class="main">
            <div class="idodb"><input type="number" placeholder="Do kogo wysłać (ID)" name="idodb" id="idodb"><br></div>
            <div class="wrapper">
               <!-- Swiper -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
           <div id="twoje-id-wrapper">
                <?php 
                   echo "<p id='twoje-id'>Twoje ID to: (".$_SESSION['login'].")</p>";
             
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
        echo "<p id='idn'> Id nie istnieje</p>";
    }
}
                ?>
                </div>
            
            <div id="wiadomosci">
                <?php 
                    while ($wwzap=mysqli_fetch_array($wzap)) {
    $zap2="SELECT `login` FROM `uzytkownicy` WHERE id='".$wwzap['uzytkownik_id']."'";
$zap3="SELECT `login` FROM `uzytkownicy` WHERE id='".$wwzap['uzytkownik_id2']."'"; 
$wzap2=mysqli_query($con,$zap2);
$wwzap2=mysqli_fetch_array($wzap2);
$wzap3=mysqli_query($con,$zap3);
$wwzap3=mysqli_fetch_array($wzap3);
    if ($wwzap['uzytkownik_id2']==$_SESSION['login']) {
       echo "<div class='arrow-left'></div><p class='rozmowal'> ".$wwzap2['login']."(".$wwzap['uzytkownik_id'].") & ".$wwzap3['login']."(".$wwzap['uzytkownik_id2'].")<br>".$wwzap['wiadomosc']."<br></p>";
    }else{
    echo "<div class='arrow-right'></div><p class='rozmowa'> ".$wwzap2['login']."(".$wwzap['uzytkownik_id'].") & ".$wwzap3['login']."(".$wwzap['uzytkownik_id2'].")<br>".$wwzap['wiadomosc']."<br></p>";}
}
                   ?>
</div>
            </div>

        </div>
      </div>
      <div class="swiper-scrollbar"></div>
    </div>
           
            <div class="bottom">
                <input type="text" placeholder="Wiadomość" name="wiad" id="wiad">

                <button type="submit" name="wys" id="wys"><i class="fas fa-paper-plane"></i></button><br>
            </div>
        </div>

  <div class="box"></div>
    <div class="secondbox"></div>
    </form>
  
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        direction: "vertical",
        slidesPerView: "auto",
        freeMode: true,
        scrollbar: {
          el: ".swiper-scrollbar",
        },
        mousewheel: true,
      });
    </script>
</body>

</html>
