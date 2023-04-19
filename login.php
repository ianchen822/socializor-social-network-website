<!DOCTYPE html>
<?php
    
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>註冊 | Socializor</title>
	<link rel="stylesheet" type="text/css" href="web.css">
	
	<script>
		function showpassword(){
  			var x = document.getElementById("mypassword");
  			if (x.type === "password") {
    			x.type = "text";
  			} 
  			else {
    			x.type = "password";
  			}
		}
		function showpassword2(){
  			var x = document.getElementById("mypassword2");
  			if (x.type === "password") {
    			x.type = "text";
  			} 
  			else {
    			x.type = "password";
  			}
		}
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
  			tabcontent = document.getElementsByClassName("tabcontent1");
  			for (i = 0; i < tabcontent.length; i++) {
    			tabcontent[i].style.display = "none";
  			}
  			document.getElementById(pageName).style.display = "block";
		}
	</script>
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
	<div class="register">
		<button class="tablink1" onclick="openpage1('login')" id="default"><b>登入</b></button>
		<button class="tablink1" onclick="openpage1('regist')"><b>註冊</b></button>
		<div class="tabcontent1" id="login">
			<form method="POST" action="./sublogin.php">
				<label for="email"><b>常用信箱</b></label>
   				<input id="myemail1" class="inputtype1" type="text" placeholder="Email..." name="email" required>
    			<label for="psw"><b>密碼</b></label>
    			<input id="mypassword" class="inputtype1" type="password" placeholder="Password..." name="password" required>
    			<input type="checkbox" onchange="showpassword()">顯示密碼

                <!-- <input type="hidden" name="action" value="login"> -->

    			<input class="registerbtn" type="submit" value="登入">
    			<input class="registerbtn" type="reset" value="重新填寫">
    			<p>註冊及登入代表你同意遵守<a href="loginpage.html">Socializor使用協議</a></p>
			</form>
		</div>
		<div class="tabcontent1" id="regist">
			<form method="POST" action="./register.php">
				<label for="name"><b>姓名</b></label>
   				<input id="myname" class="inputtype1" type="text" placeholder="Name..." name="name" required>
                <label for="name"><b>暱稱</b></label>
                <input id="mynickname" class="inputtype1" type="text" placeholder="Nickname..." name="displayname" required>
   				<label for="gender"><b>性別</b></label><br>
   				<div class="gendermargin">
   					<input id="male" type="radio" name="gender" value="male" required>
   					<label for="school"><b>男</b></label>
   					<input id="female" type="radio" name="gender" value="female" required="">
   					<label for="school"><b>女</b></label><br>
   				</div>
   				<label for="dep"><b>學院</b></label>
   				<input id="dep" class="inputtype1" type="text" placeholder="Department..." name="dep" required>
   				<label for="email"><b>常用信箱</b></label>
   				<input id="myemail2" class="inputtype1" type="text" placeholder="Email..." name="email1" required>
    			<label for="psw"><b>密碼</b></label>
    			<input id="mypassword2" class="inputtype1" type="password" placeholder="Password..." name="password1" required>
    			<input type="checkbox" onchange="showpassword2()">顯示密碼

                <!-- <input type="hidden" name="action1" value="register"> -->

    			<input class="registerbtn" type="submit" value="註冊">
    			<input class="registerbtn" type="reset" value="重新填寫">
    			<p>註冊及登入代表你同意遵守<a href="loginpage.html">Socializor使用協議</a></p>
			</form>
		</div>
	</div>
	
</body>
</html>