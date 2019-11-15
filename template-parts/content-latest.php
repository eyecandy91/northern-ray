<?php
$args = array(
    'post_type'         => 'news', 
    'posts_per_page'    => 3, 
    // 'paged'             => $paged,
    'order'             => 'ASC',
);
$logo = get_theme_mod( 'logo_mobile' ); ?>

<div class="container latest-posts">
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
    <?php else: ?>
    <?php endif; ?>
    </div>
</div>