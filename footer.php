<?php
//虽然已经简化了函数，但是修改过于复杂，为防止出错，每次改一部分
?>
<script>
(function(){
var src = (document.location.protocol == "http:") ? "http://js.passport.qihucdn.com/11.0.1.js?5267b4f4750c6680ff588f412687340f":"https://jspassport.ssl.qhimg.com/11.0.1.js?5267b4f4750c6680ff588f412687340f";
document.write('<script src="' + src + '" id="sozz"><\/script>');
})();
</script>
<div id="gotop">
    Top
</div>
<div class="contact">
 <h3>  如有疑问，可联系我：</h3>
 <ul>
	<li>QQ号： <?php textReturn('qq'); ?></li>
	<li>微信号： <?php textReturn('wechat'); ?></li>
	<li>电话号码： <?php textReturn('phone'); ?></li>
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

  //点击图片放大全屏start
  var runPrefixMethod = function (element, method) {
        var usablePrefixMethod;
        ["webkit", "moz", "ms", "o", ""].forEach(function (prefix) {
            if (usablePrefixMethod) return;
            if (prefix === "") {
                // 无前缀，方法首字母小写
                method = method.slice(0, 1).toLowerCase() + method.slice(1);
            }

            var typePrefixMethod = typeof element[prefix + method];

            if (typePrefixMethod + "" !== "undefined") {
                if (typePrefixMethod === "function") {
                    usablePrefixMethod = element[prefix + method]();
                } else {
                    usablePrefixMethod = element[prefix + method];
                }
            }
        });

        return usablePrefixMethod;
    };
    if (typeof window.screenX === "number") {
        var eleFull = document.querySelectorAll(".article img");
        for (var i = 0; i < eleFull.length; i++)
            eleFull[i].addEventListener("click", function () {
                if (runPrefixMethod(document, "FullScreen") || runPrefixMethod(document, "IsFullScreen")) {
                    runPrefixMethod(document, "CancelFullScreen");
                    this.title = this.title.replace("退出", "");
                } else if (runPrefixMethod(this, "RequestFullScreen")) {
                    this.title = this.title.replace("点击", "点击退出");
                }
            });
    } else {
        alert("爷，现在都什么时代了，你还在用这么土的浏览器~~");
    }
    //点击图片放大全屏end


</script>