<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E2D3 &#8211; Data Visualization for Everyone</title>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script src="./lib/jquery-3.3.1.min.js"></script>
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
                <li class="body-item menu-product">
                    <a>Use E2D3 on Excel</a>
                    <ul class="menu-inner">
                        <li><a href="">インストール方法</a></li>
                        <li><a href="">使い方</a></li>
                    </ul>
                </li>
                <li class="body-item menu-events">
                    <a href="#anchor-event" class="anchor-link">Events</a>
                </li>
                <li class="body-item menu-about">
                    <a href="#">About E2D3</a>
                    <ul class="menu-inner">
                        <li><a href="">チームメンバー</a></li>
                        <li><a href="">活動履歴</a></li>
                        <li><a href="">プライバシーポリシー</a></li>
                    </ul>
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
