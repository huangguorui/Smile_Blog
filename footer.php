<?php
//虽然已经简化了函数，但是修改过于复杂，为防止出错，每次改一部分
?>
<div id="gotop">
    Top
</div>
<div class="contact">
 <h3>  如有疑问，可联系我：</h3>
 <ul>
	<li>QQ号： <a href="##"><?php textReturn('qq'); ?></a></li>
	<li>微信号： <a href="##"><?php textReturn('wechat'); ?></a></li>
	<li>电话号码： <a href="##"><?php textReturn('phone');?></a></li>
 </ul>
   
   
</div>
<div class="footer">
<p> <?php 
          if(!textReturn('footer_copyright',0)){
            echo '请前往国瑞后台系统设置,<a href="/wp-admin/themes.php?page=wp-theme-options.php" target="_blank">点击跳转</a>';
          }else{
			textReturn('footer_copyright');  
          }
            ?>，本主题由<a href="https://github.com/huangguorui/smile_Blog">国瑞前端</a>提供</p>
</div>

<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?c56f42f193095f61fc79f266a6660301";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<script>
    (function () {
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        } else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();




    let navFlag = false

//手机左侧菜单渐进滑出
function tabNav() {
  navFlag = !navFlag
  if (navFlag) {
    $('.slide_nav').css("width", '150px');
    $('.slide_nav').css("opacity", '1');
  } else {
    $('.slide_nav').css("width", '0');
    $('.slide_nav').css("opacity", '0');
  }
}

//手机端搜索页面展开
function phoneSearch() {
  let height = $('.phone_search').css("height")
  height = height === "60px" ? "0px" : '60px';

  if (height === "60px") {
    $('.phone_search').css({
      "height": '60px',
      "opacity": 1,
      "z-index": 99
    });

  } else {
    $('.phone_search').css({
      "height": '0',
      "opacity": 0,
      "zIndex": -1
    });
  }

}




</script>