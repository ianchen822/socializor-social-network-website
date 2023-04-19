<?php
    session_start();
   
    $user = $_SESSION['user'];
    include("connection.php");
    //設定字元集與連線校對
    mysqli_set_charset($db_link,'utf8');
    //選擇資料庫
    if(!@mysqli_select_db($db_link,"socializor")) die("資料庫選擇失敗!");
    
    $commentid = $_GET['cId'];

    $query = "DELETE FROM comment WHERE cId = '$commentid' ";
    $result = mysqli_query($db_link, $query); 
    if ($result!=NULL) {?>
        <script>alert('刪除留言成功!');</script>
       <?php 
       header("refresh:0;url=./user.php");
    }

?>