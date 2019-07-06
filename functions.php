<?php
// 引入模板主题设置文件
if (is_admin()) require ('include/wp-theme-options.php');

//注册菜单
register_nav_menus(array(
    'MainNav' => '主导航',
));

//注册小工具
if ( function_exists('register_sidebar') )
register_sidebar(array(
    'before_widget' => '<div class="sidebox">    ',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
));

//注册特色图像
add_theme_support('post-thumbnails');

?>
<?php //控制分页页面，每个页面所显示的文章数量
// function custom_posts_per_page($query){
// 		if(is_home()){
// 		$query->set('posts_per_page',15);//首页每页显示12篇文章
// 		}
// 		if(is_search()){
// 			$query->set('posts_per_page',10);//搜索页显示所有匹配的文章，不分页
// 		}
// 		if(is_archive()){
// 			$query->set('posts_per_page',15);//其它页面每页显示10篇文章
// 	}endif
// 	}function
//     add_action('pre_get_posts','custom_posts_per_page');
?>
<?php 
/**
* 数字分页函数
* 因为wordpress默认仅仅提供简单分页
* 所以要实现数字分页，需要自定义函数
* @Param int $range            数字分页的宽度
* @Return string|empty        输出分页的HTML代码        
*/
function lingfeng_pagenavi( $range = 4 ) {
    global $paged,$wp_query;
    if ( !$max_page ) {
        $max_page = $wp_query->max_num_pages;
    }
    if( $max_page >1 ) {
        echo "<div class='fenye wp-pagenavi'>"; 
        if( !$paged ){
            $paged = 1;
        }
        if( $paged != 1 ) {
            echo "<a href='".get_pagenum_link(1) ."' class='extend' title='跳转到首页'>首页</a>";
        }
        previous_posts_link('上一页');
        if ( $max_page >$range ) {
            if( $paged <$range ) {
                for( $i = 1; $i <= ($range +1); $i++ ) {
                    echo "<a href='".get_pagenum_link($i) ."'";
                if($i==$paged) echo " class='current'";echo ">$i</a>";
                }
            }elseif($paged >= ($max_page -ceil(($range/2)))){
                for($i = $max_page -$range;$i <= $max_page;$i++){
                    echo "<a href='".get_pagenum_link($i) ."'";
                    if($i==$paged)echo " class='current'";echo ">$i</a>";
                    }
                }elseif($paged >= $range &&$paged <($max_page -ceil(($range/2)))){
                    for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){
                        echo "<a href='".get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";
                    }
                }
            }else{
                for($i = 1;$i <= $max_page;$i++){
                    echo "<a href='".get_pagenum_link($i) ."'";
                    if($i==$paged)echo " class='current'";echo ">$i</a>";
                }
            }
        next_posts_link('下一页');
        if($paged != $max_page){
            //echo '<a href=".get_pagenum_link($max_page) ." class="extend" title='跳转到最后一页'>共'.$max_page.'页</a>';
            echo '<a href='.get_pagenum_link($max_page) .' class="last">共'.$max_page.'页</a>';
        }
        //echo '<span class="last">共'.$max_page.'页</span>';
        echo "</div>\n";  
    }
}

?>





<?php





// 只分类目录地址后添加斜杠
function nice_trailingslashit($string, $type_of_url) {
if ( $type_of_url != 'single')
$string = trailingslashit($string);
return $string;
}
add_filter('user_trailingslashit', 'nice_trailingslashit', 10, 2);

//if (is_admin()) require ('include/xm-theme-options.php');

//注册菜单
register_nav_menus(array(
    'MainNav' => '主导航',
));

if (function_exists('register_sidebar')) register_sidebar(array(
    'before_widget' => '<div class="sidebox">    ',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
));

//注册特色图像
add_theme_support('post-thumbnails');
set_post_thumbnail_size(220, 150, true); // 图片宽度与高度

?>
<?php //控制分页页面，每个页面所显示的文章数量
/*function custom_posts_per_page($query){
		if(is_home()){
		$query->set('posts_per_page',15);//首页每页显示12篇文章
		}
		if(is_search()){
			$query->set('posts_per_page',10);//搜索页显示所有匹配的文章，不分页
		}
		if(is_archive()){
			$query->set('posts_per_page',15);//其它页面每页显示10篇文章
	}//endif
	}//function
	add_action('pre_get_posts','custom_posts_per_page');*/
?>
<?php //文章分类统计
function wt_get_category_count($input = '') {
    global $wpdb;
    if ($input == '') {
        $category = get_the_category();
        return $category[0]->category_count;
    } elseif (is_numeric($input)) {
        $SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id=$input";
        return $wpdb->get_var($SQL);
    } else {
        $SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->terms.slug='$input'";
        return $wpdb->get_var($SQL);
    }
}
?>
<?php
//浏览量设置
//获取浏览数-参数文章ID
function getPostViews($postID) {
    //字段名称
    $count_key = 'post_views_count';
    //获取字段值即浏览次数
    $count = get_post_meta($postID, $count_key, true);
    //如果为空设置为0
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
//设置浏览数-参数文章ID
function setPostViews($postID) {
    //字段名称
    $count_key = 'post_views_count';
    //先获取获取字段值即浏览次数
    $count = get_post_meta($postID, $count_key, true);
    //如果为空就设为0
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        //如果不为空，加1，更新数据
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

//浏览量设置
?>

<?php
/*
//获取浏览数-参数文章ID
function getPostViews($postID) {
  
    //字段名称
    $count_key = 'post_views_count';
    //获取字段值即浏览次数
    $count = get_post_meta($postID, $count_key, true);
    //如果为空设置为0
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
//设置浏览数-参数文章ID
function setPostViews($postID) {

    //字段名称
    $count_key = 'post_views_count';
    //先获取获取字段值即浏览次数
    $count = get_post_meta($postID, $count_key, true);
    //如果为空就设为0
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
       // add_post_meta($postID, $count_key, mt_rand(0,50)); 取消自定义的文章浏览量
    } else {
        //如果不为空，加1，更新数据
        $count++;
        update_post_meta($postID, $count_key, $count);
     //  for($i=0;$i<=2000;$i++){
       // 	update_post_meta($i, $count_key, mt_rand(50,432));
       //     update_post_meta($i, 'bigfa_ding', mt_rand(0,50));
    	//}
    }
}
*/
add_filter('show_admin_bar', '__return_false'); //去掉默认顶端导航条
//时间显示方式‘xx以前’
function time_ago($type = 'commennt', $day = 7) {
    $d = $type == 'post' ? 'get_post_time' : 'get_comment_time';
    if (time() - $d('U') > 60 * 60 * 24 * $day) return;
    echo ' (', human_time_diff($d('U') , strtotime(current_time('mysql', 0))) , '前)';
}
function timeago($ptime) {
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if ($etime < 1) return '刚刚';
    $interval = array(
        12 * 30 * 24 * 60 * 60 => '年前 (' . date('Y-m-d', $ptime) . ')',
        30 * 24 * 60 * 60 => '个月前 (' . date('m-d', $ptime) . ')',
        7 * 24 * 60 * 60 => '周前 (' . date('m-d', $ptime) . ')',
        24 * 60 * 60 => '天前',
        60 * 60 => '小时前',
        60 => '分钟前',
        1 => '秒前'
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}
// 更改后台字体
function Bing_admin_lettering() {
    echo '<style type="text/css">
        * { font-family: "Microsoft YaHei" !important; }
        i, .ab-icon, .mce-close, i.mce-i-aligncenter, i.mce-i-alignjustify, i.mce-i-alignleft, i.mce-i-alignright, i.mce-i-blockquote, i.mce-i-bold, i.mce-i-bullist, i.mce-i-charmap, i.mce-i-forecolor, i.mce-i-fullscreen, i.mce-i-help, i.mce-i-hr, i.mce-i-indent, i.mce-i-italic, i.mce-i-link, i.mce-i-ltr, i.mce-i-numlist, i.mce-i-outdent, i.mce-i-pastetext, i.mce-i-pasteword, i.mce-i-redo, i.mce-i-removeformat, i.mce-i-spellchecker, i.mce-i-strikethrough, i.mce-i-underline, i.mce-i-undo, i.mce-i-unlink, i.mce-i-wp-media-library, i.mce-i-wp_adv, i.mce-i-wp_fullscreen, i.mce-i-wp_help, i.mce-i-wp_more, i.mce-i-wp_page, .qt-fullscreen, .star-rating .star { font-family: dashicons !important; }
        .mce-ico { font-family: tinymce, Arial !important; }
        .fa { font-family: FontAwesome !important; }
        .genericon { font-family: "Genericons" !important; }
        .appearance_page_scte-theme-editor #wpbody *, .ace_editor * { font-family: Monaco, Menlo, "Ubuntu Mono", Consolas, source-code-pro, monospace !important; }
        </style>';
}
add_action('admin_head', 'Bing_admin_lettering');
//点赞
add_action('wp_ajax_nopriv_bigfa_like', 'bigfa_like');
add_action('wp_ajax_bigfa_like', 'bigfa_like');
function bigfa_like() {
    global $wpdb, $post;
    $id = $_POST["um_id"];
    $action = $_POST["um_action"];
    if ($action == 'ding') {
        $bigfa_raters = get_post_meta($id, 'bigfa_ding', true);
        $expire = time() + 99999999;
        $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
        setcookie('bigfa_ding_' . $id, $id, $expire, '/', $domain, false);
        if (!$bigfa_raters || !is_numeric($bigfa_raters)) {
            update_post_meta($id, 'bigfa_ding', 1);
        } else {
            update_post_meta($id, 'bigfa_ding', ($bigfa_raters + 1));
        }
        echo get_post_meta($id, 'bigfa_ding', true);
    }
    die;
}
//最热排行
function hot_posts_list($days = 7, $nums = 10) {
    global $wpdb;
    $today = date("Y-m-d H:i:s");
    $daysago = date("Y-m-d H:i:s", strtotime($today) - ($days * 24 * 60 * 60));
    $result = $wpdb->get_results("SELECT comment_count, ID, post_title, post_date FROM $wpdb->posts WHERE post_date BETWEEN '$daysago' AND '$today' ORDER BY comment_count DESC LIMIT 0 , $nums");
    $output = '';
    if (empty($result)) {
        $output = '<li>None data.</li>';
    } else {
        $i = 1;
        foreach ($result as $topten) {
            $postid = $topten->ID;
            $title = $topten->post_title;
            $commentcount = $topten->comment_count;
            if ($commentcount != 0) {
                $output.= '<li><p><span class="post-comments">评论 (' . $commentcount . ')</span><span class="muted"><a href="javascript:;" data-action="ding" data-id="' . $postid . '" id="Addlike" class="action';
                if (isset($_COOKIE['bigfa_ding_' . $postid])) $output.= ' actived';
                $output.= '"><i class="fa fa-heart-o"></i><span class="count">';
                if (get_post_meta($postid, 'bigfa_ding', true)) {
                    $output.= get_post_meta($postid, 'bigfa_ding', true);
                } else {
                    $output.= '0';
                }
                $output.= '</span>喜欢</a></span></p><span class="label label-' . $i . '">' . $i . '</span><a href="' . get_permalink($postid) . '" title="' . $title . '">' . $title . '</a></li>';
                $i++;
            }
        }
    }
    echo $output;
}
//百度收录
function v5v1_baiping($post_id) {
    $baiduXML = 'weblogUpdates.extendedPing' . get_option('blogname') . ' ' . home_url() . ' ' . get_permalink($post_id) . ' ' . get_feed_link() . ' ';
    $wp_http_obj = new WP_Http();
    $return = $wp_http_obj->post('http://ping.baidu.com/ping/RPC2', array(
        'body' => $baiduXML,
        'headers' => array(
            'Content-Type' => 'text/xml'
        )
    ));
    if (isset($return['body'])) {
        if (strstr($return['body'], '0')) {
            $noff_log = 'succeeded!';
        } else {
            $noff_log = 'failed!';
        }
    } else {
        $noff_log = 'failed!';
    }
}
add_action('publish_post', 'v5v1_baiping');
//百度收录end
//在 WordPress 编辑器添加“下一页”按钮
add_filter('mce_buttons', 'add_next_page_button');
function add_next_page_button($mce_buttons) {
    $pos = array_search('wp_more', $mce_buttons, true);
    if ($pos !== false) {
        $tmp_buttons = array_slice($mce_buttons, 0, $pos + 1);
        $tmp_buttons[] = 'wp_page';
        $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos + 1));
    }
    return $mce_buttons;
}
function e_secret($atts, $content = null) { //输入密码查看
    extract(shortcode_atts(array(
        'key' => null
    ) , $atts));
    if (isset($_POST['e_secret_key']) && $_POST['e_secret_key'] == $key) {
        return '<div class="e-secret">' . $content . '</div>';
    } else {
        return '<form class="e-secret" action="' . get_permalink() . '" method="post" name="e-secret"><label>请输入密码：</label><input type="password" name="e_secret_key" class="euc-y-i" maxlength="50"><input type="submit" class="euc-y-s" value="确定"><div class="euc-clear"></div></form>';
    }
}
add_shortcode('secret', 'e_secret');
remove_action('wp_head', 'wp_enqueue_scripts', 1); //Javascript的调用
remove_action('wp_head', 'feed_links', 2); //移除feed
remove_action('wp_head', 'feed_links_extra', 3); //移除feed
remove_action('wp_head', 'rsd_link'); //移除离线编辑器开放接口
remove_action('wp_head', 'wlwmanifest_link'); //移除离线编辑器开放接口
remove_action('wp_head', 'index_rel_link'); //去除本页唯一链接信息
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'locale_stylesheet');
remove_action('publish_future_post', 'check_and_publish_future_post', 10, 1);
remove_action('wp_head', 'noindex', 1);
remove_action('wp_head', 'wp_print_styles', 8); //载入css
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_generator'); //移除WordPress版本
remove_action('wp_head', 'rel_canonical');
remove_action('wp_footer', 'wp_print_footer_scripts');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('template_redirect', 'wp_shortlink_header', 11, 0);
add_action('widgets_init', 'my_remove_recent_comments_style');
function my_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}
//禁止加载WP自带的jquery.js
if (!is_admin()) { // 后台不禁止
    function my_init_method() {
        wp_deregister_script('jquery'); // 取消原有的 jquery 定义
        
    }
    add_action('init', 'my_init_method');
}
wp_deregister_script('l10n');
add_action('after_wp_tiny_mce', 'add_button_mce');
function add_button_mce($mce_settings) { //扩充发表文章编辑器的导航标签
    
?>
<script type="text/javascript">
    QTags.addButton( '注意', '注意', "<span class='beCareful'>", "</span>" );
    QTags.addButton( '加密内容', '加密内容', "[secret key='123']", "[/secret]" );
    QTags.addButton( '超链接', '超链接', "<a href=''>", "</a>" );
    QTags.addButton( 'a', 'a', "<a href=''>", "</a>" );
    QTags.addButton( 'p', 'p', "<p>", "</p>" );
    QTags.addButton( '前言', '前言', "\n<div class='preface'><p>", "</p></div>" );
    QTags.addButton( '重点笔记', '重点笔记', "\n<div class='stress'><p>", "</p></div>" );
    QTags.addButton( 'strong', 'strong', "<strong>", "</strong>" );
    QTags.addButton( 'span', 'span', "<span>", "</span>" );
    QTags.addButton( 'h1', 'h1', "\n<h1 class='h1'>", "</h1>" );
    QTags.addButton( 'h2', 'h2', "\n<h2 class='h2'>", "</h2>" );
    QTags.addButton( 'h3', 'h3', "\n<h3 class='h3'>", "</h3>" );
    QTags.addButton( 'h4', 'h4', "\n<h4 class='h4'>", "</h4>" );
    QTags.addButton( 'h5', 'h5', "\n<h5 class='h5'>", "</h5>" );
    QTags.addButton( 'h6', 'h6', "\n<h6 class='h6'>", "</h6>" );
    QTags.addButton( 'ol', 'ol', "\n<ol class='ol'>", "</ol>" );
    QTags.addButton( 'ul', 'ul', "\n<ul class='ul'>", "</ul>" );
    QTags.addButton( 'li', 'li', "<li><p>", "</p></li>" );

    QTags.addButton( 'php', 'php', "\n[cc lang='php']", "[/cc]" );
  QTags.addButton( 'js', 'js', "\n[cc lang='javascript']", "[/cc]" );
  /*
  js全屏滚动_模块淡入效果请猛戳此处：点击
js全屏滚动_模块淡入请请猛戳此处：下载
  */
  
  QTags.addButton( '点击', '点击', '\n<h4>效果请猛戳此处：<a href="/works///index.html" target="_blank">点击</a></h4>' );
    QTags.addButton( '下载', '下载', '\n<h4>下载请猛戳此处：<a href="/works/"  target="_blank">下载</a></h4>' );

    QTags.addButton( 'secret', 'secret', "\n[secret key='123']", "[/secret]" );
    QTags.addButton( 'embed', 'embed', "\n[embed]\n", "\n[/embed]" );
</script>
<?php
}
// 彩色静态标签云 Color Tag Cloud
 function colorCloud($text) {
   $text = preg_replace_callback('|<a (.+?)>|i', 'colorCloudCallback', $text);
   return $text;
 }
function colorCloudCallback($matches) {
   $text = $matches[1];
  $color = dechex(rand(0,16777215));
   $pattern = '/style=(\'|\")(.*)(\'|\")/i';
  $text = preg_replace($pattern, "style=\"color:#{$color};$2;\"", $text);
   return "<a $text>";
 }
 add_filter('wp_tag_cloud', 'colorCloud', 1);
// 搜索结果关键词高亮显示
// function lee_set_query() {
//   $query  = attribute_escape(get_search_query());
//   if(strlen($query) > 0){
//     echo '
//       <script type="text/javascript">
//         var lee_query  = "'.$query.'";
//       </script>
//     ';
//   }
// }
// function lee_init_jquery() {
//  wp_enqueue_script('jquery');
// }
// add_action('init', 'lee_init_jquery');
// add_action('wp_print_scripts', 'lee_set_query');
// 文章外部链接加上nofollow
// add_filter( 'the_content', 'cn_nf_url_parse');
// function cn_nf_url_parse( $content ) {
//   $regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>";
//   if(preg_match_all("/$regexp/siU", $content, $matches, PREG_SET_ORDER)) {
//     if( !empty($matches) ) {
//       $srcUrl = get_option('siteurl');
//       for ($i=0; $i < count($matches); $i++)
//       {
//         $tag = $matches[$i][0];
//         $tag2 = $matches[$i][0];
//         $url = $matches[$i][0];
//         $noFollow = '';
//         $pattern = '/target\s*=\s*"\s*_blank\s*"/';
//         preg_match($pattern, $tag2, $match, PREG_OFFSET_CAPTURE);
//         if( count($match) < 1 )
//           $noFollow .= ' target="_blank" ';
//         $pattern = '/rel\s*=\s*"\s*[n|d]ofollow\s*"/';
//         preg_match($pattern, $tag2, $match, PREG_OFFSET_CAPTURE);
//         if( count($match) < 1 )
//           $noFollow .= ' rel="nofollow" ';
//         $pos = strpos($url,$srcUrl);
//         if ($pos === false) {
//           $tag = rtrim ($tag,'>');
//           $tag .= $noFollow.'>';
//           $content = str_replace($tag2,$tag,$content);
//         }
//       }
//     }
//   }
//   $content = str_replace(']]>', ']]>', $content);
//   return $content;
// }
// 自定义登录界面
function custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="https://www.huanggr.cn/style-login.4205e3e2.css" />';
}
add_action('login_head', 'custom_login');
function login_headerurl($url) {
    return get_bloginfo('url');
}
add_filter('login_headerurl', 'login_headerurl');
function login_headertitle($title) {
    return __('国瑞前端');
}
add_filter('login_headertitle', 'login_headertitle');
// 解决找回密码链接无效问题
function reset_password_message($message, $key) {
    if (strpos($_POST['user_login'], '@')) {
        $user_data = get_user_by('email', trim($_POST['user_login']));
    } else {
        $login = trim($_POST['user_login']);
        $user_data = get_user_by('login', $login);
    }
    $user_login = $user_data->user_login;
    $msg = __('当前有请求重设如下帐号的密码：') . "\r\n\r\n";
    $msg.= network_site_url() . "\r\n\r\n";
    $msg.= sprintf(__('用户名：%s') , $user_login) . "\r\n\r\n";
    $msg.= __('若这不是您本人要求的，请忽略本邮件，一切如常。') . "\r\n\r\n";
    $msg.= __('要重置您的密码，请打开下面的链接：') . "\r\n\r\n";
    $msg.= network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login) , 'login');
    return $msg;
}
add_filter('retrieve_password_message', reset_password_message, null, 2);
// 面包屑导航注册代码
function wheatv_breadcrumbs() {
    $delimiter = '<i>></i>';
    $name = '首页'; //text for the 'Home' link
    $currentBefore = '';
    $currentAfter = '';
    if (!is_home() && !is_front_page() || is_paged()) {
        echo '';
        global $post;
        // $home = get_bloginfo('url');
        $home = get_option('home');
        echo '<a href="' . $home . '" >' . $name . ' </a>' . $delimiter . ' ';
        if (is_category()) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) echo (get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $currentBefore . '';
            single_cat_title();
            echo '' . $currentAfter;
        } elseif (is_day()) {
            echo '' . get_the_time('Y') . ' ' . $delimiter . ' ';
            echo '' . get_the_time('F') . ' ' . $delimiter . ' ';
            echo $currentBefore . get_the_time('d') . $currentAfter;
        } elseif (is_month()) {
            echo '' . get_the_time('Y') . ' ' . $delimiter . ' ';
            echo $currentBefore . get_the_time('F') . $currentAfter;
        } elseif (is_year()) {
            echo $currentBefore . get_the_time('Y') . $currentAfter;
        } elseif (is_single()) {
            $cat = get_the_category();
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $currentBefore;
            the_title();
            echo $currentAfter;
        } elseif (is_page() && !$post->post_parent) {
            echo $currentBefore;
            the_title();
            echo $currentAfter;
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '' . get_the_title($page->ID) . '';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
            echo $currentBefore;
            the_title();
            echo $currentAfter;
        } elseif (is_search()) {
            echo $currentBefore . '搜索结果' . get_search_query() . '' . $currentAfter;
        } elseif (is_tag()) {
            echo $currentBefore . '搜索标签： ';
            single_tag_title();
            echo '' . $currentAfter;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
        } elseif (is_404()) {
            echo $currentBefore . 'Error 404' . $currentAfter;
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
            echo __('第') . '' . get_query_var('paged') . '页';
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
        }
        echo '';
    }
}
//取消内容转义
remove_filter('the_content', 'wptexturize');
//取消摘要转义
remove_filter('the_excerpt', 'wptexturize');
//取消评论转义
remove_filter('comment_text', 'wptexturize');
//更改编辑器默认视图为HTML/文本
add_filter('wp_default_editor', create_function('', 'return "html";'));
//关闭wordpress各种更新，避免插件不兼容
//add_filter('pre_site_transient_update_core',create_function('$a', "return null;")); // 关闭核心提示
//add_filter('pre_site_transient_update_plugins',create_function('$a', "return null;")); // 关闭插件提示
//add_filter('pre_site_transient_update_themes',create_function('$a', "return null;")); // 关闭主题提示
remove_action('admin_init', '_maybe_update_core'); // 禁止 WordPress 检查更新
//remove_action('admin_init', '_maybe_update_plugins'); // 禁止 WordPress 更新插件
//remove_action('admin_init', '_maybe_update_themes');  // 禁止 WordPress 更新主题
//防止CC攻击
session_start(); //开启session
$timestamp = time();
$ll_nowtime = $timestamp;
//判断session是否存在 如果存在从session取值，如果不存在进行初始化赋值
if ($_SESSION) {
    $ll_lasttime = $_SESSION['ll_lasttime'];
    $ll_times = $_SESSION['ll_times'] + 1;
    $_SESSION['ll_times'] = $ll_times;
} else {
    $ll_lasttime = $ll_nowtime;
    $ll_times = 1;
    $_SESSION['ll_times'] = $ll_times;
    $_SESSION['ll_lasttime'] = $ll_lasttime;
}
//现在时间-开始登录时间 来进行判断 如果登录频繁 跳转 否则对session进行赋值
if (($ll_nowtime - $ll_lasttime) < 3) {
    if ($ll_times >= 5) {
        header("location:https://127.0.0.1"); //可以换成其他链接，比如站内的404错误显示页面(千万不要用动态页面)
        exit;
    }
} else {
    $ll_times = 0;
    $_SESSION['ll_lasttime'] = $ll_nowtime;
    $_SESSION['ll_times'] = $ll_times;
}
//恢复wordpress删除的友情链接功能
add_filter('pre_option_link_manager_enabled', '__return_true');
//评论 VIP 标志
function get_author_class($comment_author_email, $comment_author_url) {
    global $wpdb;
    $adminEmail = '2315684336@qq.com';
    $author_count = count($wpdb->get_results("SELECT comment_ID as author_count FROM $wpdb->comments WHERE comment_author_email = '$comment_author_email' "));
    if ($comment_author_email == $adminEmail) echo '<a class="vp" target="_blank" href="https://www.huanggr.cn/category/about" title="经鉴定，管理员"></a>';
    $linkurls = $wpdb->get_results("SELECT link_url FROM $wpdb->links WHERE link_url = '$comment_author_url'");
    foreach ($linkurls as $linkurl) {
        if ($linkurl->link_url == $comment_author_url) echo '<a class="vip" target="_blank" href="/links.html" title="合作商或友情链接认证"><i class="wi wi-heart"></i></a>';
    }
    if ($author_count >= 1 && $author_count < 5 && $comment_author_email != $adminEmail) echo '<a class="vip1" target="_blank" href="https://www.huanggr.cn/category/about" title="评论之星 LV.1"><i class="wi wi-level-1"></i></a>';
    else if ($author_count >= 5 && $author_count < 10 && $comment_author_email != $adminEmail) echo '<a class="vip2" target="_blank" href="https://www.huanggr.cn/category/about" title="评论之星 LV.2"><i class="wi wi-level-2"></i></a>';
    else if ($author_count >= 10 && $author_count < 25 && $comment_author_email != $adminEmail) echo '<a class="vip3" target="_blank" href="https://www.huanggr.cn/category/about" title="评论之星 LV.3"><i class="wi wi-level-3"></i></a>';
    else if ($author_count >= 25 && $author_count < 50 && $comment_author_email != $adminEmail) echo '<a class="vip4" target="_blank" href="https://www.huanggr.cn/category/about" title="评论之星 LV.4"><i class="wi wi-level-4"></i></a>';
    else if ($author_count >= 50 && $author_count < 100 && $comment_author_email != $adminEmail) echo '<a class="vip5" target="_blank" href="https://www.huanggr.cn/category/about" title="评论之星 LV.5"><i class="wi wi-level-5"></i></a>';
    else if ($author_count >= 100 && $author_count < 250 && $comment_author_email != $adminEmail) echo '<a class="vip6" target="_blank" href="https://www.huanggr.cn/category/about" title="评论之星 LV.6"><i class="wi wi-level-6"></i></a>';
    else if ($author_count >= 250 && $comment_author_email != $adminEmail) echo '<a class="vip7" target="_blank" href="https://www.huanggr.cn/category/about" title="评论之星 LV.7"><i class="wi wi-level-7"></i></a>';
}
//获取用户UA信息,包括浏览器和系统等 调用:echo user_agent($comment->comment_agent);
function user_agent($ua) {
    //开始解析操作系统
    $os = null;
    if (preg_match('/Windows 95/i', $ua) || preg_match('/Win95/', $ua)) {
        $os = "Windows 95";
    } elseif (preg_match('/Windows NT 5.0/i', $ua) || preg_match('/Windows 2000/i', $ua)) {
        $os = "Windows 2000";
    } elseif (preg_match('/Win 9x 4.90/i', $ua) || preg_match('/Windows ME/i', $ua)) {
        $os = "Windows ME";
    } elseif (preg_match('/Windows.98/i', $ua) || preg_match('/Win98/i', $ua)) {
        $os = "Windows 98";
    } elseif (preg_match('/Windows NT 6.0/i', $ua)) {
        $os = "Windows Vista";
    } elseif (preg_match('/Windows NT 6.1/i', $ua)) {
        $os = "Windows 7";
    } elseif (preg_match('/Windows NT 5.1/i', $ua)) {
        $os = "Windows XP";
    } elseif (preg_match('/Windows NT 5.2/i', $ua) && preg_match('/Win64/i', $ua)) {
        $os = "Windows XP 64 bit";
    } elseif (preg_match('/Windows NT 5.2/i', $ua)) {
        $os = "Windows Server 2003";
    } elseif (preg_match('/Mac_PowerPC/i', $ua)) {
        $os = "Mac OS";
    } elseif (preg_match('/Windows Phone/i', $ua)) {
        $os = "Windows Phone7";
    } elseif (preg_match('/Windows NT 6.2/i', $ua)) {
        $os = "Windows 8";
    } elseif (preg_match('/Windows NT 4.0/i', $ua) || preg_match('/WinNT4.0/i', $ua)) {
        $os = "Windows NT 4.0";
    } elseif (preg_match('/Windows NT/i', $ua) || preg_match('/WinNT/i', $ua)) {
        $os = "Windows NT";
    } elseif (preg_match('/Windows CE/i', $ua)) {
        $os = "Windows CE";
    } elseif (preg_match('/ipad/i', $ua)) {
        $os = "iPad";
    } elseif (preg_match('/Touch/i', $ua)) {
        $os = "Touchw";
    } elseif (preg_match('/Symbian/i', $ua) || preg_match('/SymbOS/i', $ua)) {
        $os = "Symbian OS";
    } elseif (preg_match('/iPhone/i', $ua)) {
        $os = "iPhone";
    } elseif (preg_match('/PalmOS/i', $ua)) {
        $os = "Palm OS";
    } elseif (preg_match('/QtEmbedded/i', $ua)) {
        $os = "Qtopia";
    } elseif (preg_match('/Ubuntu/i', $ua)) {
        $os = "Ubuntu Linux";
    } elseif (preg_match('/Gentoo/i', $ua)) {
        $os = "Gentoo Linux";
    } elseif (preg_match('/Fedora/i', $ua)) {
        $os = "Fedora Linux";
    } elseif (preg_match('/FreeBSD/i', $ua)) {
        $os = "FreeBSD";
    } elseif (preg_match('/NetBSD/i', $ua)) {
        $os = "NetBSD";
    } elseif (preg_match('/OpenBSD/i', $ua)) {
        $os = "OpenBSD";
    } elseif (preg_match('/SunOS/i', $ua)) {
        $os = "SunOS";
    } elseif (preg_match('/Linux/i', $ua)) {
        $os = "Linux";
    } elseif (preg_match('/Mac OS X/i', $ua)) {
        $os = "Mac OS X";
    } elseif (preg_match('/Macintosh/i', $ua)) {
        $os = "Mac OS";
    } elseif (preg_match('/Unix/i', $ua)) {
        $os = "Unix";
    } elseif (preg_match('#Nokia([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $os = "Nokia" . $matches[1];
    } elseif (preg_match('/Mac OS X/i', $ua)) {
        $os = "Mac OS X";
    } else {
        $os = '未知操作系统';
    }
    //开始解析浏览器
    if (preg_match('#(Camino|Chimera)[ /]([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = 'Camino ' . $matches[2];
    } elseif (preg_match('#SE 2([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = '搜狗浏览器 2' . $matches[1];
    } elseif (preg_match('#360([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = '360浏览器 ' . $matches[1];
    } elseif (preg_match('#Maxthon( |\/)([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = 'Maxthon ' . $matches[2];
    } elseif (preg_match('#Chrome/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = 'Chrome ' . $matches[1];
    } elseif (preg_match('#Safari/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = 'Safari ' . $matches[1];
    } elseif (preg_match('#opera mini#i', $ua)) {
        $browser = 'Opera Mini ' . $matches[1];
    } elseif (preg_match('#Opera.([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = 'Opera ' . $matches[1];
    } elseif (preg_match('#(j2me|midp)#i', $ua)) {
        $browser = "J2ME/MIDP Browser";
    } elseif (preg_match('/GreenBrowser/i', $ua)) {
        $browser = 'GreenBrowser';
    } elseif (preg_match('#TencentTraveler ([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = '腾讯TT浏览器 ' . $matches[1];
    } elseif (preg_match('#UCWEB([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = 'UCWEB ' . $matches[1];
    } elseif (preg_match('#MSIE ([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = 'Internet Explorer ' . $matches[1];
    } elseif (preg_match('#avantbrowser.com#i', $ua)) {
        $browser = 'Avant Browser';
    } elseif (preg_match('#PHP#', $ua, $matches)) {
        $browser = 'PHP';
    } elseif (preg_match('#danger hiptop#i', $ua, $matches)) {
        $browser = 'Danger HipTop';
    } elseif (preg_match('#Shiira[/]([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = 'Shiira ' . $matches[1];
    } elseif (preg_match('#Dillo[ /]([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = 'Dillo ' . $matches[1];
    } elseif (preg_match('#Epiphany/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = 'Epiphany ' . $matches[1];
    } elseif (preg_match('#UP.Browser/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = 'Openwave UP.Browser ' . $matches[1];
    } elseif (preg_match('#DoCoMo/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = 'DoCoMo ' . $matches[1];
    } elseif (preg_match('#(Firefox|Phoenix|Firebird|BonEcho|GranParadiso|Minefield|Iceweasel)/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = 'Firefox ' . $matches[2];
    } elseif (preg_match('#(SeaMonkey)/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = 'Mozilla SeaMonkey ' . $matches[2];
    } elseif (preg_match('#Kazehakase/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
        $browser = 'Kazehakase ' . $matches[1];
    } else {
        $browser = '未知浏览器';
    }
    return "<span class='system'>" . $os . "</span> | <span class='browser'>" . $browser . "</span>";
}
//自定义评论列表模板
function dedewp_comment_add_at($comment_text, $comment = '') {
    if ($comment->comment_parent > 0) {
        $comment_text = '<a  class="action" href="#comment-' . $comment->comment_parent . '">@' . get_comment_author($comment->comment_parent) . '</a>' . $comment_text;
    }
    return $comment_text;
}
add_filter('get_comment_text', 'dedewp_comment_add_at', 20, 2);
function simple_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li class="comment" id="li-comment-<?php
    comment_ID(); ?>">
            <div class="media">
                <div class="media-left">
                 <?php
    if (function_exists('get_avatar') && get_option('show_avatars')) {
        echo get_avatar($comment, 48);
    } ?>
                </div>
                <div class="media-body">
                    <?php
    printf(__('<span class="author_name">%s</span>') , get_comment_author_link()); ?>
                    <!-- vip等级 -->
                    <span class="comment_vip">
                        <?php
    get_author_class($comment->comment_author_email, $comment->comment_author_url) ?>
                    </span>
                    <!-- 评论用户系统信息 -->
                    <?php
    echo user_agent($comment->comment_agent); ?>
                    <?php
    if ($comment->comment_approved == '0'): ?>
                        <em>评论等待审核...</em><br />
                    <?php
    endif; ?>
                    <?php
    comment_text(); ?>
                </div>
            </div>
            <div class="comment-metadata">
                <span class="comment-pub-time">
                    <?php
    echo get_comment_time('Y-m-d H:i'); ?>
                </span>
                <span class="comment-btn-reply">
                  <i class="fa fa-reply"></i> <?php
    comment_reply_link(array_merge($args, array(
        'reply_text' => '回复',
        'depth' => $depth,
        'null' => $args['max_depth']
    ))) ?> 
                </span>
            </div>
 
 <?php
}
// require_once(TEMPLATEPATH . 'include/xm-api.php');
?>
<?php

// 获取文章第一张缩略图 
function catch_that_image() {
	global $post;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img*.+src=[\'"]([^\'"]+)[\'"].*>/iU', wp_unslash($post->post_content), $matches);
	if(empty($output)){ 
        $first_img = "/wp-content/themes/Art_Blog/images/default.png";
	}else {
		$first_img = $matches [1][0];
	}
	return $first_img;
}  

?>

      