<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

$image      = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
$logo 		= get_theme_mod( 'logo_mobile' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="parallax" <?php 
                    if ($image) : ?>
        style="background-image: url(<?php echo $image[0]; ?>); background-size: cover; background-position: right bottom"
        ; <?php else : ?>
        style="background-image: url(<?php echo $logo; ?>); background-position: center; background-size: 200px; background-color: #D10000; background-repeat: no-repeat; background-position: center; background-attachment: initial;"
        <?php endif; ?>>
    </div>
	<div class="smallspace"></div>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-10 col-lg-9 col-xl-8">
				<?php
				the_title( '<h1 class="entry-title">', '</h1>' );
				?>

				<div class="entry-content">
					<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', '_s' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
					'after'  => '</div>',
				) );
				?>
					</div><!-- .entry-content -->

					<div class="smallspace">
						<p>&nbsp;</p>
					</div>
				</div>
				<div class="smallspace">
					<p>&nbsp;</p>
				</div>
			</div>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->