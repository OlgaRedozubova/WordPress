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

                <span><?php echo get_the_date();?></span>
            </div>
            <div class="post__content">
                <?php the_content('<span>Read more</span>'); ?>
            </div>
        </div>
    </div>
<?php }} else {?>
    <p>Записей нет</p>
<?php }?>

<?php get_footer(); ?>