<?php get_header(); ?>
    
    <main class="main">

<?php if (have_posts()) : ?>
<?php while ( have_posts() ) : the_post(); ?>

        <section class="module main-contents">
            <div class="module-inner">
                <time>
                    <a href="<?php the_permalink( $post ); ?>"><?php the_time('Y年m月d日') ?></a>
                </time>
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </div>
        </section>

<?php endwhile; ?>
<?php endif; ?>

    </main>

<?php get_footer(); ?>