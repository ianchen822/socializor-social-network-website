<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>search</title>
        <link rel="stylesheet" type="text/css" href="web.css">
    </head>
    <body>
        <div class="postheadersticky" id='postheadersticky' >
			<h2>搜尋貼文結果</h2>
		</div>	
        <?php
            //與資料庫連線
            include("connection.php");
            //設定字元集與連線校對
            mysqli_set_charset($db_link,'utf8');
            //選擇資料庫
            if(!@mysqli_select_db($db_link,"socializor")) die("資料庫選擇失敗!");

            if (isset($_GET['s'])) { // 如果有搜尋文字顯示搜尋結果

                $s = mysqli_real_escape_string($db_link, $_GET['s']);
                $sql = "SELECT * FROM post WHERE header LIKE '%" . $s . "%' OR pcontent LIKE '%" . $s . "%' OR ident LIKE '%" . $s . "%'";
                $result = mysqli_query($db_link, $sql);
        
                // SQL 搜尋錯誤訊息
                if (!$result) {
                    echo ("錯誤：" . mysqli_error($con));
                    exit();
                }
        
                // 搜尋有資料時顯示搜尋結果
                while ($post = mysqli_fetch_array($result)) {
                    echo "<div class='post' onclick='createmodal(".$post['pId'].")'>";
					    echo "<div class='posterinfo'>";
						    echo "<p>".$post['pcategory']."&nbsp"."</p>";
						    echo "<p>".$post['ident']."&nbsp"."</p>";
						    echo "<p>".$post['pTime']."&nbsp"."</p>";
					    echo "</div>";
					    echo "<p class='posterheader'>".$post['header']."</p>";
					    echo "<p class='tover'>".$post['pcontent']."</p>";
				    echo "</div>";
                }
            }    
        ?>
    </body>
</html>