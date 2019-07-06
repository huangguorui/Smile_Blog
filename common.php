
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="baidu-site-verification" content="cNP7vhhXuw" />
<meta name="Author" content="<?php echo get_bloginfo('description'); ?>" />
<?php if (is_single()){ ?>
<title><?php the_title(); ?>&nbsp;-&nbsp;<?php echo get_bloginfo('description'); ?></title>
<?php } ?>
<meta name="keywords" content="<?php echo get_option('weipxiu_options')['keywords']; ?>" />
<?php if (is_home()){ ?>
<meta name="description" content="<?php echo get_option('weipxiu_options')['description']; ?>" />
<?php }else{?>
<meta name="description" content="<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 190,"..."); ?>" />
<?php }?>

<meta name="format-detection" content="telephone=no"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">

<!-- Force HTTPS mode to open -->
<?php if (get_option('switch_https')['text_pic'] == 'on'){ ?>
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<?php } ?>

