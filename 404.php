<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
  <!--声明当前页面的编码集charset=gbk中文编码gb2312,charset=utf-8 国际编码-->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!--当前页面的三要素-->
  <title>未找到您搜索的内容-国瑞前端</title>
  <meta name="Keywords" content="国瑞前端找不到您搜索的内容">
  <meta name="description" content="国瑞前端找不到您搜索的内容">
  <script src="<?php bloginfo('template_url'); ?>/js/jquery-2.1.4.min.js"></script>
  <!--css , js-->
  <style type="text/css">
    * {
      margin: 0px;
      padding: 0px;
    }

    .erro {
    width: 400px;
    height: 116px;
    border: 1px solid green;
    position: absolute;
    top:50%;
    left: 50%;
    -webkit-transform:translate(-50%,-50%);
    -moz-transform:translate(-50%,-50%);
    -o-transform:translate(-50%,-50%);
    transform:translate(-50%,-50%);
    box-sizing:border-box;
    padding-bottom:15px;
}
    h1 {
      text-align:center;
      font-size:35px;
    }
    h2 {
      text-align:center;

      font-size:25px;
    }
    h3 {
      text-align:center;
      font-size:15px;
    }
    span {
      color:red;
    }


  </style>
</head>

<body>
  <div class="erro">
    <h1>404</h1>
    <h2>返回主页倒计时：<span class="autotime">
    </span></h2>
    <h3><a href="/">点击立即返回主页</a></h3>    
  </div>

</body>

</html>

<script type="text/javascript">
  var num = 15;
  var clearTime = null;
  function autoPlay() {
    clearTime = setInterval(function () {
      num--;
      $(".autotime").text(num); //把我们减好的值，赋给span
      if (num == 0) {
        window.location = "/";
        clearInterval(clearTime); //清除定时播放器
      }
    }, 1000);
  };
  autoPlay();
</script>