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
	$temat="Odzyskanie hasła";$a=rand(1,1000000000000000000);
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
	echo "<script type='text/javascript'>alert('E MAIL NIE ISTNIEJE W BAZIE')</script>";
}}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Resetowanie hasła</title>
</head>
<body><form method="post" action="recover.php">
Wprowadź email do konta:
<input type="text" name="email"><br>
<input type="submit" name="essa" value="resetuj">
</form></body>
</html>