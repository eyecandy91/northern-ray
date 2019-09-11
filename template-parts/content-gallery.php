<?php
$img1       = get_field('img1');
$img1_url   = $img1['url'];
$img1_w     = $img1['width'];
$img1_h     = $img1['height'];
$img1_alt   = $img1['alt'];

$img2       = get_field('img2');
$img2_url   = $img2['url'];
$img2_w     = $img2['width'];
$img2_h     = $img2['height'];
$img2_alt   = $img2['alt'];

$img3       = get_field('img3');
$img3_url   = $img3['url'];
$img3_w     = $img3['width'];
$img3_h     = $img3['height'];
$img3_alt   = $img3['alt'];

$img4       = get_field('img4');
$img4_url   = $img4['url'];
$img4_w     = $img4['width'];
$img4_h     = $img4['height'];
$img4_alt   = $img4['alt'];

$img5       = get_field('img5');
$img5_url   = $img5['url'];
$img5_w     = $img5['width'];
$img5_h     = $img5['height'];
$img5_alt   = $img5['alt'];

$img6       = get_field('img6');
$img6_url   = $img6['url'];
$img6_w     = $img6['width'];
$img6_h     = $img6['height'];
$img6_alt   = $img6['alt'];

// echo "<pre>";
//         print_r($img3);
//         echo "</pre>";
// echo "<pre>";
//         print_r($img2);
//         echo "</pre>";
//         echo $img4_url
?>


<div id="frontcarousel" class="carousel slide frontcarousel d-block  order-lg-3 order-1" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#frontcarousel" data-slide-to="0" class="active"></li>
        <li data-target="#frontcarousel" data-slide-to="1"></li>
        <li data-target="#frontcarousel" data-slide-to="2"></li>
        <li data-target="#frontcarousel" data-slide-to="3"></li>
        <li data-target="#frontcarousel" data-slide-to="4"></li>
        <li data-target="#frontcarousel" data-slide-to="5"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="carouselcontainer d-block w-100 fullwidthgraphic">
                <img src="<?php echo $img1_url ?>" class="frontcarouselsize" alt="<?php echo $img1_alt ?>" />
            </div>
        </div>

        <div class="carousel-item">
            <div class="carouselcontainer d-block w-100 fullwidthgraphic">
                <img src="<?php echo $img2_url ?>" class="frontcarouselsize" alt="<?php echo $img2_alt ?>" />
            </div>
        </div>

        <div class="carousel-item ">
            <div class="carouselcontainer d-block w-100 fullwidthgraphic">
                <img src="<?php echo $img3_url ?>" class="frontcarouselsize" alt="<?php echo $img3_alt ?>" />
            </div>
        </div>

        <div class="carousel-item">
            <div class="carouselcontainer d-block w-100 fullwidthgraphic">
                <img src="<?php echo $img4_url ?>" class="frontcarouselsize" alt="<?php echo $img4_alt ?>" />
            </div>
        </div>

        <div class="carousel-item">
            <div class="carouselcontainer d-block w-100 fullwidthgraphic">
                <img src="<?php echo $img5_url ?>" class="frontcarouselsize" alt="<?php echo $img5_alt ?>" />
            </div>
        </div>

        <div class="carousel-item">
            <div class="carouselcontainer d-block w-100 fullwidthgraphic">
                <img src="<?php echo $img6_url ?>" class="frontcarouselsize" alt="<?php echo $img6_alt ?>" />
            </div>
        </div>
        
        <a class="carousel-control-prev" href="#frontcarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#frontcarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>