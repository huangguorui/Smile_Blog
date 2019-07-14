<?php 

//var_dump(get_option('huangguorui_options')['index_url']);
$hello = explode(',',$source);

$webUrl = explode(',',get_option('huangguorui_options')['index_url']);
$webTItle = explode(',',get_option('huangguorui_options')['index_title']);
$description =  explode(',',get_option('huangguorui_options')['index_desc']);
$keywords =  explode(',',get_option('huangguorui_options')['index_keys']);
function clearLineBreaks($data){
  //var_dump($data);
  foreach($data as $index=>$item){
    $data[$index] = str_replace(PHP_EOL, '', $item);   
    //$webUrl[$index] = str_replace(array("\r\n", "\r", "\n"), "", $item);    //去除空格ing
  }
  return $data;

}
//清除空格
$webUrl = clearLineBreaks($webUrl);
$webTItle = clearLineBreaks($webTItle);
$description = clearLineBreaks($description);
$keywords = clearLineBreaks($keywords);




//闲杂只管标题
$url = $_SERVER['REQUEST_URI']."";    //转换为字符

//var_dump(array_search("/web/",$webUrl));
$indexCur = array_search($url,$webUrl);
//var_dump($indexCur);
    $title = $webTItle[$indexCur];
    $description = $description[$indexCur];
    $keywords = $keywords[$indexCur];
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
  <meta name="description" content="<?php echo $description;?>" />
  <meta name="keywords" content="<?php echo $keywords;?>" />
  <title><?php echo $title; ?>-<?php   echo get_option('huangguorui_options')['title_right']; ?></title>
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
          <a href="/" title="<?php   echo get_option('huangguorui_options')['title_right']; ?>">
            <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="<?php   echo get_option('huangguorui_options')['title_right']; ?>">
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
          <h1><?php   echo get_option('huangguorui_options')['title_right']; ?></h1>
    
   
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