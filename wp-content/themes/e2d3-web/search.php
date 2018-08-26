<?php get_header(); ?>

    <main class="main e2d3_archive<?php echo (!is_front_page() && !is_home())?" e2d3_child":""; ?>">
<!-- アーカイブ -->
      <section class="module e2d3-page-content">
        <div class="module-inner">

          <?php if ( have_posts() ) { ?>

            <header class="page-header">

							<h1 class="page-title">
                <span><?php
                if ( ! is_search() ) {

                  if(is_month()){
                    echo '月別: '.get_query_var('year').'年'.get_query_var('monthnum').'月';
                  }else{
                    echo 'カテゴリー: ';
                    single_cat_title();
                  }
                } else {
                  echo '検索結果: '.get_search_query();
                }


                  ?></span>
							</h1>

						</header><!-- .page-header -->

          <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <article <?php post_class("entry"); ?>>

              <?php
              // サムネ
              $post_thumbnail_url = get_the_post_thumbnail( get_the_ID(), 'e2d3-post-thumbnail' );

          		if ( ! empty( $post_thumbnail_url ) ) {

          			echo '<div class="post-img-wrap">';

                $image_id = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src($image_id, true);

          			echo '<a href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute( 'echo=0' ) . '">';


                  echo $post_thumbnail_url;

          				echo '</a>';

          			echo '</div>';

          			echo '<div class="listpost-content-wrap">';
          		} else {

          			echo '<div class="listpost-content-wrap-full">';
          		}

              ?>

              <div class="list-post-top">

              <!-- タイトルなど -->
            	<header class="entry-header">

            		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

            		<?php if ( 'post' == get_post_type() ) : ?>

                <!-- 投稿日 -->
            		<div class="entry-meta">

                  <?php echo '('.get_post_time('Y/m/d').')'; ?>

            		</div><!-- .entry-meta -->

            		<?php endif; ?>

            	</header><!-- .entry-header -->

              <!-- 抜粋 -->
              <div class="entry-content">

              <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>" class="entry-description">
              <?php

            		$ismore = ! empty( $post->post_content ) ? strpos( $post->post_content, '<!--more-->' ) : '';

                if ( ! empty( $ismore ) ) {
            			the_content("&hellip;");
            		} else {
            			the_excerpt();
            		}
               ?>
             </a>

               <footer class="entry-footer">

             		<?php
             		if ( 'post' == get_post_type() ) {

             			$categories_list = get_the_category_list(', ');

             			if ( $categories_list ) {

             				echo '<span class="cat-links">';

                    echo "カテゴリー: ".$categories_list;

             				echo '</span>';

             			}

             			$tags_list = get_the_tag_list('',', ');

             			if ( $tags_list ) {

             				echo '<span class="tags-links">';

                    echo "タグ: ".$tags_list;

             				echo '</span>';

             			}
             		}

             		?>

             	</footer>

             </div>

           </article>
          <?php endwhile; endif; ?>
        <?php } else {
        ?>
        <header class="page-header">

          <h1 class="page-title">
            <span>見つかりません</span>
          </h1>

        </header><!-- .page-header -->
        <div class="page-content">


        			<p>ご指定の検索条件に一致する投稿がありませんでした。他のキーワードでもう一度検索してみてください。</p>

        			<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
        				<label>
        					<span class="screen-reader-text">検索:</span>
        					<input type="search" class="search-field" placeholder="検索 …" name="s">
        				</label>
        				<input type="submit" class="search-submit" value="検索">
        			</form>

        	</div>
        <?php
        }
        ?>
        </div>
      </section>
<!-- サイドバー -->
      <section class="sidebar-wrap col-md-3 clear-fix content-left-wrap module e2d3-sidebar">
          <div class="widget-area module-inner">
            <?php
              if(is_active_sidebar('e2d3_child_page_sidebar')){
                dynamic_sidebar('e2d3_child_page_sidebar');
              }
             ?>
          </div>
        </section>

    </main>

<?php get_footer(); ?>
