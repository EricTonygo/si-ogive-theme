<?php wp_reset_postdata();?>
<!-- Slider Container -->
<div id="home" class="ui container slider">
    <div class="owl-carousel" id="single-slider">
        <?php

        use Themosis\Metabox\Meta;
        $sliders = Meta::get(get_the_ID(), 'sliders');
        foreach ($sliders as $slider) :
            ?>
            <div class="item"><img src="<?php echo wp_get_attachment_image_src($slider['slider-image'], 'slider-image')[0] ?>"></div>
        <?php endforeach ?>
<!--div class="item"><img src="assets/img/1000x400.PNG"></div>
<div class="item"><img src="assets/img/1000x400.PNG"></div-->
    </div>
</div>

<!-- Content area -->
<div id="vision" class="section one">
    <div class="ui container">
        <h1><?php echo __("NOTRE VISION", 'siogivedomain') ?></h1>
        <p style="text-align: center; font-size: 14pt">
            <?php echo Meta::get(get_the_ID(), 'our-vision-home') ?>
        </p>
    </div>
</div>
<div class="ui divider"></div>
<div id="areas_competence" class="section two">
    <div class="ui container">
        <h1><?php echo __("DOMAINES DE COMPETENCE", 'siogivedomain') ?></h1>
        <div class="ui three column stackable doubling grid center ">
            <?php
            $areas_expertise = new WP_Query(array('post_type' => 'area-expertise', 'post_per_page' => -1, "post_status" => 'publish', 'orderby' => 'post_date', 'order' => 'ASC'));
            if($areas_expertise->have_posts()){
            while ($areas_expertise->have_posts()): $areas_expertise->the_post()
                ?>
                <div class="column">
                    <div class="ui segment">
                        <h2 class="ui icon header">
                            <!--<i class="settings icon"></i>-->
                            <?php if ( has_post_thumbnail() ): ?>
                            <a class="ui small image" href="<?php the_permalink() ?>">
                            <img src="<?php the_post_thumbnail_url( 'full' ); ?>">
                            </a>
                            <?php endif ?>
                            <div class="content content_area_expertise">
                                <a class="area_expertise_link" href="<?php the_permalink() ?>"><?php the_title() ?></a>
                            </div>
                        </h2>
                    </div>
                </div>
            <?php endwhile; 
             wp_reset_postdata();
            }?>            
        </div>
    </div>
</div>
<div class="ui hidden divider"></div>
<div id="large_logo_block" class="section three">
    <div class="ui container">
        <img class="image" src="<?php echo get_template_directory_uri() ?>/assets/img/large_logo.PNG">
    </div>
</div>
<div class="ui hidden divider"></div>
<div id="our-service" class="section two">
    <div class="ui container">
        <h1><?php echo __("AUTRES SERVICES", 'siogivedomain') ?></h1>
        <div class="ui three column stackable doubling grid center aligned">
            <?php            
            $services = new WP_Query(array('post_type' => 'service', 'post_per_page' => -1, "post_status" => 'publish', 'orderby' => 'post_date', 'order' => 'ASC'));
            if($services->have_posts()){
            while ($services->have_posts()): $services->the_post();
                ?>
                <div class="column">
                    <div class="ui segment">
                        <h2 class="ui icon header">
                            <!--<i class="talk icon"></i>-->
                            <?php if ( has_post_thumbnail() ): ?>
                            <a class="ui small image" href="<?php the_permalink() ?>">
                            <img src="<?php the_post_thumbnail_url( 'full' ); ?>">
                            </a>
                            <?php endif ?>
                            <div class="content content_area_expertise">
                                <a class="service_link" href="<?php the_permalink() ?>"><?php the_title() ?></a>
                            </div>
                        </h2>
                    </div>
                </div>
            <?php endwhile; 
            wp_reset_postdata();
            }?>            
        </div>
    </div>
</div>
<div class="ui hidden divider"></div>