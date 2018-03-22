<?php
/*
 * Template name: Шаблон страницы фильма
 * Template post type: acme_films
 */


get_header(); ?>

    <div id="primary" class="content-area col-sm-12 col-md-12 <?php echo of_get_option( 'site_layout' ); ?>">
        <main id="main" class="site-main" role="main">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="row">
                    <div class="col-md-8">
                <?php get_template_part( 'content', 'single' ); ?>
                    </div>
                    <div class="col-md-4">
                <div class="row">

                    <div class="col-md-7">
                        <strong>Стоимость сеанса:</strong>

                    </div>
                    <div class="col-md-5">
                        <?php
                        $meta_values = get_post_meta( $post->ID, 'price', true );
                        echo '<span>'. $meta_values .'</span>';
                        ?>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-md-7"><strong>Дата выхода:</strong></div>
                    <div class="col-md-5">
                        <?php
                        $meta_values = get_post_meta( $post->ID, 'date', true );
                        echo '<span>'. $meta_values .'</span>';
                        ?>
                    </div>
                </div>
                    </div>
                </div>

                <?php unite_post_nav(); ?>

                <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() ) :
                    comments_template();
                endif;
                ?>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->


<?php get_footer(); ?>