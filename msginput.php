<?php
    session_start();
    $user = $_SESSION['user'];
    include("connection.php");
    //設定字元集與連線校對
    mysqli_set_charset($db_link,'utf8');
    //選擇資料庫
    if(!@mysqli_select_db($db_link,"socializor")) die("資料庫選擇失敗!");
    // $cId = create_randomid();

    $roomid = $_GET['roomid'];
    $msginput = $_POST['msginput'];
    $crTime = date("Y-m-d H:i:s",strtotime('+6HOUR'));
    $query = "INSERT INTO chatrecord VALUES( '', '$roomid', '$user', '$msginput','$crTime')";
    $result = mysqli_query($db_link, $query); 

    

    if ($result!=NULL) {
        header("refresh:0;url=./user.php");
    }
?>