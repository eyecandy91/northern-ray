<?php

/* Template Name: Home page */

get_header();
?>

<div class="justify-content-center d-flex order-lg-1 order-3">
    <div class="col-lg-8 col-md-10 homefrontgrey">
        <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
    </div>
</div>

<div class=" order-lg-2 order-2">
    <p class="landingintro">&nbsp;</p>
</div>

<?php
get_template_part( 'template-parts/content', 'gallery' );
?>

<?php
get_footer();