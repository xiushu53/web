<?php

/** Include scripts  test 2018.06.13  Hideki Nakane*/
function e2d3_scripts() {

    if (is_home() || is_page('test') || is_page('animal_olympic')) {
        wp_enqueue_script('d3v4', 'https://d3js.org/d3.v4.min.js', array(), false);
        wp_enqueue_script('globehandler', get_theme_file_uri('scripts/globeHandler.js'), array(), false);
        wp_enqueue_script('topjson', 'https://d3js.org/topojson.v1.min.js', array('d3v4'), false);
        wp_enqueue_script('dotbarchart', get_theme_file_uri('scripts/dotbarchart.js'), array('d3v4'), '20180722', true);
        wp_enqueue_script('jquery');
    }
}

add_action('wp_enqueue_scripts', 'e2d3_scripts');

/** Get the access data from Google Reporting API 2018.06.13 Hideki Nakane*/
function get_access_data() {
    // Load the Google API PHP Client Library.
    require_once __DIR__ . '/google-api-php-client-2.2.1/vendor/autoload.php';

    function initializeAnalytics() {

        // Secret key
        $key = get_option('my_google_auth');
        $KEY_FILE_LOCATION = parse_my_google_auth($key);

        // Create and configure a new client object.
        $client = new Google_Client();
        $client->setApplicationName("Hello Analytics Reporting");
        $client->setAuthConfig($KEY_FILE_LOCATION);
        $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
        $analytics = new Google_Service_AnalyticsReporting($client);

        return $analytics;
    }

    function getReport($analytics) {

        $VIEW_ID = "104580083";

        // Create the DateRange object.
        $dateRange = new Google_Service_AnalyticsReporting_DateRange();
        $dateRange->setStartDate("30daysAgo");
        $dateRange->setEndDate("today");

        // Create the Metrics object.
        $sessions = new Google_Service_AnalyticsReporting_Metric();
        $sessions->setExpression("ga:sessions");
        $sessions->setAlias("sessions");

        // Create the Dimension object.
        $dimention = new Google_Service_AnalyticsReporting_Dimension();
        $dimention->setName("ga:latitude");
        $dimention2 = new Google_Service_AnalyticsReporting_Dimension();
        $dimention2->setName("ga:longitude");

        // Create the ReportRequest object.
        $request = new Google_Service_AnalyticsReporting_ReportRequest();
        $request->setViewId($VIEW_ID);
        $request->setDateRanges($dateRange);
        $request->setMetrics(array($sessions));
        $request->setDimensions(array($dimention, $dimention2));

        $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
        $body->setReportRequests(array($request));
        return $analytics->reports->batchGet($body);
    }

    function printResults($reports) {
        $dim_array = [];

        for ($reportIndex = 0; $reportIndex < count($reports); $reportIndex++) {
            $report = $reports[$reportIndex];
            $rows = $report->getData()->getRows();

            for ($rowIndex = 0; $rowIndex < count($rows); $rowIndex++) {
                $row = $rows[$rowIndex];
                $dimensions = $row->getDimensions();

                $dim_array[] = $dimensions;
            }
        }
        return $dim_array;
    }

    $analytics = initializeAnalytics();
    $response = getReport($analytics);
    $dim_array = printResults($response);

    $json_dim_array = json_encode($dim_array);

    return $json_dim_array;

}

add_action('get_access_google_data', 'get_access_data');

add_action('admin_menu', function () {
    add_options_page('Google API 認証情報設定', 'Google API 認証情報設定', 'manage_options', '', 'google_auth_set_page');
});

function google_auth_set_page() {
    ?>
		<div id="google_api_set_box">
		<h1>Google API 認証情報設定</h1>
	<?php
$options = get_option('my_google_auth');

    $defaults = array('auth_json' => '');
    $options = wp_parse_args($options, $defaults);
    $auth_json = $options['auth_json'];

    if (isset($_POST['my_google_auth_nonce'])) {
        check_admin_referer('my_google_auth_action', 'my_google_auth_nonce');
        if (isset($_POST['auth_json']) && is_string($_POST['auth_json'])) {

            $auth_json = $_POST['auth_json'];

            update_option('my_google_auth', array('auth_json' => $auth_json));

        }
    }
    ?>

		<form action="" method="post">
			<?php wp_nonce_field('my_google_auth_action', 'my_google_auth_nonce');?>
			<table class="form-table">
				<tr>
					<th>JSONのパス</th>
					<td><input type="text" name="auth_json" value="<?php echo $auth_json; ?>" class="regular-text code"></td>
				</tr>
			</table>
			<?php submit_button();?>
		</form>
	</div>
	<?php
}
function parse_my_google_auth($opt) {

    $auth_json = $opt["auth_json"];

    $name = preg_replace_callback('/<([^>]*)>/i', function ($matches) {
        $vars = get_defined_constants();
        $ret = $vars[$matches[1]];
        return $ret;
    }, $auth_json);

    return $name;
}

/** ↑↑for Globe↑↑ **/

/** ↓↓for ChildPage↓↓ **/

// サイドバーを有効に
add_action('widgets_init', 'e2d3_register_widget');
// 追加のCSSやJSなど
add_action('wp_enqueue_scripts', 'add_e2d3_style');
// 検索結果に、カスタム投稿を出さないように
add_filter('pre_get_posts', 'search_exclude_custom_post_type');
// 検索結果を新しい順にする
add_filter('posts_search_orderby', 'custom_posts_search_orderby');
// アーカイブページで「もっと読む」にあたる部分
add_filter('excerpt_more', 'new_excerpt_more');
// サムネイルを250＊250で作る
add_theme_support('post-thumbnails');
add_image_size('e2d3-post-thumbnail', 250, 250, true);

function e2d3_register_widget() {

    register_sidebar(
        array(
            'name' => '子ページ用サイドMENU',
            'id' => 'e2d3_child_page_sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

function add_e2d3_style() {
    // 子ページだったら
    if (!is_front_page() && !is_home()) {
        wp_enqueue_style(
            'e2d3_widget_style',
            get_stylesheet_directory_uri() . '/style-child.css',
            false,
            null
        );
    }
}

function search_exclude_custom_post_type($query) {
    if ($query->is_search() && $query->is_main_query() && !is_admin()) {
        $query->set('post_type', array('post', 'page'));
    }
}

function new_excerpt_more($more) {
    return '&hellip;';
}

function custom_posts_search_orderby() {
    return ' post_date desc ';
}

// トップページの「News」
function show_news() {

    $qNews = new WP_Query(array(
        'category_name' => 'News',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => '2',
    ));

    if ($qNews->have_posts()):
    ?>
		<dl>
			<dt>News</dt>
		<?php while ($qNews->have_posts()): $qNews->the_post();?>
							<dd><a href="<?php the_permalink();?>"><?php
    echo get_post_time('Y/m/d') . '　';
        the_title();
        ?></a></dd>
						<?php endwhile;?>
		</dl>
	<?php else: ?>
		<!-- Newsが無かった場合 -->

	<?php
endif;
    wp_reset_postdata();
}

// 過去のイベント最新３件＆一覧へのリンク
function show_past_event(){

  $pastEv = new WP_Query(array(
    'category_name'=>'News',
    'post_status'=>'publish',
    'orderby'=>'date',
    'order'=>'DESC',
    'posts_per_page'=>'3'
  ));
  $pastEvID = $pastEv->get_queried_object_id();
  
  if($pastEv->have_posts()):
    ?>
    <ul class="eventInfo-past" style="font-size:0;">
    <?php 
    while($pastEv->have_posts()):$pastEv->the_post(); ?>
    <li>
    
      <a href="<?php the_permalink(); ?>" style="background-image:url('<?php the_post_thumbnail_url(); ?>')">
      <dl class="eventInfo-description">
          <dd class="desc-date"><?php echo get_post_time('Y/m/d'); ?></dd>
          <dt class="desc-eventTitle"><?php the_title(); ?></dt>
      </dl>
      </a>
    </li>
    <?php 
    endwhile;
    ?>
    </ul>
    <p class="buttonLink">
      <a href="<?php echo esc_url(get_category_link($pastEvID)); ?>">過去のイベント一覧</a>
    </p>
  <?php
  endif;   

  wp_reset_postdata();
  
}

/* ↑↑for ChildPage↑↑ */

?>
