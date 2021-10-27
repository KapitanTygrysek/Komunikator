<?php 
//logowanie
require_once 'connection.php';
$email="";
$haslo="";
if(isset($_POST['zalogujj'])){
  $email=$_POST['email'];
  $haslo=($_POST['haslo']);

  $sql=mysqli_query($con,"SELECT id,login, haslo, email FROM uzytkownicy WHERE email='".$email."' ");
  $wynik = mysqli_fetch_array($sql);
  if (password_verify(@$haslo, @$wynik['haslo'])) {
    //Start sesji
    session_start();
    $_SESSION['login']=$wynik['id'];
    $_SESSION['id']=$wynik['login'];
    header("Location: rozmowy.php");
  }else
  {
    echo "Błędne dane";
  }
  }

//REJESTRACJA
$login="";
$haslo1="";
$haslo2="";
$email="";
mysqli_connect("localhost","root","","baza");
if (isset($_POST['rejestruj'])) {
  $login= $_POST['login'];

  $haslo1= $_POST['haslo1'];
  $haslo2= $_POST['haslo2'];
  $haslo=password_hash($haslo1, PASSWORD_DEFAULT);
  $email= $_POST['email'];
  $spre=mysqli_query($con,"SELECT count(email) FROM uzytkownicy WHERE email='".$email."' ");
  $spre2=mysqli_query($con,"SELECT count(login) FROM uzytkownicy WHERE login='".$login."' ");
  $r2=mysqli_fetch_array($spre2);
  $r=mysqli_fetch_array($spre);
  if ($r2['count(login)']!=0) {
    echo "Nick istnieje";
  }else{
  if ($r['count(email)']!=0) {
  echo "E-mail istnieje";
  }else{
  $sql = "INSERT INTO uzytkownicy(id, login, haslo, email) VALUES ('','$login','$haslo','$email')";
  $polacz =mysqli_connect("localhost","root","","baza");
  if ($haslo1==$haslo2) {

    $result=$polacz->query($sql);
    if (!$result) {
      echo "nie pykło";
    }else{
      $ziap="SELECT`id` FROM `uzytkownicy` ORDER BY `uzytkownicy`.`id` DESC";
    $ziup=mysqli_query($con,$ziap);
    $id=mysqli_fetch_array($ziup);
     $zapppp="INSERT INTO `wiad`(`id`, `wiadomosc`, `uzytkownik_id`, `uzytkownik_id2`) VALUES ('','Witaj w komunikatorze','".$id['id']."','0')";
    //$polacz->query($zapppp);
  }
  }else
  {
    echo "hasło jest błędne";
  }
}
}}
 ?>
<!DOCTYPE html>
<html lang="pl">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="style.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>logowanie</title>
</head>

<body>
  <div class="container">
      <div class="blueBg">
      <div class="box signin">
      <h2>Posiadasz już konto?</h2>
      <button class="signinBtn" >zaloguj się</button>
      </div>
         <div class="box signup">
      <h2>Nie posiadasz jeszcze konta?</h2>
      <button class="signupBtn">zarejestruj się</button>
      </div>
      </div>
      <div class="formBx">
          <div class="form signinForm">
             <form action="index.php" method="post">
              <!--formularz logowania się -->
             <h3>Zaloguj się</h3>
              <input type="text" name="email" placeholder="E-mail użytkownika">
                <input type="password" name="haslo" placeholder="hasło">
                <input type="submit" value="zaloguj się" name="zalogujj">
                </form>
          </div>
         
               <div class="form signupForm">
             <form action="index.php" method="post">
              <!--formularz rejestracji -->
             <h3>Zarejestruj się</h3>

              <input type="text" name="login" placeholder="nazwa użytkownika">
               
                 <input type="text" name="email" placeholder="E-mail">
                  <input type="password" name="haslo1" placeholder="hasło">
                   <input type="password" name="haslo2" placeholder=" potwierdz hasło">
                <input type="submit" value="zarejestruj się" name="rejestruj" >
                </form>
          </div>
      </div>
  </div>
  <script>
    const signinBtn = document.querySelector('.signinBtn');
      const signupBtn = document.querySelector('.signupBtn');
      const formBx = document.querySelector('.formBx');
      const body = document.querySelector('body')
      signupBtn.onclick = function(){
          formBx.classList.add('active')
          body.classList.add('active')
          
      }
        signinBtn.onclick = function(){
          formBx.classList.remove('active')
           body.classList.remove('active')
         
      }
    </script>
</body>

</html>
