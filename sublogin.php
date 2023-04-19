<?php
include "connection.php";
//設定字元集與連線校對
mysqli_set_charset($db_link, 'utf8');
//選擇資料庫
if (!@mysqli_select_db($db_link, "socializor")) {
	die("資料庫選擇失敗!");
}

$email = $_POST['email'];
$psw = $_POST['password'];
$query = "SELECT * FROM member WHERE email = '$email' AND mpsw = '$psw' AND verification = '1' ";
$result = mysqli_query($db_link, $query);
//取得其陣列
$row_result = mysqli_fetch_assoc($result);
if ($row_result) {
	?>
        <script>alert('登入成功!');</script>
        <?php
//啟動session
	session_start();
	$_SESSION['user'] = $row_result['mId'];
	$user = $_SESSION['user'];
	header("refresh:0;url=./user.php");
}
//若輸入錯誤帳號、密碼，則重新嘗試
else {
	?>
        <script>alert('帳號密碼輸入錯誤or尚未驗證信箱!');</script>
        <?php
header("refresh:0;url=./login.php");
}
?>