<!-- Content area -->
<div class="ui container content">
    <div class="ui stackable doubling grid">
        <!-- Middle Content -->
        <div class="twelve wide column">
            <div >
                <div class="ui horizontal divider"><h2><?php the_title() ?></h2></div>
                <br>
                <div class="content_page">
                    <p>
                        <?php the_content() ?>
                    </p>
                </div>

                <div class="ui divider"></div>
            </div>
        </div>
        <!-- Right Sidebar -->
        <div class="four wide column">
            <div class="ui fluid vertical menu moderns">
                <div class="item" style="text-transform: uppercase;"><strong><?php echo __('Autres services', 'si-ogivedomain') ?></strong></div>
                <?php
                $post_id= get_the_ID();
                $services = new WP_Query(array('post_type' => 'service', 'post_per_page' => -1, "post_status" => 'publish', 'orderby' => 'post_date', 'order' => 'ASC'));
                if ($services->have_posts()) {
                    while ($services->have_posts()): $services->the_post();
                        ?>
                        <a href="<?php the_permalink() ?>" class="<?php if($post_id == get_the_ID()):?>header<?php endif ?> item"> <?php the_title(); ?></a>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                }
                ?>
            </div>
            <!--            <div class="ui segments moderns">
                            <div class="ui header segment">
                                Picture Article
                            </div>
                            <div class="ui segment">
                                <div class="owl-carousel" id="single-slider">
                                    <div class="item">
                                        <p><img class="ui rounded image" src="assets/img/400x400.png"></p>
                                        <div align="justify">
                                            <div class="ui header">Learn About Angular 2</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et perspiciatis velit ducimus, reiciendis eius dolor culpa, laudantium modi minus voluptatum eveniet beatae, aperiam totam praesentium aut doloribus nemo minima a.</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <p><img class="ui rounded image" src="assets/img/400x400.png"></p>
                                        <div align="justify">
                                            <div class="ui header">How to make Chat App</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus fugit nesciunt omnis impedit veniam. Inventore praesentium quas, rerum similique, voluptatibus sit dolorum, voluptatum, voluptate fugiat asperiores reprehenderit cupiditate unde quibusdam!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui secondary segment">
                                Other Content
                            </div>
                        </div>-->
        </div>
    </div>
</div>