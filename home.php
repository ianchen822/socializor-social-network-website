<!DOCTYPE html>
<?php
    //與資料庫連線
    include("connection.php");
    //設定字元集與連線校對
    mysqli_set_charset($db_link,'utf8');
    //選擇資料庫
    if(!@mysqli_select_db($db_link,"socializor")) die("資料庫選擇失敗!");
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Socializor</title>
	<link rel="stylesheet" type="text/css" href="web.css">
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
	</script>
	<script type="text/javascript" src="./api.js"></script>
</head>
<body>
	<div class="header">
		<div class="headerlogo">
			<a href="home.php">Socializor</a>
		</div>
  		<form class="headersearch">
  			<input class="search" type="text" name="search" placeholder="Search...">
  			<input class="submit" type="submit" value="Search">
  		</form>
  		<div class="headerlogin">
  			<a href="login.php">註冊/登入</a>
		</div>
	</div>
	
	<div class="leftside" id="leftside">
		<div class="category" id="allposts">所有貼文</div>
		<div class="categories">
			<div class="category" id="relation">感情</div>
			<div class="category" id="study">學業</div>
			<div class="category" id="job">工作</div>
			<div class="category" id="food">美食</div>
			<div class="category" id="game">遊戲</div>
			<div class="category" id="funny">有趣</div>
			<div class="category" id="adults">半成熟大人</div>
		</div>
	</div>

	<div class="middleside">
		<!-- <div class="postimage">
		
		</div> -->
		<div class="postheadersticky">
			<h2>所有貼文</h2>
			<button class="tablink2" onclick="openpage1('hit')" id="default"><b>熱門</b></button>
			<button class="tablink2" onclick="openpage1('new')"><b>最新</b></button>
			<!-- <button class="tablink2" onclick="openpage1('chatroom')"><b>聊天</b></button> -->
		</div>
		<div class="tabcontent2" id="hit">
			<?php
				//選擇指定id資料
				$query1 = "SELECT * FROM post";
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
			
		</div>
	</div>
	
	
	<div class="postmodal" id="postmodal">
		<?php
			//選擇指定id資料
			$query1 = "SELECT * FROM post";
			$posts = mysqli_query($db_link, $query1); 
							
			while ($post = mysqli_fetch_assoc($posts)) {
				echo "<div class='modal-content' id=".$post['pId'].">";
				    //post
					echo "<span class='close' onclick='closemodal()'>"."&times;"."</span>";
						
						echo "<p>".$post['ident']."&nbsp"."</p>";
						echo "<h2>".$post['header']."&nbsp"."</h2>";
						echo "<p>";
							echo "<span class='spanblue'>".$post['pcategory']."</span>";
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
	</div>
	
	<script type="text/javascript">
		
		function createmodal(specific){
			// var posts = document.getElementsByClassName('post');
			var postmodal = document.getElementById('postmodal');
			var postcontent = document.getElementsByClassName('modal-content');
			
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
  			}
		}
	</script>
	<script type="text/javascript">
		document.body.style.backgroundColor = "white";
		document.getElementById("leftside").style.color = "black";
		var i,sets;
		sets = document.getElementsByClassName("category");
		for (i = 0; i < sets.length; i++) {
    		sets[i].style.color = "black";
		}
	</script>
</body>
</html>