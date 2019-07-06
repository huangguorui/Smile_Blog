
    <title><?php
      if(!$_GET['s']){
        echo '请输入搜索内容';
      }else{
      echo $_GET['s'];
      }
      ?>-国瑞搜索</title>


<?php get_header(); ?>
    <div class="center clearfix">
      <div style="display:none;">

    <span >
        <?php the_category() ?><i></i></span>
        <a href="<?php the_permalink(); ?>" target="_blank">
        <?php the_title(); ?></a>
      </div>

      <div class="left">
        <?php 
					$args = array( 
						'post_password' => '',
						'post_status' => 'publish', // 只选公开的文章.
						//'post__not_in' => array($post->ID),//排除当前文章
						//'caller_get_posts' => 1, // 排除置頂文章.
						//'orderby' => 'rand', // 依評論數排序.
						'posts_per_page' => 1 // 设置调用条数
					); 
					$query_posts = new WP_Query(); 
					$query_posts->query($args); 
          while( $query_posts->have_posts() ) { $query_posts->the_post(); ?>
          
        <div class="left_first">
          <a href="<?php the_permalink(); ?>" target="_blank">
            <h2 class="ellipsis">【New】 <?php the_title(); ?></h2>
          </a>
          <p>
          <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,"..."); ?>
          </p>
        </div>
        <?php } wp_reset_query();?>

        <?php
$cat_query = new WP_Query(array(
    'cat' => ''
        ));
?>
        <?php
      //  if ($cat_query->have_posts()) : while ($cat_query->have_posts()) : $cat_query->the_post(); //这个只适合循环所有的文章
                ?>

<?php
			if(have_posts()): while(have_posts()):the_post();
			?>
                <?php// the_title();//标题 ?>  
                <?php //the_permalink(); //链接 ?>
        <div class="left_list border_hover ">
          <div class="left_img">
            <a href="<?php the_permalink();?>"  target="_blank"> 
              <img src="<?php
  $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail');
  if($thumbnail_image_url[0]!='') 
    echo $thumbnail_image_url[0];
  else 
    echo "/wp-content/themes/".wp_get_theme( $stylesheet, $theme_root )."/img/404.jpg";
  ?>" alt="<?php the_title();//标题 ?>">
          </a>
          </div>
          <div class="left_text">
            <a href="<?php the_permalink(); //链接 ?>" target="_blank">
              <h3> <?php the_title();//标题 ?>  </h3>
            </a>
            <div class="entry-meta"><span><i class="iconfont">&#xe876;</i>栏目：<?php echo get_the_category()[0]->cat_name; ?> 
            <?php  
            /*
            //
foreach((get_the_category()) as $category)  
{  
  var_dump(get_the_category()[0]->cat_name);
echo $category->cat_name;  
}  
*/
?>  </span><span><i
                  class="iconfont">&#xe6a3;</i><?php the_author(); ?></span><span><span><i class="iconfont">&#xe876;</i>w前端</span>
            </div>
          <?php //the_excerpt(); //摘要，这个先保留一下?>

           <div style="    width: 100%;height: 92px;overflow: hidden;font-size:15px;line-height:30px;" > 
           <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 210,"..."); ?>
  
  </div>
            <div class="entry-meta">
              <span>
                <i class="iconfont">&#xe87b;</i>
                <?php the_time('Y年m月d日') ?>
              </span>
              <span>
                <i class="iconfont">&#xe6d7;</i>
                <?php echo getPostViews(get_the_ID()); ?>℃
              </span>
              <span class="pc">
                <a href="<?php the_permalink();?>">
                <i class="iconfont">&#xe879;</i>
                <?php echo number_format_i18n( get_comments_number() );?> 条评论
                </a>
              </span>
              <span class="pc" style="display:none;">

                <i class="iconfont">&#xe873;</i>
                <?php if( get_post_meta($post->ID,'bigfa_ding',true) ){            
											echo get_post_meta($post->ID,'bigfa_ding',true);
											} else {
											echo '0';
										}?>
                喜欢
              </span>

              <span><a href="<?php the_permalink(); //链接 ?>"  target="_blank">阅读全文 <i class="iconfont">&#xe60a;</i></a>
              </span>
            </div>

          </div>
       
        </div>
        <?php endwhile; ?>
        <?php endif; ?>

        <h1 class="entry-title">
                    <?php _e( '没有找到您搜索的内容', 'leizi' ); ?>
           </h1>
      </div>


<?php wp_pagenavi(); ?>

      <?php //get_sidebar( $name ); ?>
    </div>

    <!-- 正文区域start -->

       </div>

    <?php get_footer()?>
</body>
  

  
<script>
    $( "html" ).css( "overflow", "visible" );
  
 var search = location.search
var arr = search.substring(1).split("&")
var op = new Object()
  //js跳转页面传递数据
arr.map(function(item){
 var array = item.split('=')
 op[array[0]] = array[1];
})
  
  console.log(op);

$('.footer').css({
  

})

</script>

</html>
<style>
.entry-title {
text-align:center;
font-size:30px;
margin-top:150px;
font-weight:normal;
}
.header {
    height:auto!important;
}
.nav {
    height:50px!important;
    width: 1050px;
}
.left {
    width: 1200px!important;
}
.left_text {
    width:79%!important;
}
@media screen and (max-width: 1200px) {
    .left {
    width: 100%!important;
}
.left .left_img {
    width:100%!important;
    height:150px!important;
}
.left_text {
    width:100%!important;
}
}
</style>
<script>

$('.left_first').remove();
$('.text').remove();

if($('.left_list').length){
  $('h1').css('display','none')
}else{
  $('h1').css('display','black')

}

</script>