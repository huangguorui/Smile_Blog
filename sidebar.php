<div class="right">
        <div class="rihgt_list">
        <p> <?php 
                echo get_option('huangguorui_options')['slider_index_text'];
            ?></p>
         
        </div>

        <div class="rihgt_list">
          <h3>热门评论</h3>
          <div class="comment_list">
            <ul class="clearfix">
            <!-- wordPress原生评论头像获取get_avatar(get_comment_author_email(), 50) -->
            <!-- 获取QQ昵称和头像（jsonp）http://users.qzone.qq.com/fcg-bin/cgi_get_portrait.fcg?uins=343049466
             -->
            <!-- 获取QQ昵称http://q1.qlogo.cn/g?b=qq&nk=843977358&s=40
                 http://q2.qlogo.cn/headimg_dl?dst_uin=843977358&spec=40 -->

            <?php
            //通过活动qq图像进行设置
            global $wpdb;
            $my_email = get_bloginfo ('admin_email'); // AND comment_author_email != '$my_email' 不展示管理员回复
            $sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url,comment_author_email, SUBSTRING(comment_content,1,100) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT 6";
            $comments = $wpdb->get_results($sql);
            $output = $pre_HTML;
            foreach ($comments as $comment) { $com_excerpt = strip_tags($comment->com_excerpt); $excerpt_len = mb_strlen($com_excerpt, 'utf-8');
                if ($excerpt_len > 46) $com_excerpt = mb_substr($com_excerpt, 0, 46, 'utf-8').'...';
                //$output .= "\n<li>". '<img src=https://q.qlogo.cn/headimg_dl?bs=qq&dst_uin='.get_comment_author_email().'&src_uin=qq.feixue.me&fid=blog&spec=100&id='.rand(1,1000).'>' .strip_tags($comment->comment_author) . "<span>（" . timeago($comment->comment_date_gmt) . "）</span>" . "<p>". $com_excerpt ."</p>" . "<a href=\"" . get_permalink($comment->ID) ."#comment-" . $comment->comment_ID . "\" title=\"查看 " .$comment->post_title . "\">评：".$comment->post_title ."</a></li>";}
                $output .= "\n<li>". '<img src=https://q.qlogo.cn/headimg_dl?bs=qq&dst_uin='.get_comment_author_email().'&src_uin=qq.feixue.me&fid=blog&spec=100&id='.rand(1,1000).'>' .strip_tags($comment->comment_author) . "<span></span>" . "<p>". $com_excerpt ."</p>" . "<a href=\"" . get_permalink($comment->ID) ."#comment-" . $comment->comment_ID . "\" title=\"查看 " .$comment->post_title . "\">评：".$comment->post_title ."</a></li>";}

            $output .= $post_HTML;
            $output = convert_smilies($output);
            echo $output;
        ?> 


              <?php
              //下面是wordpress自带的
              // global $wpdb;
              // $my_email = get_bloginfo ('admin_email');
              // $sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url,comment_author_email, SUBSTRING(comment_content,1,100) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' AND comment_author_email != '$my_email' ORDER BY comment_date_gmt DESC LIMIT 6";
              // $comments = $wpdb->get_results($sql);
              // $output = $pre_HTML;
              // foreach ($comments as $comment) { $com_excerpt = strip_tags($comment->com_excerpt); $excerpt_len = mb_strlen($com_excerpt, 'utf-8');
              //     if ($excerpt_len > 46) $com_excerpt = mb_substr($com_excerpt, 0, 46, 'utf-8').'...';
              //     $output .= "\n<li>".get_avatar(get_comment_author_email(), 50).strip_tags($comment->comment_author). '：' . "<p>". $com_excerpt ."</p>" . "<a href=\"" . get_permalink($comment->ID) ."#comment-" . $comment->comment_ID . "\" title=\"查看 " .$comment->post_title . "\">评：".$comment->post_title ."</a></li>";}
              // $output .= $post_HTML;
              // $output = convert_smilies($output);
              // echo $output;
          ?> 
            </ul>
          </div>
        </div>
        <div class="rihgt_list">
        <div class="title">
            <h3>最新文章</h3>
            <ul class="list clearfix">
        <?php
                  $args = array(
                      'post_password' => '',
                      'post_status' => 'publish', // 只选公开的文章.
                      'post__not_in' => array($post->ID),//排除当前文章
                      'caller_get_posts' => 1, // 排除置頂文章.
                      'orderby' => 'modified', // 依ID排序.
                      'posts_per_page' => 5 // 设置调用条数
                  );
                  $query_posts = new WP_Query();
                  $query_posts->query($args);
                  while( $query_posts->have_posts() ) { $query_posts->the_post(); ?>
            <li>
                <div class="right_img">
                  <a href="<?php the_permalink(); //链接 ?>" target="_blank">
                <img src="<?php
                    $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail');
                    if($thumbnail_image_url[0]!='') 
                      echo $thumbnail_image_url[0];
                    else 
                      echo "/wp-content/themes/".wp_get_theme( $stylesheet, $theme_root )."/img/404.jpg";
                    ?>" alt="<?php the_title();//标题 ?>">
                    </a>
                </div>
                <div class="right_title">
                  <a href="<?php the_permalink(); //链接 ?>" target="_blank"><?php the_title();?></a>
                  <div class="right_data">
                  <?php the_time('Y年m月d日') ?>
                  </div>
                </div>
              </li>
            <?php } wp_reset_query();?>


            </ul>
          </div>

        </div>
        <div class="rihgt_list">
          <div class="title">
            <h3>随机文章</h3>
            <div class="right_round">
            <?php
            $i=0;
              $args = array(
                  'post_password' => '',
                  'post_status' => 'publish', // 只选公开的文章.
                  'post__not_in' => array($post->ID),//排除当前文章
                  'caller_get_posts' => 1, // 排除置頂文章.
                  'orderby' => 'rand', // 随机排序.
                  'posts_per_page' => 10 // 设置调用条数
              );
              $query_posts = new WP_Query();
              $query_posts->query($args);
              while( $query_posts->have_posts() ) { $query_posts->the_post(); ?>
              
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" style=" overflow: hidden;white-space: nowrap;  text-overflow: ellipsis;  width: 100%;">
          【<?php echo ++$i;?>】 <?php substr(the_title(), 0,10) ; ?></a>

            <?php } wp_reset_query();?>

            </div>
          </div>


        </div>

        <div class="rihgt_list">
          <h3>友情链接</h3>
          <p>友链可以提升搜索引擎友好度，欢迎大家踊跃互添友链！仅限同行业【程序类网站】。有意向的小伙伴可以在网站注册账号给我留言！</p>
          <div class="rihgt_link clearfix">
          <ul class="link_count">
          <?php wp_list_bookmarks('title_li&categorize=0'); ?>

          </ul>
          </div>

        </div>

        <div class="rihgt_list">
        <h3>标签云</h3>
        <?php wp_tag_cloud('smallest=12&largest=18&unit=px&number=0&orderby=count&order=DESC');?>
        </div>

        <div class="rihgt_list" style="display: none">
          <img class="qqgroup" src="<?php bloginfo('template_url'); ?>/img/404.jpg" alt="">

        </div>
      </div>