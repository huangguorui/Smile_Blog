<?php
function themeoptions_admin_menu() {
	// 在控制面板的侧边栏添加设置选项页链接
	add_theme_page('国瑞前端主题全局设置', '国瑞前端主题全局设置','edit_themes', basename(__FILE__), 'themeoptions_page');
}
if ( isset($_POST['update_themeoptions']) && $_POST['update_themeoptions'] == 'true' ) themeoptions_update();
function themeoptions_page() {
  // 获取提交的数据
  $a_options = get_option('huangguorui_options');
  //加载上传图片的js(wp自带)
  wp_enqueue_script('thickbox');
  //加载css(wp自带)
  wp_enqueue_style('thickbox');
?>
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/include/css/set.css">
  <div class="wrap">
    <h2>国瑞前端主题设置</h2>
    <ul class="nav-wrap clearfix">
      <!-- <li class="nav-list on">基本</li> -->
      <!-- <!-- <li class="nav-list">SEO</li> -->
      <!-- <li class="nav-list">图片</li>
      <li class="nav-list">社交</li>  -->
      <!-- <li class="nav-list">自定义代码</li> -->
    </ul>
    <form method="post" action="">
      <input type="hidden" name="update_themeoptions" value="true">
      <!-- 内容一 基本 -->
      <!-- <div class="content-wrap content1">
        <div class="row clearfix">
            <label for="domain" class="fl left-wrap">站点域名：</label>
            <div class="fr right-wrap">
              <input
                placeholder="例如<?php echo home_url(); ?>，结尾不要带/"
                type="text"
                class="url-inp"
                name="domain"
                id="domain"
                value="<?php echo $a_options['domain']; ?>"
              >
          </div>
        </div>

        <div class="row clearfix">
          <label class="fl left-wrap">雪花背景特效：</label>
          <div class="fr right-wrap">
            <label for="snow-flake">开</label>
            <input
              type="radio"
              id="snow-flake"
              name="snow-flake"
              value="on" <?php if($a_options['snowflake'] == 'on') echo 'checked'; ?>
            >
            <label for="aside-count-off">关</label>
            <input
              type="radio"
              id="snow-flake"
              name="snow-flake"
              value="off" <?php if($a_options['snowflake'] == 'off' || $a_options['snowflake'] == '') echo 'checked'; ?>
            >
          </div>
        </div>

        <div class="row clearfix">
          <label class="fl left-wrap">侧边栏站点统计：</label>
          <div class="fr right-wrap">
            <label for="aside-count-on">开</label>
            <input
              type="radio"
              id="aside-count-on"
              name="aside-count"
              value="on" <?php if($a_options['aside_count'] == 'on') echo 'checked'; ?>
            >
            <label for="aside-count-off">关</label>
            <input
              type="radio"
              id="aside-count-off"
              name="aside-count"
              value="off" <?php if($a_options['aside_count'] == 'off' || $a_options['aside_count'] == '') echo 'checked'; ?>
            >
          </div>
        </div>

        <div class="row clearfix">
          <label class="fl left-wrap">首页电子邮件订阅：</label>
          <div class="fr right-wrap">
            <label for="text-pic-on">开</label>
            <input
              type="radio"
              id="text-pic-on"
              name="text-pic"
              value="on" <?php if($a_options['text_pic'] == 'on') echo 'checked'; ?>
            >
            <label for="text-pic-off">关</label>
            <input
              type="radio"
              id="text-pic-off"
              name="text-pic"
              value="off" <?php if($a_options['text_pic'] == 'off' || $a_options['text_pic'] == '') echo 'checked'; ?>
            >
            <span class="warn">*开启之前必须确保已安装WP Easy Post Mailer插件，并已配置好</span>
          </div>
        </div>

        <div class="row clearfix">
          <label class="fl left-wrap">开启https：</label>
          <div class="fr right-wrap">
            <label for="switch-https-on">开</label>
            <input
              type="radio"
              id="tswitch-https-on"
              name="switch_https"
              value="on" <?php if($a_options['switch_https'] == 'on') echo 'checked'; ?>
            >
            <label for="switch-https-off">关</label>
            <input
              type="radio"
              id="switch-https-off"
              name="switch_https"
              value="off" <?php if($a_options['switch_https'] == 'off' || $a_options['switch_https'] == '') echo 'checked'; ?>
            >
            <span class="warn">*开启后所有资源强制以https方式加载，必须确保网站支持https</span>
          </div>
        </div>

        <div class="row clearfix">
          <label for="sidebar-notice" class="fl left-wrap">侧边栏公告：</label>
          <div class="fr right-wrap">
            <textarea id="sidebar-notice" name="sidebar-notice" rows="5" cols="100"><?php echo $a_options['sidebar_notice']; ?></textarea>
          </div>
        </div>

        <div class="row clearfix">
          <label for="footer-copyright" class="fl left-wrap">底部版权信息：</label>
          <div class="fr right-wrap">
            <textarea id="footer-copyright" name="footer-copyright" rows="8" cols="100"><?php echo $a_options['footer_copyright']; ?></textarea>
          </div>
        </div>
      </div> -->
      <!-- 内容二 SEO -->
      <!-- <div class="content-wrap content2">
        <!-- <div class="row clearfix">
          <label for="keywords" class="fl left-wrap">首页关键词(keyword)</label>
          <div class="fr right-wrap">
            <textarea id="keywords" name="keywords" rows="8" cols="100"><?php echo $a_options['keywords'] ?></textarea>
          </div>
        </div>
        <div class="row clearfix">
          <label for="description class=" fl left-wrap"">首页描述(describe)</label>
          <div class="fr right-wrap">
            <textarea id="description" name="description" rows="8" cols="100"><?php echo $a_options['description'] ?></textarea>
          </div>
        </div> -->

        <!-- <div class="row clearfix">
          <label for="slider_index_text class=" fl left-wrap"">右侧描述(slider)</label>
          <div class="fr right-wrap">
            <textarea id="slider_index_text" name="slider_index_text" rows="8" cols="100"><?php echo $a_options['slider_index_text'] ?></textarea>
          </div>
        </div>
        <div class="row clearfix">
          <label for="footer-copyright" class="fl left-wrap">底部版权信息：</label>
          <div class="fr right-wrap">
            <textarea id="footer-copyright" name="footer-copyright" rows="8" cols="100"><?php echo $a_options['footer_copyright']; ?></textarea>
          </div>
        </div> -->

        <div class="row clearfix">
          <label for="index_url" class="fl left-wrap">seo优化-url：</label>
          <div class="fr right-wrap">
            <textarea id="index_url" name="index_url" rows="8" cols="100"><?php echo $a_options['index_url']; ?></textarea>
          </div>
        </div>

        <div class="row clearfix">
          <label for="index_title" class="fl left-wrap">seo优化-title：</label>
          <div class="fr right-wrap">
            <textarea id="index_title" name="index_title" rows="8" cols="100"><?php echo $a_options['index_title']; ?></textarea>
          </div>
        </div>

        <div class="row clearfix">
          <label for="index_desc" class="fl left-wrap">seo-优化描述：</label>
          <div class="fr right-wrap">
            <textarea id="index_desc" name="index_desc" rows="8" cols="100"><?php echo $a_options['index_desc']; ?></textarea>
          </div>
        </div>

        <div class="row clearfix">
          <label for="index_keys" class="fl left-wrap">seo-优化描述关键字：</label>
          <div class="fr right-wrap">
            <textarea id="index_keys" name="index_keys" rows="8" cols="100"><?php echo $a_options['index_keys']; ?></textarea>
          </div>
        </div>

      </div>
        
      <!-- <div class="content-wrap content2">
        <div class="row clearfix">
          <label for="keywords" class="fl left-wrap">右侧栏目最上方文字描述：</label>
          <div class="fr right-wrap">
            <textarea id="keywords" name="keywords" rows="8" cols="100"><?php //echo $a_options['slider-index-text'] ?></textarea>
          </div>
        </div> -->

			<!-- 内容三 图片设置 -->
      <!-- <div class="content-wrap content3">
        <div class="row">
          <div class="margin-top-15 clearfix">
            <label class="fl left-wrap" for="">前台Logo：</label>
            <div class="fr right-wrap">
              <input
                type="text"
                class="url-inp"
                name="logo"
                id="logo"
                value="<?php echo $a_options['logo']; ?>"
              >
              <input type="button" name="img-upload" value="选择文件">
            </div>
          </div>
          <div class="margin-top-15 clearfix">
            <div class="fl left-wrap">
              前台Logo预览：
            </div>
            <div class="fr right-wrap">
              <img src="<?php echo $a_options['logo']; ?>" class="preview-img" style="max-width: 100px;" alt="">
              <span class="warn" style="display:block">*前台Logo最佳尺寸135*45（如若感觉不够清晰，可使用2倍尺寸图片，即270*90）</span>
            </div>
          </div>
        </div>

				<div class="row">
          <div class="margin-top-15 clearfix">
            <label class="fl left-wrap" for="">浏览器标签Logo：</label>
            <div class="fr right-wrap">
              <input
                type="text"
                class="url-inp"
                name="label-logo"
                id="label-logo"
                value="<?php echo $a_options['label_logo']; ?>"
              >
              <input type="button" name="img-upload" value="选择文件">
            </div>
          </div>
          <div class="margin-top-15 clearfix">
            <div class="fl left-wrap">
              标签图标预览：
            </div>
            <div class="fr right-wrap">
              <img src="<?php echo $a_options['label_logo']; ?>" class="preview-img" style="max-width: 100px;" alt="">
              <span class="warn" style="display:block">*浏览器标签窗口图标，最佳尺寸16*16或32*32</span>
            </div>
          </div>
        </div>

				<div class="row">
          <div class="margin-top-15 clearfix">
						<label class="fl left-wrap" for="">默认缩略图：</label>
            <div class="fr right-wrap">
              <input
                type="text"
                class="url-inp"
								name="thumbnail-img"
                id="thumbnail-img"
                value="<?php echo $a_options['thumbnail']; ?>">
              <input type="button" name="img-upload" value="选择文件">
            </div>
          </div>
          <div class="margin-top-15 clearfix">
            <div class="fl left-wrap">
              默认缩略图预览：
            </div>
            <div class="fr right-wrap">
              <img src="<?php echo $a_options['thumbnail']; ?>" class="preview-img" style="max-width: 100px;" alt="">
              <span class="warn" style="display:block">*默认信息流缩略图最佳尺寸220*140，展示规则：先取文章中设置的特色图片，如果没有，取文章内容首张图片，再没有将启用当前默认缩略图</span>
            </div>
          </div>
        </div>

        <div class="row" style="display:none">
          <div class="margin-top-15 clearfix">
            <label class="fl left-wrap" for="">banner大图：</label>
            <div class="fr right-wrap">
              <input
                type="text"
                class="url-inp"
                name="big-banner"
                id="big-banner"
                value="<?php echo $a_options['banner']['big_banner']['path']; ?>"
              >
              <input type="button" name="img-upload" value="选择文件">
            </div>
          </div>
          <div class="margin-top-15 clearfix">
            <label class="fl left-wrap" for="">banner标题：</label>
            <div class="fr right-wrap">
              <input
                type="text"
                class="url-inp"
                name="big-banner-text"
                id="big-banner-text"
                value="<?php echo $a_options['banner']['big_banner']['text']; ?>"
              >
            </div>
          </div>
          <div class="margin-top-15 clearfix">
            <label class="fl left-wrap" for="">banner链接：</label>
            <div class="fr right-wrap">
              <input
                type="text"
                class="url-inp"
                name="big-banner-link"
                id="big-banner-link"
                value="<?php echo $a_options['banner']['big_banner']['link']; ?>"
              >
            </div>
          </div>
          <div class="margin-top-15 clearfix">
            <div class="fl left-wrap">
              banner大图预览：
            </div>
            <div class="fr right-wrap">
              <img src="<?php echo $a_options['banner']['big_banner']['path']; ?>" class="preview-img" style="max-width: 400px; max-height: 200px;" alt="">
            </div>
          </div>
        </div>
				<?php
					for ($i = 1; $i < 4; $i++) {
				?>
					<div class="row" style="display:none">
	          <div class="margin-top-15 clearfix">
	            <label class="fl left-wrap" for="">banner<?php echo $i; ?>：</label>
	            <div class="fr right-wrap">
	              <input
	                type="text"
	                class="url-inp"
	                name="small-banner-<?php echo $i; ?>"
	                id="small-banner-<?php echo $i; ?>"
	                value="<?php echo $a_options['banner']['small_banner']['banner'. $i]['path']; ?>"
	              >
	              <input type="button" name="img-upload" value="选择文件">
	            </div>
	          </div>
	          <div class="margin-top-15 clearfix">
	            <label class="fl left-wrap" for="">banner<?php echo $i; ?>标题：</label>
	            <div class="fr right-wrap">
	              <input
	                type="text"
	                class="url-inp"
	                name="small-banner-text-<?php echo $i; ?>"
	                id="small-banner-text-<?php echo $i; ?>"
	                value="<?php echo $a_options['banner']['small_banner']['banner'. $i]['text']; ?>"
	              >
	            </div>
	          </div>
	          <div class="margin-top-15 clearfix">
	            <label class="fl left-wrap" for="">banner<?php echo $i; ?>链接：</label>
	            <div class="fr right-wrap">
	              <input
	                type="text"
	                class="url-inp"
	                name="small-banner-link-<?php echo $i; ?>"
	                id="small-banner-link-<?php echo $i; ?>"
	                value="<?php echo $a_options['banner']['small_banner']['banner'. $i]['link']; ?>"
	              >
	            </div>
	          </div>
	          <div class="margin-top-15 clearfix">
	            <div class="fl left-wrap">
	              banner<?php echo $i; ?>大图预览：
	            </div>
	            <div class="fr right-wrap">
	              <img src="<?php echo $a_options['banner']['small_banner']['banner'. $i]['path']; ?>" class="preview-img" style="max-width: 400px; max-height: 200px;" alt="">
	            </div>
	          </div>
	        </div>
				<?php
					}
				?>

      </div> -->
      <!-- 内容四 社交 -->
      <!-- <div class="content-wrap content4">
        <div class="row clearfix">
          <label for="QQ-number" class="fl left-wrap">QQ账号：</label>
          <div class="fr right-wrap">
						<input
							type="text"
							class="url-inp"
							name="QQ-number"
							id="QQ-number"
							value="<?php echo $a_options['QQ-number']; ?>"
						>
          </div>
        </div>

        <div class="row clearfix">
          <label for="phone-number" class="fl left-wrap">手机号码：</label>
          <div class="fr right-wrap">
						<input
							type="text"
							class="url-inp"
							name="phone-number"
							id="phone-number"
							value="<?php echo $a_options['phone-number']; ?>"
						>
          </div>
        </div>

        <div class="row">
          <div class="margin-top-15 clearfix">
            <label class="fl left-wrap" for="">微信账号二维码：</label>
            <div class="fr right-wrap">
              <input
                type="text"
                class="url-inp"
                name="weChat-number"
                id="weChat-number"
                value="<?php echo $a_options['weChat-number']; ?>"
              >
              <input type="button" name="img-upload" value="选择文件">
            </div>
          </div>
          <div class="margin-top-15 clearfix">
            <div class="fl left-wrap">
              微信二维码预览：
            </div>
            <div class="fr right-wrap">
              <img src="<?php echo $a_options['weChat-number']; ?>" class="preview-img" style="max-width: 100px;" alt="">
            </div>
          </div>
        </div>

				<div class="row clearfix">
          <label for="reward-text" class="fl left-wrap">打赏欢迎语：</label>
          <div class="fr right-wrap">
						<input
							type="text"
							class="url-inp"
							name="reward-text"
							id="reward-text"
							value="<?php echo $a_options['reward_text']; ?>"
						>
          </div>
        </div>

				<div class="row">
          <div class="margin-top-15 clearfix">
            <label class="fl left-wrap" for="">支付宝收账二维码：</label>
            <div class="fr right-wrap">
              <input
                type="text"
                class="url-inp"
                name="alipay"
                id="alipay"
                value="<?php echo $a_options['alipay']; ?>"
              >
              <input type="button" name="img-upload" value="选择文件">
            </div>
          </div>
          <div class="margin-top-15 clearfix">
            <div class="fl left-wrap">
              收账二维码预览：
            </div>
            <div class="fr right-wrap">
              <img src="<?php echo $a_options['alipay']; ?>" class="preview-img" style="max-width: 100px;" alt="">
            </div>
          </div>
        </div>

				<!-- 微信付款二维码 -->
				<!-- <div class="row"> -->
					<!-- 支付宝付款二维码 -->
          <!-- <div class="margin-top-15 clearfix">
            <label class="fl left-wrap" for="">微信收账二维码：</label>
            <div class="fr right-wrap">
              <input
                type="text"
                class="url-inp"
                name="wechatpay"
                id="wechatpay"
                value="<?php echo $a_options['wechatpay']; ?>"
              >
              <input type="button" name="img-upload" value="选择文件">
            </div>
          </div>
          <div class="margin-top-15 clearfix">
            <div class="fl left-wrap">
              收账二维码预览：
            </div>
            <div class="fr right-wrap">
              <img src="<?php echo $a_options['wechatpay']; ?>" class="preview-img" style="max-width: 100px;" alt="">
            </div>
          </div> -->
        <!-- </div> -->

        <!-- <div class="row clearfix">
          <label class="fl left-wrap" for="link">友情链接：</label>
          <div class="fr right-wrap">
            <textarea id="link" name="link" rows="15" cols="100"><?php echo $a_options['link']; ?></textarea>
            <span class="warn" style="display:block">*每条链接占一行</span>
          </div>
        </div> -->
      <!-- </div>  -->
      <!-- 内容五 自定义代码 -->
      <!-- <div class="content-wrap content5">
        <div class="row clearfix">
          <label class="fl left-wrap" for="login-css">后台登录页面css（不需要style标签）：</label>
          <div class="fr right-wrap">
            <textarea id="login-css" name="login-css" rows="8" cols="100"><?php echo $a_options['login_css']; ?></textarea>
          </div>
        </div>
				<div class="row clearfix">
          <label class="fl left-wrap" for="details-css">文章详情页css（不需要style标签）：</label>
          <div class="fr right-wrap">
            <textarea id="details-css" name="details-css" rows="8" cols="100"><?php echo $a_options['details_css']; ?></textarea>
          </div>
        </div>
      </div> -->
      <div class="row btn-wrap">
        <input type="submit" class="submit-btn" name="bcn-admin-options" value="保存更改">
      </div>
    </form>
  </div>
  <script src="<?php bloginfo('template_url'); ?>/include/js/set.js"></script>
<?php
	}
	function themeoptions_update() {
		// 数据提交
    $options = array(
      'slider_index_text'=>$_POST['slider_index_text'],  //顶部自我介绍
      'index_url'=>$_POST['index_url'],
      'index_title'=>$_POST['index_title'],
      'index_desc'=>$_POST['index_desc'],
      'index_keys'=>$_POST['index_keys'],
      'update_themeoptions' => 'true',
      'label_logo' => $_POST['label-logo'],
      'snowflake' => $_POST['snow-flake'],
      'aside_count' => $_POST['aside-count'],
      'switch_https' => $_POST['switch_https'],
      'text_pic' => $_POST['text-pic'],
      'logo' => $_POST['logo'],
      'thumbnail' => $_POST['thumbnail-img'],
      'domain' => $_POST['domain'],
      'sidebar_notice' => $_POST['sidebar-notice'],
      'footer_copyright' => $_POST['footer-copyright'],
      'login_css'  => $_POST['login-css'],
      'details_css'  => $_POST['details-css'],
      'keywords' => $_POST['keywords'],
      'description' => $_POST['description'],
      'link' => $_POST['link'],
      'QQ-number' => $_POST['QQ-number'],
      'weChat-number' => $_POST['weChat-number'],
      'phone-number' => $_POST['phone-number'],
      'reward_text' => $_POST['reward-text'],
      'alipay' => $_POST['alipay'],
      'wechatpay' => $_POST['wechatpay'],
			'banner' => array(
				'big_banner' => array(
					'path' => $_POST['big-banner'],
					'text' => $_POST['big-banner-text'],
					'link' => $_POST['big-banner-link'],
				),
				'small_banner' => array(
					'banner1' => array(
						'path' => $_POST['small-banner-1'],
						'text' => $_POST['small-banner-text-1'],
						'link' => $_POST['small-banner-link-1'],
					),
					'banner2' => array(
						'path' => $_POST['small-banner-2'],
						'text' => $_POST['small-banner-text-2'],
						'link' => $_POST['small-banner-link-2'],
					),
					'banner3' => array(
						'path' => $_POST['small-banner-3'],
						'text' => $_POST['small-banner-text-3'],
						'link' => $_POST['small-banner-link-3'],
					)
				)
			)
    );
    update_option('huangguorui_options', stripslashes_deep($options));
	}
	add_action('admin_menu', 'themeoptions_admin_menu');
?>
