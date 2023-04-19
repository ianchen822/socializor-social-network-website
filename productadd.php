<!DOCTYPE html>
<?php
    //與資料庫連線
	include("conn.php");
     //設定字元集與連線校對
	mysqli_set_charset($db_link,'utf8');
    //選擇資料庫
	if(!@mysqli_select_db($db_link,"ec")) die("資料庫選擇失敗!");
    //判斷是否提交選單
	if(isset($_POST["action"])&&($_POST["action"] == "add")){
        //開啟圖片檔
        $file = fopen($_FILES["picture"]["tmp_name"], 'r');
        // 讀入圖片檔資料
        $fileContents = fread($file, filesize($_FILES["picture"]["tmp_name"]));
        //關閉圖片檔
        fclose($file);
        // 圖片檔案資料編碼
        $Contents = base64_encode($fileContents);
      
        //新增個個資料
        $sql_query = "INSERT INTO product(category1,category2,id,name,price,format,amount,picture,intro,status) VALUES(";
		$sql_query.= "'".$_POST["category1"]."',";
		$sql_query.= "'".$_POST["category2"]."',";
		$sql_query.= "'".$_POST["id"]."',";
		$sql_query.= "'".$_POST["name"]."',";
		$sql_query.= "'".$_POST["price"]."',";
		$sql_query.= "'".$_POST["format"]."',";
		$sql_query.= "'".$_POST["amount"]."',";
        $sql_query.= "'".$Contents."',";
		$sql_query.= "'".$_POST["intro"]."',";
		$sql_query.= "'販售中')";

		//把上述動作執行
		mysqli_query($db_link, $sql_query);
        
		//重新導向回到主畫面
		header("Location: manager.php");
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新增商品資料</title>
    <link rel="stylesheet" type="text/css" href="mycss.css">
</head>
<body>
    <!-- 標題 -->
	<h1 align="center">新增商品</h1>
    <!-- 表單 -->
	<form action="" method="post" enctype="multipart/form-data">
        <!-- 表格 -->
		<table border="1" align="center" cellpadding="4">
            <!-- 大分類 -->
    		<tr>
      			<td class='tdcolor1'>所屬大類</td><td class='tdcolor2'>
      				<select name="category1">
      					<option value = "流行皮件">流行皮件</option>
      					<option value = "流行鞋區">流行鞋區</option>
      					<option value = "流行飾品">流行飾品</option>
      					<option value = "背包">背包</option>
      					<option value = "手錶">手錶</option>
      					<option value = "流行區">流行區</option>
      				</select>
      			</td>
    		</tr>
            <!-- 中分類 -->
    		<tr>
      			<td class='tdcolor1'>所屬中類</td><td class='tdcolor2'>
      				<select name="category2">
      					<option value = "男用皮件">男用皮件</option>
      					<option value = "女用皮件">女用皮件</option>
      					<option value = "少女鞋區">少女鞋區</option>
      					<option value = "紳士流行涼鞋">紳士流行涼鞋</option>
      					<option value = "時尚手錶">時尚手錶</option>
                        <option value = "時尚珠寶">時尚珠寶</option>
      					<option value = "背包">背包</option>
      					<option value = "男錶">男錶</option>
      					<option value = "女錶">女錶</option>
      					<option value = "皮件">皮件</option>
      				</select>
      			</td>
    		</tr>
            <!-- 商品編號 -->
    		<tr>
      			<td class='tdcolor1'>商品編號</td><td class='tdcolor2'><input type="text" name="id" id="id"></td>
    		</tr>
            <!-- 商品名稱 -->
    		<tr>
      			<td class='tdcolor1'>商品名稱</td><td class='tdcolor2'><input type="text" name="name" id="name"></td>
    		</tr>
            <!-- 商品價格 -->
    		<tr>
      			<td class='tdcolor1'>商品價格</td><td class='tdcolor2'><input type="text" name="price" id="price"></td>
    		</tr>
            <!-- 規格 -->
    		<tr>
      			<td class='tdcolor1'>規格</td><td class='tdcolor2'><input type="text" name="format" id="format"></td>
    		</tr>
            <!-- 庫存量 -->
    		<tr>
      			<td class='tdcolor1'>庫存量</td><td class='tdcolor2'><input type="text" name="amount" id="amount"></td>
    		</tr>
            <!-- 商品圖片 -->
    		<tr>
      			<td class='tdcolor1'>商品圖片</td><td class='tdcolor2'>
                    <input type="file" name="picture" id="picture"></td>
    		</tr>
            <!-- 介紹 -->
    		<tr>
      			<td class='tdcolor1'>介紹</td><td class='tdcolor2'>
                    <textarea name="intro" style="width: 300px;height: 100px;overflow: hidden;"> 
                    </textarea>
                </td>
    		</tr>
            <!-- 操作 -->
    		<tr>
      			<td colspan="2" align="center">
      				<input name="action" type="hidden" value="add">
      				<input type="submit" name="button" id="button" value="新增">
      				<input type="reset" name="button2" id="button2" value="重置">
                    <button><a href="manager.php">返回</a></button> 
      			</td>
    		</tr>
  		</table>
	</form>
</body>
</html>