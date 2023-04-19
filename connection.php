<?php	
	//連線設定 
	$db_host = "localhost";
	$db_username = "ian";
	$db_password = "8888";
	//連線伺服器
	$db_link = @mysqli_connect($db_host, $db_username, $db_password);
	if (!$db_link) die("資料連結失敗！");
?>