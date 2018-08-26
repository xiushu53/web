<?php

// サイドバーを有効に
add_action( 'widgets_init', 'e2d3_register_widget');
// 追加のCSSやJSなど
add_action('wp_enqueue_scripts', 'add_e2d3_style');
// 検索結果に、カスタム投稿を出さないように
add_filter( 'pre_get_posts', 'search_exclude_custom_post_type' );
// 検索結果を新しい順にする
add_filter('posts_search_orderby', 'custom_posts_search_orderby');
// アーカイブページで「もっと読む」にあたる部分
add_filter('excerpt_more', 'new_excerpt_more');
// サムネイルを250＊250で作る
add_theme_support( 'post-thumbnails' );
add_image_size( 'e2d3-post-thumbnail', 250, 250, true );

function e2d3_register_widget() {

		register_sidebar(
			array(
				'name'          => '子ページ用サイドMENU',
				'id'            => 'e2d3_child_page_sidebar',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h2 class="widget-title">',
				'after_title' => '</h2>',
			)
		);

}

function add_e2d3_style(){
  // 子ページだったら
  if(!is_front_page() && !is_home()){
    wp_enqueue_style(
      'e2d3_widget_style',
      get_stylesheet_directory_uri().'/style-child.css',
      false,
      null
    );
  }

}

function search_exclude_custom_post_type( $query ) {
	if ( $query->is_search() && $query->is_main_query() && ! is_admin() ) {
		$query->set( 'post_type', array( 'post', 'page' ) );
	}
}

function new_excerpt_more($more) {
	return '&hellip;';
}

function custom_posts_search_orderby() {
    return ' post_date desc ';
}

// トップページの「News」
function show_news(){

	$qNews = new WP_Query(array(
		'category_name'=>'News',
		'post_status'=>'publish',
		'orderby'=>'date',
		'order'=>'DESC',
		'posts_per_page'=>'2'
	));

	if($qNews->have_posts()):
		?>
		<dl>
			<dt>News</dt>
		<?php while($qNews->have_posts()):$qNews->the_post(); ?>
			<dd><a href="<?php the_permalink(); ?>"><?php
			echo get_post_time('Y/m/d').'　';
			the_title();
			 ?></a></dd>
		<?php endwhile; ?>
		</dl>
	<?php else: ?>
		<!-- Newsが無かった場合 -->

	<?php
				endif;
	wp_reset_postdata();
}

?>
