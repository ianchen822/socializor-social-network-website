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
    
    $oldpsw = $_POST['oldpsw'];   
    $newpsw = $_POST['newpsw'];

    $query = "SELECT mpsw FROM member WHERE mId = '$user' ";
    $confirm = mysqli_query($db_link, $query);
    $confirmpsw = mysqli_fetch_assoc($confirm);
    if ($oldpsw != $confirmpsw['mpsw']) {?>
        <script>alert('修改密碼失敗，可能是舊密碼錯誤!');</script>
        <?php 
        header("refresh:0;url=./userinfo.php");
    }
    else{
        $query1 = "UPDATE member SET mpsw = '$newpsw' WHERE mId = '$user' ";
        $result = mysqli_query($db_link, $query1); 
        if ($result) {?>
            <script>alert('修改密碼成功!');</script>
            <?php 
            header("refresh:0;url=./userinfo.php");
        }
    }   
?>