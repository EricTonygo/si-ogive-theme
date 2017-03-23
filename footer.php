<!-- Footer area -->
<div class="container footer">
    <div class="ui container">
        <div class="ui three column stackable doubling grid">
            <div class="column">
                <div class="ui header"><?php echo __("Plan du site", 'si-ogivedomain') ?></div>
                <div class="ui list">
                    <a href="<?php echo home_url('/') ?>" class="item"><i class="chevron right icon"></i> <?php echo get_page_by_path(__('accueil', 'si-ogivedomain'))->post_title ?></a>
                    <a href="<?php echo get_permalink(get_page_by_path(__('notre-vision', 'si-ogivedomain'))) ?>" class="item"><i class="chevron right icon"></i> <?php echo get_page_by_path(__('notre-vision', 'si-ogivedomain'))->post_title ?></a>
                    <a href="<?php echo home_url('/#areas_competence') ?>" class="item"><i class="chevron right icon"></i> DOMAINES DE COMPETENCE</a>
                    <a href="<?php echo get_permalink(get_page_by_path(__('a-propos-de-si-ogive', 'si-ogivedomain'))) ?>" class="item"><i class="chevron right icon"></i> <?php echo get_page_by_path(__('a-propos-de-si-ogive', 'si-ogivedomain'))->post_title ?></a>
                    <a href="<?php echo get_permalink(get_page_by_path(__('nous-contacter', 'si-ogivedomain'))) ?>" class="item"><i class="chevron right icon"></i> <?php echo get_page_by_path(__('nous-contacter', 'si-ogivedomain'))->post_title ?></a>
                    <a href="<?php echo get_permalink(get_page_by_path(__('forums', 'si-ogivedomain'))) ?>" class="item"><i class="chevron right icon"></i><?php echo get_page_by_path(__('forums', 'si-ogivedomain'))->post_title ?></a>
                </div>
            </div>
            <div class="column">
                <div class="ui header">SI OGIVE</div>
                <div class="ui list">
                    <div  class="item"><i class="mail outline icon"></i> Siège social Yaoundé BP: 5253</div>
                    <div  class="item"><i class="marker icon"></i> Situé à la Nouvelle route Bastos face Ariane TV Rue N°1839</div>
                    <div  class="item"><i class="call icon"></i> (+237)243804388 / (+237)243803895</div>
                    <a href="mailto:<?php echo get_bloginfo('admin_email'); ?>" class="item"><i class="mail icon"></i> <?php echo get_bloginfo('admin_email'); ?></a>
                </div>
            </div>
            <div class="column">
                <div class="ui header"><?php echo __("AUTRES SERVICES", 'si-ogivedomain') ?></div>
                <div class="ui list">
                    <?php
                    wp_reset_postdata();
                    query_posts(array('post_type' => 'service', 'post_per_page' => -1, "post_status" => 'publish', 'orderby' => 'post_date', 'order' => 'ASC'));
                    while (have_posts()): the_post()
                        ?>
                        <a href="<?php the_permalink() ?>" class="item"><i class="chevron right icon"></i> <?php the_title() ?></a>
                    <?php endwhile; ?> 
                </div>
            </div>
            <!--            <div class="column">
                            <div id="map" class="ui vertical feature segment"></div>
                        </div>-->
        </div>
    </div>
</div>
<div class="copyright">
    <div class="five wide column center aligned">
        <div class="ui inverted"><b>&copy;2017 - société d'ingénierie OGIVE - tous les droits réservés</b></div>
    </div>
</div>
<?php wp_footer() ?>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIUSRZgHmKP2EZuGri6fYnJDYZ1RdjW3k&callback=initMap"
            async defer>
    </script>


</body>
</html>