<?php
    session_start();
   
    $user = $_SESSION['user'];
    include("connection.php");
    //設定字元集與連線校對
    mysqli_set_charset($db_link,'utf8');
    //選擇資料庫
    if(!@mysqli_select_db($db_link,"socializor")) die("資料庫選擇失敗!");
    
    $ident = $_POST['ident'];
    $header = $_POST['postheader'];
    $pcontent = $_POST['pcontent'];
    $pTime = date("Y-m-d H:i:s",strtotime('+6HOUR'));
    $query = "UPDATE post SET ident = '$ident', header = '$header', pcontent = '$pcontent', pTime = '$pTime' ";
    $result = mysqli_query($db_link, $query); 
    if ($result!=NULL) {?>
        <script>alert('修改貼文成功!');</script>
       <?php 
       header("refresh:0;url=./user.php");
    }

?>