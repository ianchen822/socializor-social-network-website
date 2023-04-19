<!DOCTYPE html>
<?php
	//啟動session
    session_start();
    if(!isset($_SESSION['user'])){
    	header("Location: ./home.php");
    }
    $user = $_SESSION['user'];
    //與資料庫連線
    include("connection.php");
    //設定字元集與連線校對
    mysqli_set_charset($db_link,'utf8');
    //選擇資料庫
    if(!@mysqli_select_db($db_link,"socializor")) die("資料庫選擇失敗!");
    

   	
    //選擇指定id資料
    $query = "SELECT * FROM member WHERE mId = '$user' ";
    $result = mysqli_query($db_link, $query); 
    //取得其陣列
    $row_result = mysqli_fetch_assoc($result);
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>撰寫貼文 | Socializor</title>
	<link rel="stylesheet" type="text/css" href="web.css">
	<script type="text/javascript">
		function openuserinfo(){
			if (document.getElementById("userinfo").style.display == "block") {
				document.getElementById("userinfo").style.display = "none";
			}
			else{
				document.getElementById("userinfo").style.display = "block";
			}
		}		
	</script>
</head>
<body>
	<div class="header">
		<div class="headerlogo">
			<a href="user.php">Socializor</a>
		</div>
  		<form class="headersearch">
  			<input class="search" type="text" name="search" placeholder="Search...">
  			<input class="submit" type="submit" value="Search">
  		</form>
  		<div class="headerlogined">
			<ul>
            <li><a href="writepost.php">貼文</a></li>
            <li><a href="chatroom.php">聊天室</a></li>
            <li id="username" onclick="openuserinfo()"><?php echo $row_result['name'];?></li>
            <!-- <li >☰</li> -->
            </ul>
		</div>
	</div>
	<form class="writepost" id="writepost" action="postinput.php" method="POST">
		<label for="writeheader" id="writeheader"><font size="5">發表貼文</font></label>
		<select name="cate" class="selectforwrite" id="postcate">
			<option value="0" disabled selected hidden>點此選擇發文看板</option>
			<option value="感情">感情</option>
			<option value="學業">學業</option>
			<option value="工作">工作</option>
			<option value="美食">美食</option>
			<option value="遊戲">遊戲</option>
			<option value="有趣">有趣</option>
			<option value="半成熟大人">半成熟大人</option>
		</select>
		<select name="ident" class="selectforwrite" id="userident">
			<option value="<?php echo $row_result['dep'];?>"><?php echo $row_result['dep'];?></option>
			<option value="<?php echo $row_result['nickname'];?>"><?php echo $row_result['nickname'];?></option>
			<option value="匿名">匿名</option>
		</select>
		<input class="postheader" type="text" name="postheader" placeholder="標題">
		<textarea class="postarea" name="pcontent">
		</textarea>
		
		<input class="postsubmit" type="reset" name="postreset" value="重新填寫">
		<input class="postsubmit" type="submit" name="postsubmit" value="發文">

	</form>
	<div class="userbar" id="userinfo">
		<h2 id="sayhi"><?php echo 'Hi!&nbsp'. $row_result['nickname'];?></h2>
		<hr>
		<a href="./userinfo.php" class="forblock">
			<div class="useroption">會員資訊</div>
		</a>
		<a href="./myposts.php" class="forblock">
            <div class="useroption">我的貼文</div>
        </a>
        <a href="./mycomments.php" class="forblock">
            <div class="useroption">我的留言</div>
        </a>
		<div class="useroption" onclick="setbackgroud()" id="backgroundmode">夜間模式(off)</div>
		<a class="useroption" id="logout" href="./logout.php">登出</a>
	</div>
	
	<script type="text/javascript">
		function setbackgroud(){
            if (document.body.style.backgroundColor == "white") {
                document.body.style.backgroundColor = "#343132";
                document.getElementById("writeheader").style.color = "white";
                document.getElementById("backgroundmode").innerHTML = '夜間模式(on)';
                localStorage.setItem('mode','1');
            }
            else 
            {
                document.body.style.backgroundColor = "white";
                document.getElementById("backgroundmode").innerHTML = '夜間模式(off)';
                document.getElementById("writeheader").style.color = "black";
                localStorage.setItem('mode','0');
            }
                
        }
        //check if it is night mode
        if (localStorage.getItem('mode') == 1) {
            document.body.style.backgroundColor = "#343132";
            document.getElementById("backgroundmode").innerHTML = '夜間模式(on)';
            document.getElementById("writeheader").style.color = "white";
        }
        else
        {
            document.body.style.backgroundColor = "white";
            document.getElementById("backgroundmode").innerHTML = '夜間模式(off)';
            document.getElementById("writeheader").style.color = "black";
        }
	</script>
</body>
</html>