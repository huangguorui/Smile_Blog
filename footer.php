<div id="gotop">
    Top
</div>
<div class="footer">
    <?php 
     echo get_option('huangguorui_options')['footer_copyright'];
    ?>
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