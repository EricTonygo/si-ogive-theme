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
                <div class="item" style="text-transform: uppercase;"><strong><?php echo __('SI OGIVE', 'siogivedomain') ?></strong></div>
                <a href="<?php echo get_permalink(get_page_by_path(__('notre-vision', 'siogivedomain'))) ?>" class="<?php if(is_page(__('notre-vision', 'siogivedomain'))):?> header <?php endif ?> item"> <?php echo get_page_by_path(__('notre-vision', 'siogivedomain'))->post_title ?> </a>
                <a href="<?php echo get_permalink(get_page_by_path(__('a-propos-de-siogive', 'siogivedomain'))) ?>" class="<?php if(is_page(__('a-propos-de-siogive', 'siogivedomain'))):?> header <?php endif ?> item"> <?php echo get_page_by_path(__('a-propos-de-siogive', 'siogivedomain'))->post_title ?> </a>
                <a href="<?php echo get_permalink(get_page_by_path(__('nous-contacter', 'siogivedomain'))) ?>" class="item"> <?php echo get_page_by_path(__('nous-contacter', 'siogivedomain'))->post_title ?> </a>
            </div>
            <div class="ui fluid vertical menu moderns">
                <div class="item" style="text-transform: uppercase;"><strong><?php echo __('Nos coordonnées', 'siogivedomain') ?></strong></div>
                <div  class="item"><i class="mail outline icon"></i> Siège social Yaoundé BP: 5253</div>
                <div  class="item"><i class="marker icon"></i> Situé à la Nouvelle route Bastos face Ariane TV Rue N°1839</div>
                <div  class="item"><i class="call icon"></i> (+237) 243804388 / 243803895</div>
                <a href="mailto:<?php echo get_bloginfo('admin_email'); ?>" class="item"><i class="mail icon"></i> <?php echo get_bloginfo('admin_email'); ?></a>
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