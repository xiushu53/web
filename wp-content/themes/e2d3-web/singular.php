<?php get_header(); ?>

    <main class="main<?php echo (!is_front_page() && !is_home())?" e2d3_child":""; ?>">
      <section class="module e2d3-page-content">
        <div class="module-inner">

          <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <div class="entry">
              <h1 class="entry-title"><?php the_title(); ?></h1>

              <?php if(!is_page()): ?>

              <!-- 投稿日 -->
              <div class="entry-meta">

                <?php echo '('.get_post_time('Y/m/d').')'; ?>

              </div><!-- .entry-meta -->
              <?php endif; ?>
              <div class="entry-content">
                <?php the_content(); ?>
              </div>
            </div>
          <?php endwhile; endif; ?>

        </div>
      </section>

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
