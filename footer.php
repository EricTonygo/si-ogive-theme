<!-- Footer area -->
<div class="container footer">
    <div class="ui container">
        <div class="ui three column stackable doubling grid">
            <div class="column">
                <div class="ui header"><?php echo __("Plan du site", 'siogivedomain') ?></div>
                <div class="ui list">
                    <a href="<?php echo home_url('/') ?>" class="item"><i class="chevron right icon"></i> <?php echo __("ACCUEIL", "siogivedomain"); ?></a>
                    <a href="<?php echo get_permalink(get_page_by_path(__('notre-vision', 'siogivedomain'))) ?>" class="item"><i class="chevron right icon"></i> <?php echo get_page_by_path(__('notre-vision', 'siogivedomain'))->post_title ?></a>
                    <a href="<?php echo get_permalink(get_page_by_path(__('domaines-de-competence', 'siogivedomain'))) ?>" class="item"><i class="chevron right icon"></i> DOMAINES DE COMPETENCE</a>
                    <a href="<?php echo get_permalink(get_page_by_path(__('a-propos-de-siogive', 'siogivedomain'))) ?>" class="item"><i class="chevron right icon"></i> <?php echo get_page_by_path(__('a-propos-de-siogive', 'siogivedomain'))->post_title ?></a>
                    <a href="<?php echo get_permalink(get_page_by_path(__('nous-contacter', 'siogivedomain'))) ?>" class="item"><i class="chevron right icon"></i> <?php echo get_page_by_path(__('nous-contacter', 'siogivedomain'))->post_title ?></a>
                    <a href="<?php echo get_permalink(get_page_by_path(__('forums', 'siogivedomain'))) ?>" class="item"><i class="chevron right icon"></i><?php echo get_page_by_path(__('forums', 'siogivedomain'))->post_title ?></a>
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
                <div class="ui header"><?php echo __("AUTRES SERVICES", 'siogivedomain') ?></div>
                <div class="ui list">
                    <?php
                    $services = new WP_Query(array('post_type' => 'service', 'post_per_page' => -1, "post_status" => 'publish', 'orderby' => 'post_date', 'order' => 'ASC'));
                    if ($services->have_posts()) {
                        while ($services->have_posts()): $services->the_post();
                            ?>
                            <a href="<?php the_permalink() ?>" class="item"><i class="chevron right icon"></i> <?php the_title() ?></a>
                        <?php endwhile; ?> 
                        <?php
                        wp_reset_postdata();
                    }
                    ?>
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
        <div class="ui inverted" style="font-size: 9pt"><b>&copy;2017 - <a class="link_siogive_footer" href="<?php echo home_url('/') ?>">société d'ingénierie OGIVE<sup style="font-size: 8pt">&reg;</sup></a> - Tous droits réservés</b></div>
    </div>
</div>
<?php wp_footer() ?>

<?php if (is_page(__('nous-contacter', 'siogivedomain'))): ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIUSRZgHmKP2EZuGri6fYnJDYZ1RdjW3k&callback=initMap"
            async defer>
    </script>
<?php endif ?>

</body>
</html>