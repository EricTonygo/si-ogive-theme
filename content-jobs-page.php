<!-- Content area -->
<div class="ui container content">
    <div class="ui stackable doubling grid">
        <!-- Middle Content -->
        <div class="twelve wide column">
            <div align="center">
                <div class="ui divider horizontal"><h2 class="ui header">NOS OFFRES D'EMPLOI</h2></div>
                <?php
                $jobs = new WP_Query(array('post_type' => 'job', 'post_per_page' => -1, "post_status" => 'publish', 'orderby' => 'post_date', 'order' => 'DESC'));
                if ($jobs->have_posts()):
                    ?>
                    <div class="ui items">
                        <?php while ($jobs->have_posts()): $jobs->the_post();
                            ?>
                            <div class="item" align="left">
                                <div class="content">
                                    <a href="<?php the_permalink() ?>" class="header"><?php the_title() ?></a>
                                    <div class="meta">
                                        <span><i class="calendar icon"></i>Publiée le <?php echo get_the_date() ?> à <?php echo get_the_date('H') ?>h<?php echo get_the_date('i') ?> </span>
                                    </div>
                                    <div class="description" align="justify">
                                        <p><?php the_excerpt() ?></p>
                                    </div>
                                    <div class="extra">
                                        <a href="<?php the_permalink() ?>" class="ui yellow right floated button">Détails de l'offre</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ui divider"></div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                <?php endif ?>              
<!--                <div class="ui right floated pagination menu">
                    <a class="icon item">
                        <i class="left chevron icon"></i>
                    </a>

                    <a class="icon item">
                        <i class="right chevron icon"></i>
                    </a>
                </div>-->
            </div>
        </div>
        <!-- Right Sidebar -->
        <div class="four wide column">
            <div class="ui fluid vertical menu moderns">
                <div class="header item" style="text-transform: uppercase;"><strong><?php echo __("OFFRES D'EMPLOI", 'siogivedomain') ?></strong></div>
                <?php 
                    $categories = get_term_children( get_category_by_slug('offres-d-emploi')->term_id, 'category' );
                    foreach ($categories as $id) : $category = get_term_by('id', $id, 'category')
                ?>
                <a href="<?php echo get_category_link($category->term_id) ?>" class="<?php if (in_category(__($category->slug))): ?> header <?php endif ?> item"> <?php echo $category->name ?>(<?php echo $category->count ?>) </a>
                <?php endforeach; ?>
            </div>
            <div class="ui fluid vertical menu moderns">
                <div class="header item" style="text-transform: uppercase;"><strong><?php echo __('Nos coordonnées', 'siogivedomain') ?></strong></div>
                <div  class="item"><i class="mail outline icon"></i> Siège social Yaoundé BP: 5253</div>
                <div  class="item"><i class="marker icon"></i> Situé à la Nouvelle route Bastos face Ariane TV Rue N°1839</div>
                <div  class="item"><i class="call icon"></i> (+237) 243804388 / 243803895</div>
                <a href="mailto:<?php echo get_bloginfo('admin_email'); ?>" class="item"><i class="mail icon"></i> <?php echo get_bloginfo('admin_email'); ?></a>
            </div>
        </div>
    </div>
</div>