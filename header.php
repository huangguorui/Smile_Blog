<?php 
$webUrl = array(
  '/',
'/web/',
'/javascript/',
'/html5css3/',
'/bloginfo/',
'',

);
$webTItle = array(
'web前端开发_HTMl5模板下载_Javascript源码分享_CSS3教程',
'HTML5教程_html从入门到精通_模板下载',
'Javascript教程_js从入门到精通_资源下载',
'CSS3资源__css3从入门到精通_模板下载',
'个人简介'

);
$description = array(
  '本站提供前端资源下载，HTML5主题下载，Javascript源码分享，CSS3教程，Web前端技术问题处理，专注于web前端开发,同时分享前端资源和工具,快来加入我们吧!',
  'HTML5教程_html从入门到精通_模板下载,专注web前端开发，提供HTML5教程，拥有完善的知识分享体系，帮助你快速入门前端，并且提供前端模板的下载！',
  'Javascript教程_js从入门到精通_资源下载，常见特效分享，提供常见js源码下载，拥有完善的知识分享体系，，帮助你快速入门前端，快来学习吧',
  'CSS3资源__css3从入门到精通_模板下载，常见问题分享，',
  '这是一个不错的博客，你值得拥有'
);
$keywords = array(
'web前端开发，前端博客，web前端，资源下载，HTMl5主题，黄国瑞博客',
'HTML5下载，HTML5教程，CSS3教程，入门到精通_',
'Javascript教程，js从入门到精通，资源下载，常见特效分享，js源码下载',
'css3资源，css资源下载',
'个人博客，博客简介',
''

);
  $url = $_SERVER['REQUEST_URI']."";    //转换为字符
  if($url=='/'){
      $title = 'web前端开发_HTMl5资源_Javascript源码下载';
      $description = $description[0];
      $keywords = $keywords[0];

  }else {
    foreach($webUrl as $index=>$item){
      if($item ==$url){
        $title = $webTItle[$index];
        $description = $description[$index];
    $keywords = $keywords[$index];
      }
		  //
		//  $description = '当前是文章页面';
	//	$keywords = '当前是文章页面';
    }
    // if($url = $webUrl[0]){

    // }else 
    // if($url = $webUrl[1]){

    // }else
    // if($url = $webUrl[2]){

    // }

   // $title = "不是首页-黄国瑞博客";
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <!-- 强制https -->
  <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Author" content="黄瑞" />
  <meta name="description" content="<?php if($title){echo $description;}?>" />
  <meta name="keywords" content="<?php echo $keywords;?>" />
  <title><?php if($title){echo $title;}else{the_title();} ?>-黄国瑞博客</title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" />
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.min.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/article.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/index.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/codecolorer.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/page.css">
  <script src="<?php bloginfo('template_url'); ?>/js/jquery-2.1.4.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/vue.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/index.js"></script>
  <style>
    @font-face {
      font-family: 'iconfont';
      /* project id 420290 */
      src: url('//at.alicdn.com/t/font_420290_qw0xvnw2xw.eot');
      src: url('//at.alicdn.com/t/font_420290_qw0xvnw2xw.eot?#iefix') format('embedded-opentype'),
        url('//at.alicdn.com/t/font_420290_qw0xvnw2xw.woff2') format('woff2'),
        url('//at.alicdn.com/t/font_420290_qw0xvnw2xw.woff') format('woff'),
        url('//at.alicdn.com/t/font_420290_qw0xvnw2xw.ttf') format('truetype'),
        url('//at.alicdn.com/t/font_420290_qw0xvnw2xw.svg#iconfont') format('svg');
    }
    .iconfont {
      font-family: "iconfont" !important;
      font-size: 14px;
      font-style: normal;
      -webkit-font-smoothing: antialiased;
      -webkit-text-stroke-width: 0.2px;
      -moz-osx-font-smoothing: grayscale;
      margin-right: 3px;

    }
  </style>
</head>
<body>
<div class="main">
<div class="header clearfix">
      <div class="pc">
        <div class="logo">
          <a href="/" title="黄国瑞博客">
            <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="黄国瑞博客">
          </a>
        </div>
        <ul class="nav">
          <li><a href="/"><i class="iconfont">&#xe87c;</i>首页</a></li>
          <li class="<?php if ( (is_category('1') || in_category('1')) && !is_page() && !is_home() ) { echo 'current'; } ?>"><a href="/web/"><i class="iconfont">&#xe87e;</i>web前端开发</a></li>
          <li class="<?php if ( (is_category('3') || in_category('3')) && !is_page() && !is_home() ) { echo 'current'; } ?>"><a href="/javascript/"><i class="iconfont">&#xe6df;</i>Javascript资源</a></li>
          <li class="<?php if ( (is_category('2') || in_category('2')) && !is_page() && !is_home() ) { echo 'current'; } ?>"><a href="/html5css3/"><i class="iconfont">&#xe6dd;</i>HTML5资源</a></li>
          <li class="<?php if ( (is_category('5') || in_category('5')) && !is_page() && !is_home() ) { echo 'current'; } ?>"><a href="/bloginfo/"><i class="iconfont">&#xe876;</i>关于博主</a></li>
          <!-- <li class="search"><input type="text" placeholder="请输入需要搜索的内容……"><input type="submit" value="搜索" -->
              <!-- class="btn_search"></li> -->
			  <li class="search">
			  <form role="search" method="get"  action="<?php echo home_url(); ?>/">
					<input  name="s" id="s" value="" placeholder="输入关键字搜索" type="text" />
					<input class="btn_search" type="submit" id="searchsubmit" vlaue="搜索">
				</form>
			  </li>
        </ul>
      </div>
      <div class="phone">
        <div class="phone_title left_nav">
          <span class="" onclick="tabNav()"><i class="iconfont"
              style="font-size:35px;margin-left:5px;cursor:pointer;">&#xe6df;</i></span>
          <h1>黄国瑞博客</h1>
          <span class="phone_right" onclick="phoneSearch()"><i class="iconfont"
              style="font-size:35px;margin-right:10px;cursor:pointer;">&#xe87d;</i></span>
        </div>

        <span class="phone_search">
		
		  <!-- <input type="text" placeholder="请点击搜索搜索内容……"><input type="submit" value="搜索"> -->
		  <form role="search" method="get"  action="<?php echo home_url(); ?>/">
					<input  name="s" id="s" value="" placeholder="输入关键字搜索" type="text" />
					<input class="" type="submit" id="searchsubmit" vlaue="搜索">
				</form>

        </span>

		
      </div>

    </div>
    <div class="slide_nav">
      <ul>
        <li><a style="color:#fff;" href="/"><i class="iconfont">&#xe87c;</i>首页</a></li>
        <li><a style="color:#fff;" href="/web/"><i class="iconfont">&#xe87e;</i>web前端开发</a></li>
        <li><a style="color:#fff;" href="/javascript/"><i class="iconfont">&#xe6df;</i>Javascript资源</a></li>
        <li><a style="color:#fff;" href="/html5css3/"><i class="iconfont">&#xe6dd;</i>HTML5资源</a></li>
        <li><a style="color:#fff;" href="/bloginfo/"><i class="iconfont">&#xe876;</i>关于博主</a></li>
      </ul>
    </div>