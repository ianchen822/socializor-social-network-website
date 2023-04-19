<?php
    session_start();
   
    $user = $_SESSION['user'];
    include("connection.php");
    //設定字元集與連線校對
    mysqli_set_charset($db_link,'utf8');
    //選擇資料庫
    if(!@mysqli_select_db($db_link,"socializor")) die("資料庫選擇失敗!");
    $cId = create_randomid();

    $postid = $_POST['postid'];
    $ident = $_POST['ident'];
    $ccontent = $_POST['ccontent'];
    $cTime = date("Y-m-d H:i:s",strtotime('+6HOUR'));
    $query = "INSERT INTO comment VALUES( '$cId', '$postid', '$ident', '$user','$ccontent','$cTime')";
    $result = mysqli_query($db_link, $query); 

    if ($result!=NULL) {?>
        <script>alert('留言成功!');</script>
       <?php 
       header("refresh:0;url=./user.php");
    }

    function create_randomid(){
        return rand((int)1000000000000000,(int)9999999999999999);
    }  
?>