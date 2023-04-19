<?php
include "connection.php";
//設定字元集與連線校對
mysqli_set_charset($db_link, 'utf8');
//選擇資料庫
if (!@mysqli_select_db($db_link, "socializor")) {
	die("資料庫選擇失敗!");
}

$token = $_POST['secretToken'];
$email = $_GET['veremail'];

$query = "SELECT * FROM member WHERE email = '$email' AND verification = '$token' ";
$result = mysqli_query($db_link, $query);
//取得其陣列
$row_result = mysqli_fetch_assoc($result);
if ($row_result) {

	$query1 = "UPDATE member SET verification = '1' WHERE email = '$email' AND verification = '$token'";
	$result1 = mysqli_query($db_link, $query1);
	?>
        <script>alert('驗證成功!');</script>
        <?php
header("refresh:0;url=./login.php");
}
//若輸入錯誤帳號、密碼，則重新嘗試
else {
	?>
        <script>alert('驗證信箱失敗!');</script>
        <?php
header("refresh:0;url=./verify.php?veremail=$email ");
}
?>