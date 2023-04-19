<?php
    session_start();
    $user = $_SESSION['user'];
    include "connection.php";
    //設定字元集與連線校對
    mysqli_set_charset($db_link, 'utf8');
    //選擇資料庫
    if (!@mysqli_select_db($db_link, "socializor")) {
        die("資料庫選擇失敗!");
    }

    $rtitle = $_POST['rtitle'];
    $desc = $_POST['description'];
    $password = $_POST['password'];
    $rTime = date("Y-m-d H:i:s",strtotime('+6HOUR'));
    $query = "INSERT INTO room VALUES(NULL,'$user','$rtitle','$desc','$rTime','$password') ";
    $result = mysqli_query($db_link, $query);
    //取得其陣列
    if ($result) {
        ?>
            <script>alert('建立聊天室成功!');</script>
            <?php
        header("refresh:0;url=./user.php");
    }
    //若輸入錯誤帳號、密碼，則重新嘗試
    else {
      echo mysqli_error($db_link);
        ?>
            <script>alert('建立聊天室失敗!');</script>
            <?php
        header("refresh:60;url=./user.php");
    }
?>
