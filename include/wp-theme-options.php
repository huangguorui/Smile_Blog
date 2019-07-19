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

  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/include/css/bootstrap.css">
  <script src="<?php bloginfo('template_url'); ?>/js/jquery-2.1.4.min.js"></script>

  <div class="wrap" style="display:none">
    <h2>国瑞前端主题设置</h2>
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
        

      <!DOCTYPE html>
<html lang="en">

<head>
    <style>
      /* Document scrollbar */
::-webkit-scrollbar {
  background: #ccc;
  width: 8px;
}
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
  border-radius: 10px;
}
::-webkit-scrollbar-thumb {
  border-radius: 10px;
  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
}
/* Scrollable element */
::selection {
  background: aquamarine;
  color: black;
}
.custom-text-selection::selection {
  background: deeppink;
  color: white;
}
        .box {
            width: 60%;
            min-height: 500px;
            background: #ccc;
            padding: 20px;
            box-sizing: border-box;
        }

        .tab {
            width: 100%;
            height: auto;
            padding-top: 10px;
            box-sizing: border-box;
            display: none;
        }

        .hots {
            background: #f1f1f1;
            min-height: 30px;
            margin-top: 20px;
            line-height: 30px;
            text-indent: 2em;
            padding: 10px;
            border-radius: 5px;
            box-sizing: border-box;

        }

        .tab:nth-child(1) {
            display: block;

        }

        .curbtn {
            background-color: #337ab7 !important;
            border-color: #2e6da4 !important;
            color: #fff !important;
        }
        .container-main {
          width:100%;
          margin-top:15px;
          background:#ccc;

        }
        textarea {
          font-size:13px!important;
        }
    </style>
</head>

<body>
    <div class="container-main">
        <div class="box">
            <input class="btn btn-default curbtn" type="button" value="SEO优化设置">
            <input class="btn btn-default " type="button" value="基本设置">
            <input class="btn btn-default " type="button" value="图片显示设置">
            <input class="btn btn-default " type="submit" value="联系方式设置">

            <div class="hots">
            </div>

            <form action="" method="post">
            <input type="hidden" name="update_themeoptions" value="true">
                <div class="tab">
                <div class="form-group">
                        <label for="title_right">全站连接符：</label>
                        <input class="form-control" rows="7" name="title_right" id="index_url" placeholder="连接符一旦设定，就勿轻易修改，会影响SEO效果，请谨慎更改！" value="<?php echo $a_options['title_right']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="index_url">请设置路径：</label>
                        <textarea class="form-control" rows="7" name="index_url" id="index_url" placeholder="请设置路径："><?php echo $a_options['index_url']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="index_title">请设置标题：</label>
                        <textarea class="form-control" rows="7" id="index_title" name="index_title" placeholder="请设置标题："><?php echo $a_options['index_title']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="index_keys">请设置关键词：</label>
                        <textarea class="form-control" rows="7" id="index_keys"  name="index_keys" placeholder="请设置关键词："><?php echo $a_options['index_keys']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="index_desc">请设置描述：</label>
                        <textarea class="form-control" rows="7" id="index_desc" name="index_desc" placeholder="请设置描述："><?php echo $a_options['index_desc']; ?></textarea>
                    </div>
                </div>
                <div class="tab">
                    <div class="form-group">
                        <label for="index_url">网站底部简介：</label>
                        <textarea class="form-control" rows="4" id="index_url" name="footer_copyright" placeholder="网站底部简介：可以写版权，备案号一类的东西"><?php echo $a_options['footer_copyright']; ?></textarea>
                    </div>
                    <h3>侧边栏目【slider】配置</h3>
                    <div class="form-group">
                        <label for="index_url">网站全局介绍：</label>
                        <textarea class="form-control" rows="4" id="index_url"  name="slider_top" placeholder="网站全局介绍："><?php echo $a_options['slider_top']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="index_url">友情链接简介：</label>
                        <textarea class="form-control" rows="4" id="index_url" name="link_desc" placeholder="友情链接简介："><?php echo $a_options['link_desc']; ?></textarea>
                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio" name="is_text" value="0"  <?php echo !$a_options['is_text']?'checked':''; ?> >关闭
                        </label>
                        <label>
                            <input type="radio" name="is_text" value="1"<?php echo $a_options['is_text']?'checked':''; ?> >开启
                        </label>
                        <span>【默认关闭】评论栏栏目设置</span>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="is_link" value="0"  <?php echo !$a_options['is_link']?'checked':''; ?>>关闭
                        </label>
                        <label>
                            <input type="radio" name="is_link" value="1"  <?php echo $a_options['is_link']?'checked':''; ?>>开启
                        </label>
                        <span>【默认关闭】友情链接栏目设置</span>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="is_round_list" value="0"  <?php echo !$a_options['is_round_list']?'checked':''; ?>>关闭
                        </label>
                        <label>
                            <input type="radio" name="is_round_list" value="1"  <?php echo $a_options['is_round_list']?'checked':''; ?>>开启
                        </label>
                        <span>【默认关闭】随机文章栏目设置</span>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="is_tag" value="0"  <?php echo !$a_options['is_tag']?'checked':''; ?>>关闭
                        </label>
                        <label>
                            <input type="radio" name="is_tag" value="1"  <?php echo $a_options['is_tag']?'checked':''; ?>>开启
                        </label>
                        <span>【默认关闭】标签云栏目设置</span>
                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio" name="is_new_list" value="0" <?php echo !$a_options['is_new_list']?'checked':''; ?>>关闭
                        </label>
                        <label>
                            <input type="radio" name="is_new_list" value="1" <?php echo $a_options['is_new_list']?'checked':''; ?>>开启
                        </label>
                        <span>【默认关闭】最新文章栏目设置</span>
                    </div>
                </div>
                <div class="tab">
                    <div class="form-group">
                        <label for="index_url">请设置路径：</label>
                        <textarea class="form-control" rows="6" id="index_url" placeholder="请设置路径："></textarea>
                    </div>
                </div>
                <div class="tab">
                    <div class="form-group">
                        <label for="qq">QQ号：</label>
                        <input class="form-control"  name="qq" id="qq" placeholder="请设置QQ：" value="<?php echo $a_options['qq']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="wechat">微信：</label>
                        <input class="form-control"  name="wechat" id="wechat" placeholder="请设置微信："value="<?php echo $a_options['wechat']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">电话号码：</label>
                        <input class="form-control"  name="phone" id="phone" placeholder="请设置手机号码："value="<?php echo $a_options['phone']; ?>">
                    </div>
                </div>
                <input class="btn btn-primary" type="submit" value="点击保存">

            </form>
        </div>
    </div>

</body>

</html>
<script>

// let demoText =  `示例如下：<br >
//           若当前的url为https://www.huangguorui.cn/web/<br >
//           那么路径就为: /web/<br >
//           描述就为：web前端开发，期待你的加入！<br >
//           关键词就为：web，前端开发<br >
//           这里值得注意的是，末尾一定要使用英文逗号间隔，并且每一条记录都需要换行，便于编辑<br >`;

    let hots = [{
        text: 'SEO优化设置：每一个Url对应一个标题，一串关键词，一段描述，结尾均已英文状态下的逗号结尾，且每一条记录都需要换一行'
     
    }, {
        text: '基本设置：主要可以设置侧边栏目各种个性化显示，自定义文字等，功能持续开发中……'
    }, {
        text: '图片显示设置：主要用来上传用户Logo，以及一些需要显示图片的地方，待完成'
    }, {
        text: '联系方式设置：主要用来设置网站上你的联系方式'
    }];

    var store = {
        save(key, value) {
            localStorage.setItem(key, JSON.stringify(value));
        },
        fetch(key) {
            return JSON.parse(localStorage.getItem(key)) || [];
        }
    }
    //初始化
    $('.hots').html(hots[0].text)
    


    //先判断有没有，在进行赋值
    if (store.fetch('curindex') != '') {
        let val = store.fetch('curindex')
        tabs(val)
    } else {
        console.log('没有值默认就显示第一个')
        $('.tab').eq(0).css('display', 'block');
    }


    $('.box>input').each(function (index) {
        console.log('index=', index)
        $('.btn').eq(index).click(function () {
            tabs(index)
            //保存数据
            store.save('curindex',
                index
            )
        })
    })

    //定义切换函数

    function tabs(i) {
        $('.box >input').removeClass('curbtn')
        $('.box >input').eq(i).addClass('curbtn')
        $('.tab').css('display', 'none');
        $('.tab').eq(i).css('display', 'block');
        $('.hots').html(hots[i].text)
    }
</script>


<?php
	}
	function themeoptions_update() {
		// 数据提交
    $options = array(
      
      'title_right'=>$_POST['title_right'],  //全站连接符

      'slider_index_text'=>$_POST['slider_index_text'],  //顶部自我介绍
      'index_url'=>$_POST['index_url'],//路径设置
      'index_title'=>$_POST['index_title'],//标题设置
      'index_desc'=>$_POST['index_desc'],//内容设置
      'index_keys'=>$_POST['index_keys'],//关键词设置
      'is_text'=>$_POST['is_text'], //评论框是否可以显示
      'is_new_list'=>$_POST['is_new_list'], //最新文章列表是否可以显示
      'is_tag'=>$_POST['is_tag'], //标签云是否可以显示
      'is_round_list'=>$_POST['is_round_list'], //随机文章是否可以显示
      'is_link'=>$_POST['is_link'], //友情链接是否可以显示
      'link_desc'=>$_POST['link_desc'], //链接描述
      'footer_copyright'=>$_POST['footer_copyright'], //底部描述
      'slider_top'=>$_POST['slider_top'], //首页描述
      'qq'=>$_POST['qq'], //首页qq联系方式
      'wechat'=>$_POST['wechat'], //首页微信联系方式
      'phone'=>$_POST['phone'], //首页联系电话

    );
    update_option('huangguorui_options', stripslashes_deep($options));
	}
	add_action('admin_menu', 'themeoptions_admin_menu');
?>
