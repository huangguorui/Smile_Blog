<?php get_header(); ?>

    <div class="center clearfix">

    <div class="left">
        <div class="left_list text_info article">
          <div class="about_text">
            <h2  class="h2">关于本站</h2>
            <p>
              原网址https://www.huanggr.cn，黄国瑞博客，一个关注web前端发展和专注于SEO优化的个人网站。
            </p>
          </div>
          <div class="about_text">
            <h2 class="h2" >博主技术栈</h2>
            <p>1、熟练掌握WEB前端知识，具有良好的编程习惯和逻辑思维能力</p>
            <p>2、熟练掌握基于DIV+CSS，JS/JQUERY的WEB编程技术</p>
            <p>3、熟练掌握VUE全家桶的使用，以及Axios,Vue-Router,Vuex</p>
            <p>4、熟练使用Vue-Cli，MInt-UI，Element，Ivew进行项目搭建,抽离组件，进行模块化开发</p>
            <p>5、熟练使用Es6/Sass/Less预编译处理器，编写高质量代码</p>
            <p>6、了解Php，有用Php框架做项目的经历</p>

          </div>
          <div class="about_text">
            <h2  class="h2">博客介绍</h2>
            <p>
              首先介绍一下，所用技术，前端用的是HTML5+CSS3+Flex+Jquery，局部用到了Flex布局，全站标配HTTPS,拒绝网页劫持更懂你，通配响应式布局，然后你手机上也能随性所欲，为所欲为，考虑到使用JavaScript不利于优化等原因，所以减少了其的使用，后面增加用户体验性的效果将会逐步添加，目前已发现bug均已修复，如果还是存在问题，可给我发消息<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2315684336&site=qq&menu=yes">点击与博主交谈</a>。</p>
            <p>现在博客版本为V1.0版本，因目前界面虽已完成，但是与后面的交互只完成了主体部分，部分功能尚未完成，所以待修复完毕之后将会完全开源，欢迎Start</p>
            <p>
              国瑞前端博客，目前已经开站2年有余，一路走来，积累了不少的粉丝，作为web前端网站的一个小小的站点，其【前端博客】关键词常年居于首页，足以见证大家对本站的认可，相关文章也排名靠前，不少都是第一，SEO是辅助，优质的文章质量才是排名的关键，目前百度PC和百度手机端权重均已突破1，日均ip200+，欢迎大家<a
                href="/wp-login.php?action=register">【注册】</a> AND <a href="/wp-login.php">【登录】</a>，也欢迎同行观摩观摩，提一提宝贵的意见。您的支持，将是我最大的动力。
            </p>
          </div>
        </div>


      </div>


      <?php get_sidebar( $name ); ?>

    </div>
  </div>

    <?php get_footer() ?>


</body>
</html>
<style>
      .text_info {
            height: auto !important;
         }
</style>
<script>
  new Vue({
    el: ".main",
    data() {
      return {

      }
    }

  })
</script>




