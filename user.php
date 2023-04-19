<!DOCTYPE html>
<?php
//啟動session
session_start();
if (!isset($_SESSION['user'])) {
	header("Location: ./home.php");
}
$user = $_SESSION['user'];
//與資料庫連線
include("connection.php");
//設定字元集與連線校對
mysqli_set_charset($db_link, 'utf8');
//選擇資料庫
if (!@mysqli_select_db($db_link, "socializor")) die("資料庫選擇失敗!");



//選擇指定id資料
$query = "SELECT * FROM member WHERE mId = '$user' ";
$result = mysqli_query($db_link, $query);
//取得其陣列
$row_result = mysqli_fetch_assoc($result);

if(isset($_POST["action"])&&($_POST["action"] == "action")){
	$roomid = $_POST['roomid'];
    $msginput = $_POST['msginput'];
    $crTime = date("Y-m-d H:i:s",strtotime('+6HOUR'));
    $query4 = "INSERT INTO chatrecord VALUES( '', '$roomid', '$user', '$msginput','$crTime')";
    mysqli_query($db_link, $query4);
}



?>
<script language="JavaScript">

</script>
<html lang="en">

<head>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous">
	</script>

	<script src="./echo2.js">
	</script>

	<meta charset="UTF-8">
	<title>Socializor</title>
	<link rel="stylesheet" type="text/css" href="./web.css">
	<!-- load ajax -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		//to delay the execution of javascrip, until the dom element is loaded
		//to prevent the dom element return null
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', afterLoaded);
		} else {
			afterLoaded();
		}

		function afterLoaded() {
			document.getElementById("default").click();
		}

		function openpage1(pageName) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent2");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			document.getElementById(pageName).style.display = "block";
		}

		function openuserinfo() {
			if (document.getElementById("userinfo").style.display == "block") {
				document.getElementById("userinfo").style.display = "none";
			} else {
				document.getElementById("userinfo").style.display = "block";
			}
		}
	</script>

</head>

<body onkeydown="keyLogin();">
	<div class="header">
		<div class="headerlogo">
			<a href="user.php">Socializor</a>
		</div>
		<form class="headersearch">
			<input id='autosearch' class="search" type="text" name="search" placeholder="Search...">
		</form>
		<div class="headerlogined">
			<ul>
				<li><a href="writepost.php">貼文</a></li>
				<li onclick="showchatroom()">聊天室</li>
				<li id="username" onclick="openuserinfo()"><?php echo $row_result['name']; ?></li>
			</ul>
		</div>
	</div>


	<div class="leftside" id="leftside">
		<a class="category" id="allposts" href="./DBproject/user.php">所有貼文</a>
		<div class="categories">
			<a class="category" id="relation" href="./DBproject/usershowposts.php?pcate=感情">感情</a>
			<a class="category" id="study" href="./DBproject/usershowposts.php?pcate=學業">學業</a>
			<a class="category" id="job" href="./DBproject/usershowposts.php?pcate=工作">工作</a>
			<a class="category" id="food" href="./DBproject/usershowposts.php?pcate=美食">美食</a>
			<a class="category" id="game" href="./DBproject/usershowposts.php?pcate=遊戲">遊戲</a>
			<a class="category" id="funny" href="./DBproject/usershowposts.php?pcate=有趣">有趣</a>
			<a class="category" id="adults" href="./DBproject/usershowposts.php?pcate=半成熟大人">半成熟大人</a>
		</div>
	</div>

	<div class="middleside" id='middleside'>

		<div class="postheadersticky" id='postheadersticky'>
			<h2>所有貼文</h2>
			<button class="tablink2" onclick="openpage1('hit')"><b>熱門</b></button>
			<button class="tablink2" onclick="openpage1('new')" id="default"><b>最新</b></button>
		</div>
		<div class="tabcontent2" id="hit">
			<?php
			//選擇指定id資料
			$query1 = "SELECT * FROM post JOIN comment ON post.pId = comment.post GROUP BY post.pId ORDER BY count(cId) DESC";
			$posts = mysqli_query($db_link, $query1);


			while ($post = mysqli_fetch_assoc($posts)) {

				echo "<div class='post' onclick='createmodal(" . $post['pId'] . ")'>";
				echo "<div class='posterinfo'>";
				echo "<p>" . $post['pcategory'] . "&nbsp" . "</p>";
				echo "<p>" . $post['ident'] . "&nbsp" . "</p>";
				echo "<p>" . $post['pTime'] . "&nbsp" . "</p>";
				echo "</div>";
				echo "<p class='posterheader'>" . $post['header'] . "</p>";
				echo "<p class='tover'>" . $post['pcontent'] . "</p>";
				echo "</div>";
			}
			?>
		</div>
		<div class="tabcontent2" id="new">
			<?php
			//選擇指定id資料
			$query1 = "SELECT * FROM post ORDER BY pTime DESC";
			$posts = mysqli_query($db_link, $query1);


			while ($post = mysqli_fetch_assoc($posts)) {

				echo "<div class='post' onclick='createmodal(" . $post['pId'] . ")'>";
				echo "<div class='posterinfo'>";
				echo "<p>" . $post['pcategory'] . "&nbsp" . "</p>";
				echo "<p>" . $post['ident'] . "&nbsp" . "</p>";
				echo "<p>" . $post['pTime'] . "&nbsp" . "</p>";
				echo "</div>";
				echo "<p class='posterheader'>" . $post['header'] . "</p>";
				echo "<p class='tover'>" . $post['pcontent'] . "</p>";
				echo "</div>";
			}
			?>
		</div>

	  <!-- show chat room list -->
		<div class="chatroom" id='chatroom'>
			<div class="chatheadersticky" id='chatheadersticky'>
				<h2 style='float:left;'>聊天室</h2><button class='createroomblue' onclick='makeroommodal()'>新增</button>
			</div>
			<?php
			$query2 = "SELECT * FROM room JOIN member ON room.creator = member.mId";
			$rooms = mysqli_query($db_link, $query2);

			while ($room = mysqli_fetch_assoc($rooms)) {
				echo "<div class='post' onclick='beforeshowchatmodal(" . $room['rId'] . ")'>";
				echo "<p>建立者&nbsp:&nbsp" . $room['nickname'] . "</p>";
				echo "<p class='posterheader'>標題&nbsp:&nbsp" . $room['title'] . "</p>";
				echo "<p class='tover'>描述&nbsp:&nbsp" . $room['description'] . "</p>";
        echo "<div ". is_null($room['password']) ? "" : "class='lock'" .">私</div>";
				echo "<script>window['hack". $room['rId'] ."'] = { password: '". $room['password'] ."' };</script>";
				echo "</div>";
			}
			?>
		</div>
		<script>
			function beforeshowchatmodal(rId) {
				const password = window["hack" + rId].password;
				if (password) {
					const enteredPassword = prompt("You shall not pass");
					if (enteredPassword === password) {
						showchatmodal(rId);
					}
				} else {
					showchatmodal(rId);
				}
			}
		</script>

	</div>

	<div class="searchmiddleside" id='searchmiddleside'>

	</div>

	<!-- chatrecord  -->
	<div class="postmodal" id="chatmodal">
		<script type="text/javascript">

		</script>
		<?php
			$query3 = "SELECT * FROM room";
			$rooms = mysqli_query($db_link, $query3);
			while($room = mysqli_fetch_assoc($rooms)){
				// echo "<div class='modal-content' id=". $room['rId'] .">";
				// 	echo "<span class='close' onclick='closemodal3()'>&times;</span>";
				// 	echo "<div class='chatroomheader'>Socializor</div>";
				// 	echo "<div class='chatrecords' id='chatrecords'></div>";
				// 	echo "<form class='chatroomarea' method='POST' action='./msginput.php?roomid=$room[rId]'>";
				// 		echo "<textarea class='msginput' id='msginput' name='msginput'></textarea>";
				// 		echo "<button id='input1' hidden></button>";
				// 	echo "</form>";
				// echo "</div>";
				echo "<div class='modal-content' id=". $room['rId'] .">";
					echo "<span class='close' onclick='closemodal3()'>&times;</span>";
					echo "<div class='chatroomheader'>". $room['title'] ."</div>";
					echo "<div class='chatrecords' id='chatrecords'></div>";
					echo "<form class='chatroomarea' method='POST' action=''>";
						echo "<input name='action' value='action' hidden></input>";
						echo "<input name='roomid' value=". $room['rId'] ." hidden></input>";
						echo "<textarea class='msginput' id='msginput' name='msginput'></textarea>";
						echo "<button id='input1' hidden></button>";
					echo "</form>";
				echo "</div>";
			}
		?>
	</div>


	<!-- create chat room  -->
	<div class="postmodal" id="roommodal">
		<div class='modal-content'>
			<span class='close' onclick='closemodal2()'>&times;</span>
			<form id="makeroom" method="POST" action="./makechatroom.php">
				<label for="chattitle"><b>聊天室主題</b></label>
				<input id="rtitle" class='inputtype1' type="text" name="rtitle">
				<label for="chatdesc"><b>聊天室描述</b></label>
				<br><br>
				<textarea class='rlmakecomment' name="description">
				</textarea>
				<br><br>

				<input type="checkbox" name="chkbox" id="chk" onclick="showhide()">
				<label for="chk"><b>私人聊天</b></label>
				<br><br>
				<div id="hidden" style="display: none">
							<label>密語: </label><input type="password" id="password" name="password" minlength="1">
							<button class="btn" type="button" onclick="toggle(this)">Show</button>
						</div>
				<br><br>
				<input id="resetbtn2" class="sendbtn" type="reset" value="重寫">
				<input id="sendbtn2" class="sendbtn" type="submit" value="送出">
			</form>
		</div>
	</div>
  <script type="text/javascript">
	function showhide(){
			 var checkbox = document.getElementById("chk");
			 var hiddeninput = document.getElementById("hidden");

			 //for(var i = 0; i != hiddeninputs.length; i++){
				 if(checkbox.checked){
					 hiddeninput/*[i]*/.style.display = "block";
				 }else{
					 hiddeninput/*s[i]*/.style.display = "none";
				 }
			 //}
		 }
		 function toggle(button) {
			 var password = document.getElementById("password");
				 if (password.type == "password") {
						 button.innerHTML = "Hide";
						 password.type = "text";
				 }
				 else {
						 button.innerHTML = "Show";
						 password.type = "password";
				 }
			}
  </script>
	<div class="userbar" id="userinfo">
		<h2 id="sayhi"><?php echo 'Hi!&nbsp' . $row_result['nickname']; ?></h2>
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
		$query1 = "SELECT * FROM post";
		$posts = mysqli_query($db_link, $query1);

		while ($post = mysqli_fetch_assoc($posts)) {
			echo "<div class='modal-content' id=" . $post['pId'] . ">";
			//post
			echo "<span class='close' onclick='closemodal()'>" . "&times;" . "</span>";

			echo "<p>" . $post['ident'] . "&nbsp" . "</p>";
			echo "<h2>" . $post['header'] . "&nbsp" . "</h2>";
			echo "<p>"; ?>
			<a class='spanblue' href='./usershowposts.php?pcate=<?php echo $post['pcategory'] ?>'> <?php echo $post['pcategory'] ?></a>
		<?php
			echo "&nbsp&nbsp&nbsp";
			echo "<span>" . $post['pTime'] . "</span>";
			echo "</p>";

			echo "<p>" . $post['pcontent'] . "</p>";
			//comments
			echo "<div class='comments'>";
			echo "<h2>留言</h2>";
			$pId = $post['pId'];
			$query2 = "SELECT * FROM post JOIN comment ON post.pId = comment.post WHERE comment.post = '$pId' ORDER BY cTime ASC ";
			$comments = mysqli_query($db_link, $query2);
			while ($comment = mysqli_fetch_assoc($comments)) {
				echo "<div class='comment'>";
				echo "<table class='commenttable'>";
				echo "<tr>";
				echo "<td rowspan='2'></td>";
				echo "<td>" . $comment['cident'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>" . $comment['cTime'] . "</td>";
				echo "</tr>";
				echo "</table>";
				echo "<p>" . $comment['ccontent'] . "<p>";
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
				<option value="<?php echo $row_result['dep']; ?>"><?php echo $row_result['dep']; ?></option>
				<option value="<?php echo $row_result['nickname']; ?>"><?php echo $row_result['nickname']; ?></option>
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
		function createmodal(specific) {
			// var posts = document.getElementsByClassName('post');
			var postmodal = document.getElementById('postmodal');
			var postcontent = document.getElementsByClassName('modal-content');

			var comment = document.getElementById('commentid');

			comment.setAttribute('value', specific);

			for (var i = 0; i < postcontent.length; i++) {
				if (postcontent[i].id == specific) {

					postmodal.style.display = "block";
					postcontent[i].style.display = "block";

				} else {
					postcontent[i].style.display = "none";
				}
			}
		}

		function showchatmodal(specific) {
			// var posts = document.getElementsByClassName('post');
			var chatmodal = document.getElementById('chatmodal');
			var postcontent = document.getElementsByClassName('modal-content');

			localStorage.setItem('ischatting', specific);

			for (var i = 0; i < postcontent.length; i++) {
				if (postcontent[i].id == specific) {

					chatmodal.style.display = "block";
					postcontent[i].style.display = "block";

				} else {
					postcontent[i].style.display = "none";
				}
			}
		}

		function closemodal() {
			var postmodal = document.getElementById('postmodal');
			postmodal.style.display = 'none';
		}

		function closemodal2() {
			var roommodal = document.getElementById('roommodal');
			roommodal.style.display = 'none';
		}

		function closemodal3() {
			var roommodal = document.getElementById('chatmodal');
			roommodal.style.display = 'none';
			localStorage.setItem('ischatting', '0');
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

		function showchatroom() {
			if (document.getElementById('chatroom').style.display == 'block') {
				document.getElementById('chatroom').style.display = 'none';
				document.getElementById('postheadersticky').style.display = 'block';
				document.getElementById('hit').style.display = 'block';
				document.getElementById('new').style.display = 'block';
			} else {
				document.getElementById('postheadersticky').style.display = 'none';
				document.getElementById('hit').style.display = 'none';
				document.getElementById('new').style.display = 'none';
				document.getElementById('chatroom').style.display = 'block';
			}
		}

		function makeroommodal() {
			document.getElementById('roommodal').style.display = 'block';
		}

		function getbigger() {
			document.getElementById('rlcommentarea').style.display = 'block';
			document.getElementById('fkcommentarea').style.display = 'none';
		}
		var span = document.getElementById('closeforcomment');
		span.onclick = function() {
			document.getElementById('rlcommentarea').style.display = 'none';
			document.getElementById('fkcommentarea').style.display = 'block';
		}

		function keyLogin() {
			if (event.keyCode == 13) //enter的鍵值為13
				document.getElementById("input1").click(); //觸動按鈕的點擊
		}

		function setbackgroud() {
			if (document.body.style.backgroundColor == "white") {
				document.body.style.backgroundColor = "#343132";
				document.getElementById("backgroundmode").innerHTML = '夜間模式(on)';
				document.getElementById("leftside").style.color = "white";
				var i, sets;
				sets = document.getElementsByClassName("category");
				for (i = 0; i < sets.length; i++) {
					sets[i].style.color = "white";
				}
				localStorage.setItem('mode', '1');
			} else {
				document.body.style.backgroundColor = "white";
				document.getElementById("backgroundmode").innerHTML = '夜間模式(off)';
				document.getElementById("leftside").style.color = "black";
				var i, sets;
				sets = document.getElementsByClassName("category");
				for (i = 0; i < sets.length; i++) {
					sets[i].style.color = "black";
				}
				localStorage.setItem('mode', '0');
			}

		}
		//check if it is night mode
		if (localStorage.getItem('mode') == 1) {
			document.body.style.backgroundColor = "#343132";
			document.getElementById("backgroundmode").innerHTML = '夜間模式(on)';
			document.getElementById("leftside").style.color = "white";
			var i, sets;
			sets = document.getElementsByClassName("category");
			for (i = 0; i < sets.length; i++) {
				sets[i].style.color = "white";
			}
		} else {
			document.body.style.backgroundColor = "white";
			document.getElementById("backgroundmode").innerHTML = '夜間模式(off)';
			document.getElementById("leftside").style.color = "black";
			var i, sets;
			sets = document.getElementsByClassName("category");
			for (i = 0; i < sets.length; i++) {
				sets[i].style.color = "black";
			}
		}
	</script>
	<script>
		var searchinput = document.getElementById('autosearch');
		searchinput.onclick = function() {
			document.getElementById('searchmiddleside').style.display = 'block';
			document.getElementById('middleside').style.display = 'none';
		}
		$(document).ready(function() {

			load_data();

			function load_data(query) {
				$.ajax({
					url: "search.php",
					method: "GET",
					data: {
						s: query
					},
					success: function(data) {
						$('#searchmiddleside').html(data);
					}
				});
			}
			$('#autosearch').keyup(function() {
				var search = $(this).val();
				if (search != '') {
					load_data(search);
				} else {
					load_data();
				}
			});
		});
	</script>
	<script>
		if (localStorage.getItem('ischatting') != 0) {
			showchatmodal(localStorage.getItem('ischatting'));
		}
	</script>
	<script>
	const msgInput = document.querySelector("#msginput");
msgInput.form.addEventListener("submit", event => {
  event.preventDefault();
  const dataArray = [];
  Array.from(msgInput.form.children).forEach(child => {
    if (child.hasAttribute("name") && child.value != null) {
      const name = child.getAttribute("name");
      const value = child.value;
    dataArray.push(`${encodeURIComponent(name)}=${encodeURIComponent(value)}`);
    }
  });
  const data = dataArray.join("&");
  $.ajax({
      type: 'POST',
      data,
      url: "user.php",
      cache: false,
      success: function(result){
		console.log("Success");
		msgInput.value = "";
      },
      error: function(error){
        alert("發生錯誤");
        console.error(error);
      }
  });
});
	</script>
</body>

</html>
