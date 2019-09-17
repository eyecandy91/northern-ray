<?php

/* Template Name: Advisory page */

$head1               = get_field('head_1');
$info1               = get_field('info_1');
$head2               = get_field('head_2');
$info2               = get_field('info_2');

$sg                  = get_field('singapore');
$th                  = get_field('thailand');
$ch                  = get_field('china');
$ind                 = get_field('india');
$in                  = get_field('indonesia');
$ml                  = get_field('malaysia');
$au                  = get_field('australia');
$br                  = get_field('brazil');
$uk                  = get_field('uk_and_europe');

$img_head            = get_field('img_head');
$country_head        = get_field('country_head');

$modal               = get_field('modal');

get_header();
?>

<div class="justify-content-center d-flex">
    <div class="col-md-10 homefrontgrey">
        <header>
            <?php the_title( '<h2>', '</h2>' ); ?>
        </header><!-- .page-header -->
        <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
        ?>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if ($head1) : ?>
                <p class="nopadbot redmargbot"><span class="medbolding nrred"><?php echo $head1 ?></span></p>
                <?php endif; ?>

                <?php if ($info1) : ?>
                <?php echo $info1 ?>
                <?php endif; ?>

                <p>&nbsp;</p>
            </div>
            <div class="col-md-6">
                <?php if ($head2) : ?>
                <p class="nopadbot redmargbot"><span class="medbolding nrred"><?php echo $head2 ?></span></p>
                <?php endif; ?>

                <?php if ($info2) : ?>
                <?php echo $info2 ?>
                <?php endif; ?>
            </div>

            <div class="smallspace">
                <p>&nbsp;</p>
            </div>
        </div>
    </div>

</div>

<div class="smallspace">
    <p>&nbsp;</p>
</div>

<div class="smallspace">
    <p>&nbsp;</p>
</div>

<div class="smallspace">
    <p>&nbsp;</p>
</div>


<?php if ($img_head) : ?>
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        <h3><?php echo $img_head ?></h3>
    </div>
</div>
<?php endif; ?>

<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-lg-10 col-md-11">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6 map">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="col-md-6 col-lg-6">
                    <?php if ($country_head) : ?>
                    <h5><?php echo $country_head ?></h5>
                    <?php endif; ?>
                    <table class="experiencetable">
                        <tbody>
                            <?php if ($sg) : ?>
                            <tr>
                                <td class="countrytab">Singapore</td>
                                <td class="extab">
                                    <?php echo $sg ?>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php if ($th) : ?>
                            <tr>
                                <td class="countrytab">Thailand</td>
                                <td class="extab nopadtopbot">
                                    <?php echo $th ?>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php if ($ch) : ?>
                            <tr>
                                <td class="countrytab">China</td>
                                <td class="extab">
                                    <?php echo $ch ?>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php if ($ind) : ?>
                            <tr>
                                <td class="countrytab">India</td>
                                <td class="extab">
                                    <?php echo $ind ?>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php if ($in) : ?>
                            <tr>
                                <td class="countrytab">Indonesia</td>
                                <td class="extab">
                                    <?php echo $in ?>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php if ($ml) : ?>
                            <tr>
                                <td class="countrytab">Malaysia</td>
                                <td class="extab">
                                    <?php echo $ml ?>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php if ($au) : ?>
                            <tr>
                                <td class="countrytab">Australia</td>
                                <td class="extab">
                                    <?php echo $au ?>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php if ($br) : ?>
                            <tr>
                                <td class="countrytab">Brazil</td>
                                <td class="extab">
                                    <?php echo $br ?>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php if ($uk) : ?>
                            <tr>
                                <td class="countrytab">UK and Europe</td>
                                <td class="extab">
                                    <?php echo $uk ?>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="">
    <p class="landingintro">&nbsp;</p>
</div> -->

<?php if ($area1) : ?>
<div class="parallax" style="background-image: url('<?php echo $para_img1_url ?>')"></div>

<div class="smallspace" id="pipe"></div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-9 col-xl-8">
            <h2 class="w-100">Clad Pipe</h2>
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
<div class="parallax" id="pipe" style="background-image: url('<?php echo $para_img2_url ?>')"></div>
<?php endif; ?>

<?php if ($area2) : ?>
<div class="smallspace"></div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-9 col-xl-8">
            <h2 class="w-100">Clad Pipe</h2>
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
<div class="parallax" id="pipe" style="background-image: url('<?php echo $para_img3_url ?>')"></div>
<?php endif; ?>

<?php if ($area3) : ?>
<div class="smallspace"></div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-9 col-xl-8">
            <h2 class="w-100">Clad Pipe</h2>
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

<?php if ($modal) : ?>
<?php echo $modal ?>
<?php endif; ?>

<?php
get_footer();