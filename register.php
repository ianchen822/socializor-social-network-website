<?php
include "connection.php";
//設定字元集與連線校對
mysqli_set_charset($db_link, 'utf8');
//選擇資料庫
if (!@mysqli_select_db($db_link, "socializor")) {
	die("資料庫選擇失敗!");
}

$mId = create_uuid();
$dep = $_POST['dep'];
$gender = $_POST['gender'];
$name = $_POST['name'];
$nickname = $_POST['displayname'];
$email = $_POST['email1'];
$psw = $_POST['password1'];
$ver = create_randomid();
$query = "INSERT INTO member VALUES( '$mId', '$name','$nickname','$email','$psw','$gender','$dep','$ver','')";
$result = mysqli_query($db_link, $query);
//取得其陣列
if ($result) {
	?>
            <script>alert('註冊成功, 請至信箱檢查驗證信!');</script>
            <?php

	header("refresh:0;url=./sendemail.php?veremail=$email & vertoken=$ver ");
}
//若輸入錯誤帳號、密碼，則重新嘗試
else {
	?>
            <script>alert('註冊失敗!');</script>
            <?php
header("refresh:0;url=./login.php");
}

function create_uuid($prefix = "") {
	$str = md5(uniqid(mt_rand(), true));
	$uuid = substr($str, 0, 8) . '-';
	$uuid .= substr($str, 8, 4) . '-';
	$uuid .= substr($str, 12, 4) . '-';
	$uuid .= substr($str, 16, 4) . '-';
	$uuid .= substr($str, 20, 12);
	return $prefix . $uuid;
}

function create_randomid() {
	return rand((int) 100000, (int) 999999);
}
?>