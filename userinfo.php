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
    <title>會員資訊 | Socializor</title>
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
        function showoldpsw(){
            var x = document.getElementById("myoldpsw");
            if (x.type === "password") {
                x.type = "text";
            } 
            else {
                x.type = "password";
            }
        }
        function shownewpsw(){
            var x = document.getElementById("mynewpsw");
            if (x.type === "password") {
                x.type = "text";
            } 
            else {
                x.type = "password";
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
    <div class="userupdate">
        <h2>會員資訊</h2>
        <hr>
        <form id="userinformation" method="POST" action="./updateinfo.php">
            <label for="name"><b>姓名</b><img src="./projectimages/pencil.png" class="pencil"></label>
            <input id="myname" class="inputtype1" type="text" value="<?php echo $row_result['name'];?>"  name="name" required>
            <label for="name"><b>暱稱</b><img src="./projectimages/pencil.png" class="pencil"></label>
            <input id="mynickname" class="inputtype1" type="text" value="<?php echo $row_result['nickname'];?>" name="displayname" required>
            <label for="gender"><b>性別</b><img src="./projectimages/pencil.png" class="pencil"></label><br>
            <div class="gendermargin">
                <?php
                    if($row_result['gender'] == 'male'){?>
                        <input id="male" type="radio" name="gender" value="male" checked required>
                        <label for="school"><b>男</b></label> 
                        <input id="female" type="radio" name="gender" value="female" required>
                        <label for="school"><b>女</b></label><br>
                        <?php
                    }
                    else{?>
                        
                        <input id="male" type="radio" name="gender" value="male" required>
                        <label for="school"><b>男</b></label> 
                        <input id="female" type="radio" name="gender" value="female" checked required>
                        <label for="school"><b>女</b></label><br>
                        <?php
                    }  
                ?>
            </div>
            <label for="dep"><b>學院</b><img src="./projectimages/pencil.png" class="pencil"></label>
            <input id="dep" class="inputtype1" type="text" value="<?php echo $row_result['dep'];?>" name="dep" required>
            <!-- <label for="email"><b>常用信箱</b></label>
            <input id="myemail2" class="inputtype1" type="text" placeholder="Email..." name="email" required> -->
            <input id="resetbtn" class="sendbtn" type="reset" value="重新填寫">
            <input id="sendbtn" class="sendbtn" type="submit" value="修改">
        </form>
        <h2 class="floatless">密碼</h2>
        <hr>
        <form id="modifypsw" method="POST" action="./updatepsw.php">
            <!-- <label for="email"><b>常用信箱</b></label>
            <input id="myemail2" class="inputtype1" type="text" placeholder="Email..." name="email" required> -->
            <label for="psw"><b>確認舊密碼</b></label>
            <input id="myoldpsw" class="inputtype1" type="password" placeholder="Old password..." name="oldpsw" required>
            <input type="checkbox" onchange="showoldpsw()">顯示密碼
            <br><br>
            <label for="psw"><b>新密碼</b></label>
            <input id="mynewpsw" class="inputtype1" type="password" placeholder="New password..." name="newpsw" required>
            <input type="checkbox" onchange="shownewpsw()">顯示密碼
            <div>
                <input id="resetbtn2" class="sendbtn" type="reset" value="重新填寫">
                <input id="sendbtn2" class="sendbtn" type="submit" value="修改">
            </div>
        </form>
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
    
    <script type="text/javascript">
        // function makeuserinput(id){
        //     if(document.getElementById(id).hasAttribute('disabled') && id == 'male'){
        //         document.getElementById(id).removeAttribute('disabled');
        //         // document.getElementById(id).removeAttribute('checked');
        //         if (document.getElementById('female').hasAttribute('checked')) {
        //             document.getElementById('female').removeAttribute('disabled');
        //         }
        //         else{
        //             document.getElementById('female').removeAttribute('disabled');
        //             document.getElementById('female').removeAttribute('checked');
        //         }
                
        //     }
        //     else if(!document.getElementById(id).hasAttribute('disabled') && id == 'male'){
        //         document.getElementById(id).setAttribute('disabled','disabled');
        //         document.getElementById('female').setAttribute('disabled','disabled');
        //     }
        //     else if(document.getElementById(id).hasAttribute('disabled')){
        //         document.getElementById(id).removeAttribute('disabled');
        //     }
            
        //     else{
        //         document.getElementById(id).setAttribute('disabled','disabled');
        //     }
        // }
        function setbackgroud(){
            if (document.body.style.backgroundColor == "white") {
                document.body.style.backgroundColor = "#343132";
                document.getElementById("backgroundmode").innerHTML = '夜間模式(on)';
                localStorage.setItem('mode','1');
            }
            else 
            {
                document.body.style.backgroundColor = "white";
                document.getElementById("backgroundmode").innerHTML = '夜間模式(off)';
                localStorage.setItem('mode','0');
            }
                
        }
        //check if it is night mode
        if (localStorage.getItem('mode') == 1) {
            document.body.style.backgroundColor = "#343132";
            document.getElementById("backgroundmode").innerHTML = '夜間模式(on)';
        }
        else
        {
            document.body.style.backgroundColor = "white";
            document.getElementById("backgroundmode").innerHTML = '夜間模式(off)';
        }
    </script>
</body>
</html>