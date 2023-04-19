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
	<title>Socializor</title>
	<link rel="stylesheet" type="text/css" href="web.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		//to delay the execution of javascrip, until the dom element is loaded
		//to prevent the dom element return null
		if(document.readyState === 'loading') {
    		document.addEventListener('DOMContentLoaded', afterLoaded);
		} else {
    		afterLoaded();
		}
		function afterLoaded(){
			document.getElementById("default").click();
		}
		
		function openpage1(pageName){
			var i, tabcontent, tablinks;
  			tabcontent = document.getElementsByClassName("tabcontent2");
  			for (i = 0; i < tabcontent.length; i++) {
    			tabcontent[i].style.display = "none";
  			}
  			document.getElementById(pageName).style.display = "block";
		}

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
  			<input id='autosearch' class="search" type="text" name="search" placeholder="Search...">
  		</form>
  		<div class="headerlogined" >
  			<ul>
  				<li><a href="writepost.php">貼文</a></li>
  				<li><a href="chatroom.php">聊天室</a></li>
  				<li id="username" onclick="openuserinfo()"><?php echo $row_result['name'];?></li>
  			</ul>
		</div>
	</div>

	
	<div class="leftside" id="leftside">
		<a class="category" id="allposts" href="./user.php">所有貼文</a>
		<div class="categories">
			<a class="category" id="relation" href="./usershowposts.php?pcate=感情">感情</a>
			<a class="category" id="study" href="./usershowposts.php?pcate=學業">學業</a>
			<a class="category" id="job" href="./usershowposts.php?pcate=工作">工作</a>
			<a class="category" id="food" href="./usershowposts.php?pcate=美食">美食</a>
			<a class="category" id="game" href="./usershowposts.php?pcate=遊戲">遊戲</a>
			<a class="category" id="funny" href="./usershowposts.php?pcate=有趣">有趣</a>
			<a class="category" id="adults" href="./usershowposts.php?pcate=半成熟大人">半成熟大人</a>
		</div>
	</div>

	<div class="middleside" id='middleside'>
		
		<div class="postheadersticky">
			<h2><?php echo $_GET['pcate']?></h2>
			<button class="tablink2" onclick="openpage1('hit')"><b>熱門</b></button>
			<button class="tablink2" onclick="openpage1('new')" id="default"><b>最新</b></button>
		</div>
		<div class="tabcontent2" id="hit">
			<?php
				//選擇指定id資料
				$pcate = $_GET['pcate'];
				$query1 = "SELECT * FROM post JOIN comment ON post.pId = comment.post WHERE pcategory='$pcate' GROUP BY post.pId ORDER BY count(cId) DESC";
				$posts = mysqli_query($db_link, $query1); 
				

				while ($post = mysqli_fetch_assoc($posts)) {

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
			?>
		</div>
		<div class="tabcontent2" id="new">
			<?php
				//選擇指定id資料
				$pcate = $_GET['pcate'];
				$query1 = "SELECT * FROM post WHERE pcategory='$pcate' ORDER BY pTime DESC";
				$posts = mysqli_query($db_link, $query1); 
				

				while ($post = mysqli_fetch_assoc($posts)) {

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
			?>
		</div>
	</div>

	<div class="searchmiddleside" id='searchmiddleside'>
		
	</div>			

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
	
	<!-- post modal box -->
	<div class="postmodal" id="postmodal">
		<?php
			//選擇指定id資料
			$pcate = $_GET['pcate'];
			$query1 = "SELECT * FROM post WHERE pcategory='$pcate' ";
			$posts = mysqli_query($db_link, $query1); 
							
			while ($post = mysqli_fetch_assoc($posts)) {
				echo "<div class='modal-content' id=".$post['pId'].">";
				    //post
					echo "<span class='close' onclick='closemodal()'>"."&times;"."</span>";
						
						echo "<p>".$post['ident']."&nbsp"."</p>";
						echo "<h2>".$post['header']."&nbsp"."</h2>";
						echo "<p>";?>
							<a class='spanblue' href='./usershowposts.php?pcate=<?php echo $post['pcategory']?>'> <?php echo $post['pcategory'] ?></a>
							<?php
							echo "&nbsp&nbsp&nbsp";
							echo "<span>".$post['pTime']."</span>";
						echo "</p>";
						
					echo "<p>".$post['pcontent']."</p>";
					//comments
					echo "<div class='comments'>";
    			    	echo "<h2>留言</h2>";
    			    	$pId=$post['pId'];
						$query2 = "SELECT * FROM post JOIN comment ON post.pId = comment.post WHERE comment.post = '$pId' ORDER BY cTime ASC ";
						$comments = mysqli_query($db_link, $query2);
						while ($comment = mysqli_fetch_assoc($comments)) {
					 		echo "<div class='comment'>";
  								echo "<table class='commenttable'>";
  									echo "<tr>";
    									echo "<td rowspan='2'></td>";
   										echo "<td>".$comment['cident']."</td>";
  									echo "</tr>";
  									echo "<tr>";
    									echo "<td>".$comment['cTime']."</td>";
  									echo "</tr>";
  								echo "</table>";
  								echo "<p>".$comment['ccontent']."<p>";
  							echo "</div>";
						} 
					echo "</div>";
				echo "</div>";
			}
		?>
		
  		<form id="fkcommentarea" class="fkcommentarea">
  			<input onclick="getbigger()" class="fkmakecomment" type="text" name="makecomment" placeholder="留言...">
  		</form>
  		<form id="rlcommentarea" class="rlcommentarea" method="POST" action="./commentinput.php">
  			<span class="close" id="closeforcomment">&times;</span>
  			<input id="commentid" type="text" name="postid" hidden>
  			<select name="ident" class="selectforwrite" id="userident">
				<option value="<?php echo $row_result['dep'];?>"><?php echo $row_result['dep'];?></option>
				<option value="<?php echo $row_result['nickname'];?>"><?php echo $row_result['nickname'];?></option>
				<option value="匿名">匿名</option>
			</select>
			<br>
			<textarea class="rlmakecomment" name="ccontent">
			</textarea>
			<input id="resetbtn2" class="sendbtn" type="reset" value="重填">
            <input id="sendbtn2" class="sendbtn" type="submit" value="送出">
  		</form>
	</div>
	
	<script type="text/javascript">
		function createmodal(specific){
			// var posts = document.getElementsByClassName('post');
			var postmodal = document.getElementById('postmodal');
			var postcontent = document.getElementsByClassName('modal-content');
			
			var comment = document.getElementById('commentid');

			comment.setAttribute('value',specific);
			
			for (var i = 0; i < postcontent.length; i++) {
				if (postcontent[i].id == specific) {
					
					postmodal.style.display = "block";
					postcontent[i].style.display = "block";

				}
				else{
					postcontent[i].style.display = "none";
				}
			}
		}

		function closemodal(){
			var postmodal = document.getElementById('postmodal');
			postmodal.style.display = 'none';
		}

		window.onclick = function(event) {
  			if (event.target == postmodal) {
    			postmodal.style.display = "none";
    			document.getElementById('rlcommentarea').style.display = 'none';
    			if (document.getElementById('fkcommentarea').style.display == 'none') {
    				document.getElementById('fkcommentarea').style.display = 'block';
    			}
  			}
		}

		function getbigger(){
			document.getElementById('rlcommentarea').style.display = 'block';
			document.getElementById('fkcommentarea').style.display = 'none';
		}
		var span = document.getElementById('closeforcomment');
		span.onclick = function(){
			document.getElementById('rlcommentarea').style.display = 'none';
			document.getElementById('fkcommentarea').style.display = 'block';
		}
		function setbackgroud(){
			if (document.body.style.backgroundColor == "white") {
				document.body.style.backgroundColor = "#343132";
				document.getElementById("backgroundmode").innerHTML = '夜間模式(on)';
				document.getElementById("leftside").style.color = "white";
				var i,sets;
				sets = document.getElementsByClassName("category");
				for (i = 0; i < sets.length; i++) {
    				sets[i].style.color = "white";
  				}
  				localStorage.setItem('mode','1');
			}
			else 
			{
				document.body.style.backgroundColor = "white";
				document.getElementById("backgroundmode").innerHTML = '夜間模式(off)';
				document.getElementById("leftside").style.color = "black";
				var i,sets;
				sets = document.getElementsByClassName("category");
				for (i = 0; i < sets.length; i++) {
    				sets[i].style.color = "black";
				}
				localStorage.setItem('mode','0');
			}
				
		}
		//check if it is night mode
		if (localStorage.getItem('mode') == 1) {
			document.body.style.backgroundColor = "#343132";
			document.getElementById("backgroundmode").innerHTML = '夜間模式(on)';
			document.getElementById("leftside").style.color = "white";
			var i,sets;
			sets = document.getElementsByClassName("category");
			for (i = 0; i < sets.length; i++) {
    			sets[i].style.color = "white";
  			}
		}
		else
		{
			document.body.style.backgroundColor = "white";
			document.getElementById("backgroundmode").innerHTML = '夜間模式(off)';
			document.getElementById("leftside").style.color = "black";
			var i,sets;
			sets = document.getElementsByClassName("category");
			for (i = 0; i < sets.length; i++) {
    			sets[i].style.color = "black";
			}
		}
	</script>
	<script>
		var searchinput = document.getElementById('autosearch');
		searchinput.onclick = function(){
			document.getElementById('searchmiddleside').style.display = 'block';
			document.getElementById('middleside').style.display = 'none';
		}
		$(document).ready(function () {

			load_data();

			function load_data(query) {
				$.ajax({
					url: "search.php",
					method: "GET",
					data: {
						s: query
					},
					success: function (data) {
						$('#searchmiddleside').html(data);
					}
				});
			}
			$('#autosearch').keyup(function () {
				var search = $(this).val();
				if (search != '') {
					load_data(search);
				} else {
					load_data();
				}
			});
		});
	</script>
</body>
</html>