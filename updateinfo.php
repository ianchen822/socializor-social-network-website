<?php
    //啟動session
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: ./home.php");
    }
    $user = $_SESSION['user'];
    include("connection.php");
    //設定字元集與連線校對
    mysqli_set_charset($db_link,'utf8');
    //選擇資料庫
    if(!@mysqli_select_db($db_link,"socializor")) die("資料庫選擇失敗!");
    
    $dep = $_POST['dep'];
    $gender = $_POST['gender'];
    $name = $_POST['name'];
    $nickname = $_POST['displayname'];
    
    $query = "UPDATE member SET name = '$name', nickname = '$nickname', gender = '$gender', dep = '$dep' WHERE mId='$user'";
    $result = mysqli_query($db_link, $query); 
    //取得其陣列
    if ($result) {?>
        <script>alert('修改資料成功!');</script>
        <?php 
        header("refresh:0;url=./userinfo.php");
    }
    //若輸入錯誤帳號、密碼，則重新嘗試
    else{?>
        <script>alert('修改資料失敗!');</script>
        <?php 
        header("refresh:0;url=./userinfo.php");
    }

   
?>