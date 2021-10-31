<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="pl">
    <link rel="stylesheet" href="stylepodstrony.css">
    <script src="https://kit.fontawesome.com/9fe81ea0be.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resetowanie hasła</title>
</head>

<body>
   <div class="bg"></div>
    <form method="post" action="recover.php" >
        <h1>Odzyskaj hasło</h1>
        <input type="text" name="email" placeholder="Wprowadź email do konta:"><br>
        <input type="submit" name="essa" value="resetuj">
        <p class="komunikat">
            <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require_once 'connection.php';
if (isset($_POST['essa'])) {
	$email=$_POST['email'];
	$spre=mysqli_query($con,"SELECT count(email) FROM uzytkownicy WHERE email='".$email."' ");
	$r=mysqli_fetch_array($spre);
	if ($r['count(email)']!=0) {
	$imie = "asd";
	$temat="Odzyskanie hasła";$a=rand(100000,999999);	
	$tresc="Twój kod odzyskania to:<br>".$a;
	
date_default_timezone_set('Europe/Warsaw');

$mail = new PHPMailer(true);
try {
 $mail->isSMTP(); // Używamy SMTP
 $mail->Host = 'smtp.gmail.com'; // Adres serwera SMTP
 $mail->SMTPAuth = true; // Autoryzacja (do) SMTP
 $mail->Username = "adamzgodka33@gmail.com"; // Nazwa użytkownika
 $mail->Password = "K#8t*3mv*E%CU79v"; // Hasło
 $mail->SMTPSecure = 'tls'; // Typ szyfrowania (TLS/SSL)
 $mail->Port = 587; // Port

 $mail->CharSet = "UTF-8";
 $mail->setLanguage('pl', '/phpmailer/language');

 $mail->setFrom('adamzgodka33@gmail.com', 'Bot rozsyłający poczte');
 $mail->addAddress($email, 'Użytkownik');
 $mail->addReplyTo($email, $imie);

 $mail->isHTML(true); // Format: HTML
 $mail->Subject = $temat;
 $mail->Body = $tresc;
 $mail->AltBody = 'By wyświetlić wiadomość należy skorzystać z czytnika obsługującego wiadomości w formie HTML';
if (!$mail->send()) {
	echo "błąd wysłania";
}else{
	session_start();
	$_SESSION['email']=$email;
	$_SESSION['kod']=$a;
	header("location:potemail.php");
}
} catch (Exception $e) {
 // Gdy błąd:
echo "błąd<br>";
echo 'Mailer Error: ' . $mail->ErrorInfo;
}



}else{
	echo "E-MAIL NIE ISTNIEJE W BAZIE";
}}
    ?>
        </p>
    </form>
</body>

</html>
