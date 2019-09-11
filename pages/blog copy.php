<?php /*
 * Template Name: My custom view

 */ ?>
<?php get_header();

// if ( is_page('blog') ) {
//     query_posts(array( 
//         'post_type' => 'blog',
//         'showposts' => 10 
//     ) );  
// } else if ( is_page('news') ) {
//     query_posts(array( 
//         'post_type' => 'news',
//         'showposts' => 10 
//     ) );  
// }
?>
<ul class="carousel-inner" role="listbox">

                        <?php $args = array('post_type' => 'blog'); ?>
                        <?php $loop = new WP_Query($args); ?>
                        <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>

                        <li class="item">
                        <a href="<?php the_permalink() ?>"><h1>There is a post!</h1></a>
                        </li>

                        <?php endwhile; ?>

                        <?php else: ?>
                            <h1>No posts here!</h1>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>

                    </ul>



<?php get_footer();?>