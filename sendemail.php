<?php

include "class.phpmailer.php";
include "class.smtp.php";
$email = $_GET['veremail'];
$token = $_GET['vertoken'];

$mail = new PHPMailer();

$mail->Debug = 3;
$mail->CharSet = 'utf-8';
//使用 SMTP 寄信
$mail->IsSMTP();
//SMTP 伺服器位址
$mail->Host = "smtp.gmail.com";
//SMTP 伺服器是否需要驗證
$mail->SMTPAuth = true;

//SMTP 伺服器使用者名稱
$mail->Username = "socializor2020@gmail.com";
//SMTP 伺服器使用者密碼
$mail->Password = "socia88lizor";
$mail->SMTPSecure = "ssl";
//SMTP 伺服器連線 Port
$mail->Port = 465;

//寄件人信箱, 收件人姓名
$mail->SetFrom('socializor2020@gmail.com', 'Socializor.com');
//收件人信箱, 收件人姓名
$mail->AddAddress("$email");
$mail->isHTML(true);
//信件主題
$mail->Subject = "感謝您註冊Socializor會員，請輸入驗證碼!";

$body = "<strong>這是您的驗證碼，驗證完畢後帳號就可開通!</strong><br>
		<strong>驗證碼</strong> : $token<br>
		<strong>認證連結</strong> : <a href='localhost/verify.php?veremail=$email '>localhost/verify.php</a>";
$mail->Body = $body;

if (!$mail->send()) {
	echo $mail->ErrorInfo;
}
header("refresh:0;url=./login.php");
?>
