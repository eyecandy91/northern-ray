<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

$tw      = myprefix_get_theme_option('twitter');
$fb      = myprefix_get_theme_option('facebook');
$in      = myprefix_get_theme_option('instagram');
$li      = myprefix_get_theme_option('linkedin');
?>

<div class="row justify-content-center">
    <div class="col-md-10 col-lg-9 col-xl-8">
        <div class="smallspace">
            <p>&nbsp;</p>
        </div>
        <div class="smallspace"></div>

    </div>
</div>

<footer class="footer">
    <div class="container-fluid bgnred">
        <div class=" footertext footerblock d-flex justify-content-between mb-3 bgnred">
            <div class="p2 bd-highlight">
                <p>&copy; Northern Ray 2019</p>
            </div>
            <div class="p2 bd-highlight">
                <!-- <p class="text-center">Twitter | Facebook | LinkedIn</p> -->
                <span class="whitey"><a href="<?php $in ?>" target="_blank"><i class="fab fa-instagram"></i></a> <a
                        href="<?php $li ?>" target="_blank"><i class="fab fa-linkedin"></i></a> <a href="<?php $tw ?>"
                        target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="<?php $fb ?>" target="_blank"><i class="fab fa-facebook"></i></a> </span>
            </div>
            <div class="p2 bd-highlight footerlogo">
                <p><img src="<?php echo get_theme_mod( 'logo_mobile' ); ?>" class="footerlogo" alt="Northern Ray White Logo"></p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>