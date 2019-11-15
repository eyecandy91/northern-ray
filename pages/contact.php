<?php

/* Template Name: Contact page */

$area1               = get_field('area1');
$area2               = get_field('area2');
$area3               = get_field('area3');
$head1               = get_field('head_1');
$head2               = get_field('head_2');
$head3               = get_field('head_3');

$para_img1           = get_field('para_img1');
$para_img1_url       = $para_img1['url'];
$para_img2           = get_field('para_img2');
$para_img2_url       = $para_img2['url'];
$para_img3           = get_field('para_img3');
$para_img3_url       = $para_img3['url'];

$maps                   = get_field('embeded_map');

get_header();
?>

<style>
.form-control {
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.form-group {
    margin-bottom: 15px;
}

.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    background-color: #D10000;
    color: white;
    user-select: none;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
</style>

<div class="justify-content-center d-flex">
    <div class="col-lg-8 col-md-10">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <header>
                    <?php the_title( '<h2>', '</h2>' ); ?>
                </header><!-- .page-header -->

                <?php
            while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page' );
		    endwhile; // End of the loop.
            ?>

            </div>
            <div class="col-md-6">
                <?php echo do_shortcode(get_post_meta(get_the_id(), 'form_id', true)); ?>
            </div>

        </div>
    </div>

</div>

<?php if ($para_img1_url) : ?>
<div class="parallax" style="background-image: url('<?php echo $para_img1_url ?>')"></div>
<?php endif; ?>

<div class="smallspace"></div>

<div class="justify-content-center d-flex">
    <div class="col-lg-8 col-md-10">
        <div class="map-responsive">
            <?php echo $maps ?>
        </div>
    </div>
</div>

<!-- <div class="">
    <p class="landingintro">&nbsp;</p>
</div> -->

<?php if ($area1) : ?>
<div class="parallax" style="background-image: url('<?php echo $para_img1_url ?>')"></div>

<div class="smallspace" id="first"></div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-9 col-xl-8">
            <?php if ($head1) : ?>
            <h2 class="w-100"><?php echo $head1 ?></h2>
            <?php endif; ?>
            <?php echo $area1 ?>
            <div class="smallspace" id="fittings">
                <p>&nbsp;</p>
            </div>
        </div>
        <div class="smallspace">
            <p>&nbsp;</p>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ($para_img2_url) : ?>
<div class="parallax" id="second" style="background-image: url('<?php echo $para_img2_url ?>')"></div>
<?php endif; ?>

<?php if ($area2) : ?>
<div class="smallspace"></div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-9 col-xl-8">
            <?php if ($head2) : ?>
            <h2 class="w-100"><?php echo $head2 ?></h2>
            <?php endif; ?>

            <?php echo $area2 ?>
            <div class="smallspace" id="fittings">
                <p>&nbsp;</p>
            </div>
        </div>
        <div class="smallspace">
            <p>&nbsp;</p>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ($para_img3_url) : ?>
<div class="parallax" id="third" style="background-image: url('<?php echo $para_img3_url ?>')"></div>
<?php endif; ?>

<?php if ($area3) : ?>
<div class="smallspace"></div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-9 col-xl-8">
            <?php if ($head3) : ?>
            <h2 class="w-100"><?php echo $head3 ?></h2>
            <?php endif; ?>
            <?php echo $area3?>
            <div class="smallspace" id="fittings">
                <p>&nbsp;</p>
            </div>
        </div>
        <div class="smallspace">
            <p>&nbsp;</p>
        </div>
    </div>
</div>

<?php endif; ?>

<?php
get_footer();