<?php

session_start();
$user = $_SESSION['user'];

include("connection.php");
//設定字元集與連線校對
mysqli_set_charset($db_link,'utf8');
//選擇資料庫
if(!@mysqli_select_db($db_link,"socializor")) die("資料庫選擇失敗!");
    $query = "SELECT * FROM chatrecord JOIN member ON chatrecord.typer = member.mId WHERE room=".$_GET["rId"];
    $result=mysqli_query($db_link, $query);
    while($row=mysqli_fetch_assoc($result)){
        $time = strtotime($row['crTime']);
        $msgtime = date('H:i', $time);
        if($row['mId'] == $user){
            echo "<div class='messages'>";
                // echo "<div class='mymessage'>".$row['crcontent']."</div>";
                // echo "<div class='memsgtime'>".$msgtime."</div>";
                echo "<div class='mymessage'>"."<div class='memsgtime'>".$msgtime."</div>"."<div class='inner'>".$row['crcontent']."</div>"."</div>";
            echo "</div>";
        }
        else{
            echo "<div class='messages'>";
                echo "<div class='othertyper'>".$row['nickname']."</div>";
                /*echo "<div class='othermessage'>".$row['crcontent']."</div>";
                echo "<div class='othermsgtime'>".$msgtime."</div>";*/
                echo "<div class='othermessage'>"."<div class='inner'>".$row['crcontent']."</div>"."<div class='othermsgtime'>".$msgtime."</div>"."</div>";
            echo "</div>";
        }

    }
?>

<!-- function outputMessage(message) {
  const div = document.createElement('div');
  div.classList.add('message');
  div.innerHTML = `
  <p class="meta">
  ${message.username}
  <span>${message.time}</span>
  </p>
  <p class="text">
    ${message.text}
  </p>`;
  document.querySelector('.chat-messages').appendChild(div);
} -->

<!-- .chat-messages {
	padding: 30px;
	max-height: 500px;
	overflow-y: scroll;
}

.chat-messages .message {
	padding: 10px;
	margin-bottom: 15px;
	background-color: #ffffff;
	border-radius: 5px;
}

.chat-messages .message .meta {
	font-size: 15px;
	font-weight: bold;
	color: #7386ff;
	opacity: 0.7;
	margin-bottom: 7px;
}

.chat-messages .message .meta span {
	color: #777; -->
