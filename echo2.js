$(function () {
  setInterval(getalarm, 100);

});

function getalarm() {
  Array.from(document.querySelectorAll(".chatrecords")).forEach(element => {
    $.ajax({
      type: 'GET',                     //GET or POST
      url: `msgoutput.php?rId=${element.parentElement.id}`,  //請求的頁面
      cache: false,   //是否使用快取
      dataType: 'html',
      success: function (result) {   //處理回傳成功事件，當請求成功後此事件會被呼叫
        //alert(result);
        //$('#title').text(result);
        element.innerHTML = result;
        element.scrollTop = element.scrollHeight;
      },
      error: function (result) {   //處理回傳錯誤事件，當請求失敗後此事件會被呼叫
        //your code here
        alert("發生錯誤");
        console.log(result);
      },
    });
  });
}