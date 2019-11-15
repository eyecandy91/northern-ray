<?php /*
 * Template Name: Dynamic posts

 */ ?>
<?php get_header();
$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
if ( is_page('northern-ray-blog') ) {
    $args = array(
        'post_type' => 'blog', 
        'posts_per_page' => 12, 
        'paged' => $paged,
        'order' => 'ASC',
    );
} else if ( is_page('northern-ray-news') ) {
    $args = array(
        'post_type' => 'news', 
        'posts_per_page' => 12, 
        'paged' => $paged,
        'order' => 'ASC',
    );
}

$logo = get_theme_mod( 'logo_mobile' ); ?>

<div class="container ">
    <div class="row">
        <div class="col-sm-12 months-wrapper">
            <?php 
            if ( is_page('northern-ray-blog') ) {
                $months = array(
                    'post_type'     => 'blog', 
                    'type'          => 'monthly',
                    'echo'          => 0,
                    'paged'         => $paged,
                );
            } else if ( is_page('northern-ray-news') ) {
                $months = array(
                    'post_type'     => 'news', 
                    'type'          => 'monthly',
                    'echo'          => 0,
                    'paged'         => $paged,
                );
            }
            echo '<ul class="list-unstyled months"><li class="init">Select a month from the archive<i class="fas fa-chevron-down"></i>
            </li>'.wp_get_archives($months).'	</ul>';
            ?>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php $loop = new WP_Query($args); ?>
        <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
        $image      = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');?>

        <div class="col-sm-12 col-md-4">
            <div class="card">
                <a href="<?php the_permalink() ?>">
                    <div class="card-img-top blog-img" <?php 
                    if ($image) : ?>
                        style="background-image: url(<?php echo $image[0]; ?>); background-size: cover; background-position: right bottom"
                        ; <?php else : ?>
                        style="background-image: url(<?php echo $logo; ?>); background-position: center; background-size: 50%; background-color: #D10000; background-repeat: no-repeat;"
                        <?php endif; ?>>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text">
                            <?php echo get_the_excerpt(); ?>
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <?php endwhile;
    ?>
    </div>
</div>

<div class="container">
    <div class="row">

        <?php 
    if (function_exists("pagination")) {
        pagination($loop->max_num_pages);
    }
    ?>
        <?php else: ?>
        <h1>No posts here!</h1>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>
<?php
get_footer();?>