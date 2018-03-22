<?php
/*
Template Name: Films_Template
*/
get_header(); ?>
    <h1>Список фильмов</h1>

<?php

$args = array(
    'post_type' => 'acme_films',
    'publish' => true,
    'paged' => get_query_var('paged'),
);
query_posts($args);

if(have_posts()) { while (have_posts()){ the_post(); ?>
    <div class="post">
        <div class="post__body">
            <div class="post__header">
                <a href="<?php the_permalink(); ?>">
                    <h3><?php the_title(); ?></h3>
                </a>
            </div>
            <div class="row">

                <div class="col-md-4" >
                    <?php if ( has_post_thumbnail()) { ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                            <?php the_post_thumbnail(array(300, 300)); ?>
                        </a>
                    <?php } ?>
                </div>

                <div  class="col-md-8" >
                    <div class="row">
                        <div class="col-md-3"><strong>Страна:</strong></div>
                        <div class="col-md-5">
                            <?php
                            $cur_terms = get_the_terms( $post->ID, 'country' );
                            if ($cur_terms) {
                                foreach ($cur_terms as $cur_term) {
                                    echo '<span>' . $cur_term->name . '</span>, ';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div  class="row" >
                        <div class="col-md-3"><strong>Жанр:</strong></div>
                        <div class="col-md-5">
                            <?php
                            $cur_terms = get_the_terms( $post->ID, 'genre' );
                            if ($cur_terms){
                                foreach( $cur_terms as $cur_term ){
                                    echo '<span>'. $cur_term->name .'</span>, ';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><strong>Стоимость сеанса:</strong></div>
                        <div class="col-md-5">
                            <?php
                            $meta_values = get_post_meta( $post->ID, 'price', true );
                            echo '<span>'. $meta_values .'</span>';
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><strong>Дата выхода:</strong></div>
                        <div class="col-md-5">
                            <?php
                            $meta_values = get_post_meta( $post->ID, 'date', true );
                            echo '<span>'. $meta_values .'</span>';
                            ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <?php the_content('<span>Read more</span>'); ?>

            </div>
        </div>
    </div>
<?php }} else {?>
    <p>Записей нет</p>
<?php }?>

<?php get_footer(); ?>