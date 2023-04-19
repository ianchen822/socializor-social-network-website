<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>驗證 | Socializor</title>
	<link rel="stylesheet" type="text/css" href="web.css">
</head>
<body>
	<form class="verifyform" id="verify" action="./verifytoken.php?veremail=<?php echo $_GET['veremail'] ?>" method="POST">
  		<h2 class="">驗證您的信箱</h2>

  		<label for="secretToken" class="">驗證碼</label>
  		<input type="secretToken" id="secretToken" name="secretToken" class="inputtype1" placeholder="驗證碼..." required>
<!--   		<br/> -->
  		<input class="registerbtn" type="submit" value="驗證">
	</form>
</body>
</html>