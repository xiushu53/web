<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E2D3 &#8211; Data Visualization for Everyone</title>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<?php wp_head(); ?>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.12';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="wrapper">
    <nav class="top-menu">
        <div class="menu-body" id="menu-body">
            <h1 class="menu-home"><a href="/">E2D3</a></h1>
            <div id="menu-button"><span></span></div>
            <ul class="menu-list">
                <li class="body-item menu-about">
                    <a href="#anchor-about">About E2D3</a>
                    <ul class="menu-inner">
                        <li><a href="<?php echo esc_url( get_home_url() ); ?>/e2d3-project-member/">Team menbers</a></li>
                        <li><a href="<?php echo esc_url( get_home_url() ); ?>/activity-log/">Activity log</a></li>
                        <li><a href="<?php echo esc_url( get_home_url() ); ?>/privacy/">Privacy policy</a></li>
                    </ul>
                </li>
                <li class="body-item menu-product">
                    <a>Use E2D3 on Excel</a>
                    <ul class="menu-inner">
                        <li><a href="<?php echo esc_url( get_home_url() ); ?>/app-install/">How to install</a></li>
                        <li><a href="<?php echo esc_url( get_home_url() ); ?>/howtouse/">Hou to use</a></li>
                    </ul>
                </li>
                <li class="body-item menu-events">
                    <a href="#anchor-event" class="anchor-link">Events</a>
                </li>
                <li class="body-item menu-language">
                    <a href="">English</a>
                </li>
                <li class="body-item menu-github">
                    <a href="https://github.com/e2d3/">Github</a>
                </li>
                <li class="body-item menu-twitter">
                    <a href="https://twitter.com/e2d3org">Twitter</a>
                </li>
                <li class="body-item menu-facebook">
                    <a href="https://www.facebook.com/e2d3project/">Facebook</a>
                </li>
            </ul>
        </div><!-- /.menu-body -->
    </nav><!-- /.main-menu -->
