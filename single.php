<!-- 头部文件 -->

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
  <meta name="description" content="<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,"... "); ?>"  />
 
  <?php 
		$keywords = get_post_meta($post->ID, "keywords", true);
		if($keywords == '') {
			$tags = wp_get_post_tags($post->ID);    
			foreach ($tags as $tag ) {        
				$keywords = $keywords . $tag->name . ", ";    
			}
			$keywords = rtrim($keywords, ', ');
		}
	?>
  <meta name="keywords" content="<?php echo $keywords; ?>" />
  <title><?php the_title();?>-<?php   echo get_option('huangguorui_options')['title_right']; ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" />
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.min.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/index.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/article.css">
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
        <li><a style="color:#fff;" href="/">首页</a></li>
        <li><a style="color:#fff;" href="/web/">web前端开发</a></li>
        <li><a style="color:#fff;" href="/javascript/">Javascript资源</a></li>
        <li><a style="color:#fff;" href="/html5css3/">HTML5资源</a></li>
        <li><a style="color:#fff;" href="/bloginfo/">关于博主</a></li>
      </ul>
    </div>
<!-- 头部文件 -->



    <div class="center clearfix">
    <?php
		  if (have_posts()) : while (have_posts()) : the_post();setPostViews(get_the_ID());
		 ?>
    <div class="left">
        <div class="left_list  text_info" style=""> <?php wheatv_breadcrumbs(); ?></div>

        <div class="left_list text_info article">
          <h1 class="title"><?php the_title(); ?></h1>
          <div class="article_info"><span>发布日期：<?php the_time('Y年m月d日') ?> </span><span>分类：<?php echo get_the_category()[0]->cat_name; ?></span><span> 作者： <?php the_author(); ?> </span><span>阅读：<?php echo getPostViews(get_the_ID()); ?> </span>
          </div>
          <?php the_content(); ?>
        </div>
        <?php endwhile; else : ?>
        <?php _e('Not Found'); ?>
        <?php endif; ?>

        <div class="left_list text_info">
          <p>以上就是黄国瑞博客带来的《<a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a>》，非常感谢您的观看！如果没有相关文字说明，本文即为黄国瑞博客原创(www.huangguorui.cn)，欢迎读者转载并保留本站版权！</p>
          <p>以上就是<a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a>的详细内容，更多请持续关注本站其它相关文章！</p>
        </div>
      
        <div class="left_list text_info">
            <div  class="tag_a" >
            <h3 style="display:inline-block;">标签：</h3>
            <?php the_tags('','','');?>
            </div>
        </div>

      
        <div class="left_list text_info">
        <h3>上一篇：<?php if (get_previous_post()) { previous_post_link('<span></span>%link');} else {echo "没有了，已经是最后文章";} ?></h3>
        <h3>下一篇：<?php if (get_next_post()) { next_post_link('<span></span>%link');} else {echo "没有了，已经是最新文章";} ?></h3>
        </div>
        <div class="left_list text_info">
            <div  class="" >
            <h3>浏览了该文章的用户还浏览了以下文章：</h3>
                <ul class="left_list_article">
                <li style="display:none;">
                  <!-- 留一个备用 -->
                <a href="##" >  
                    <img src="http://www.huangguorui.cn/wp-content/themes/h/img/404.jpg" alt="">
                   <span>模拟文字模拟文字</span>
                </a>
                </li>  
                <?php
global $post;
$post_tags = wp_get_post_tags($post->ID);
if ($post_tags) {
  foreach ($post_tags as $tag) {
    // 获取标签列表
    $tag_list[] .= $tag->term_id;
  }

  // 随机获取标签列表中的一个标签
  $post_tag = $tag_list[ mt_rand(0, count($tag_list) - 1) ];

  // 该方法使用 query_posts() 函数来调用相关文章，以下是参数列表
  $args = array(
        'tag__in' => array($post_tag),
        'category__not_in' => array(NULL),  // 不包括的分类ID
        'post__not_in' => array($post->ID),
        'showposts' => 12,				            // 显示相关文章数量
        'caller_get_posts' => 1
    );
  query_posts($args);
  if (have_posts()) {
    while (have_posts()) {
      the_post(); update_post_caches($posts); ?>

<li>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"
                                    title="<?php the_title_attribute(); ?>" >  
                <?php
							if ( has_post_thumbnail() )
								the_post_thumbnail();
							else
                echo '<img src="http://www.huangguorui.cn/wp-content/themes/h/img/404.jpg" alt="">';?>
                
                <span><?php the_title(); ?></span>
    </a>

    </li>
                        <?php
    					}
  					}
  else {
    echo '<li>* 暂无相关文章</li>';
  }
  wp_reset_query(); 
}
else {
  echo '<li>* 暂无相关文章</li>';
}
?>


                </ul>

            </div>
            
        </div>
        
        <div class="left_list  input_submit  text_info" style="display:none;">
          <h3>当前评论</h3>
          <textarea name="" id="" cols="30" rows="5" class="textarea" placeholder='请提交内容'></textarea>
          <input type="text" placeholder="请填写昵称">
          <input type="text" placeholder="请填写昵称">
          <input type="text" placeholder="请填写昵称">
          <input type="text" class="submit" value="提交"> 
        </div>
        <div class="left_list text_info">
                        <?php comments_template( '', true ); ?>
        </div>
      </div>
      <?php get_sidebar( $name ); ?>

    </div>
  <?php get_footer() ?>
  </div>

<!-- 图片放大 -->

<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>

        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>
</body>
</html>
<style>
      .text_info {
            height: auto !important;
         }
</style>





