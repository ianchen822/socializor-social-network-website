<?php
    session_start();
   
    $user = $_SESSION['user'];
    include("connection.php");
    //設定字元集與連線校對
    mysqli_set_charset($db_link,'utf8');
    //選擇資料庫
    if(!@mysqli_select_db($db_link,"socializor")) die("資料庫選擇失敗!");
    
    $postid = $_GET['pId'];

    $query = "DELETE FROM post  WHERE pId = '$postid' ";
    $result = mysqli_query($db_link, $query); 
    $query1 = "DELETE FROM comment WHERE post = '$postid' ";
    $result1 = mysqli_query($db_link, $query1);
    if ($result!=NULL) {?>
        <script>alert('刪除貼文成功!');</script>
       <?php 
       header("refresh:0;url=./user.php");
    }

?>