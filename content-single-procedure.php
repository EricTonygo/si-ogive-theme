<!-- Content area -->
<div class="ui container content">
    <div class="ui stackable doubling grid">
        <!-- Middle Content -->
        <div class="twelve wide column">
            <div id='job_details' class="ui fluid card" <?php if (isset($_SESSION['error_message'])): ?> style="display: none"<?php endif ?>>
                <div class="ui content">

                    <h2 class="header" style="text-transform: uppercase"><?php echo get_post_meta(get_the_ID(), 'reference', true) ?></h2>
                    <!--                    <div class="meta">
                                            <span><i class="calendar icon"></i>Publiée le <?php echo get_the_date() ?> à <?php echo get_the_date('H') ?>h<?php echo get_the_date('i') ?> </span>
                                            <span style="margin-left: 2em">
                                                <strong>Partager l'offre sur:</strong>
                                            </span>
                                            <span style="margin-left: 1em">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php print(urlencode(the_permalink())) ?>&title=<?php print(urlencode(the_title())) ?>" target="_blank" class="ui mini circular facebook icon button" onclick="javascript:window.open(this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><i class="facebook icon"></i>  </a>
                                                <a href="https://twitter.com/intent/tweet?status=<?php print(urlencode(the_title())) ?>+<?php print(urlencode(the_permalink())) ?>" target="_blank" class="ui mini circular twitter icon button" onclick="javascript:window.open(this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><i class="twitter icon"></i></a>
                                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php print(urlencode(the_permalink())) ?>&title=<?php print(urlencode(the_title())) ?>&source=<?php echo get_home_url() ?>" target="_blank" class="ui mini circular linkedin icon button" onclick="javascript:window.open(this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"> <i class="linkedin icon"></i></a>
                                                <a href="https://plus.google.com/share?url=<?php print(urlencode(the_permalink())) ?>" target="_blank" class="ui mini circular google plus icon button" onclick="window.open(this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><i class="google plus icon"></i></a>
                                                <a href="whatsapp://send?text=<?php the_excerpt() ?> <?php print(urlencode(the_permalink())) ?>" data-action="share/whatsapp/share" class="ui circular green whatsapp icon button"><i class="whatsapp icon"></i></a>
                                            </span>
                                            <span class="right floated">
                                                <button id="apply_job_top" class="ui yellow button">POSTULER MAINTENANT</button>
                                            </span>
                                        </div>-->
                </div>
                <div class=" content content_page">
                    <p>
                        <?php the_content() ?>
                    </p>
                </div>
                <?php
                $detail_files_ids = get_post_meta(get_the_ID(), 'detail-files-IDs', true);
                if (is_array($detail_files_ids) && count($detail_files_ids) > 0):
                    ?>
                    <div align="right">
                        <?php
                        foreach ($detail_files_ids as $attachement_id):
                            ?>
                        <a  href="<?php echo wp_make_link_relative(wp_get_attachment_url($attachement_id)); ?>" class="ui yellow labeled icon button"> <i class="download icon"></i><?php echo basename(get_attached_file($attachement_id)); ?> </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
        <!-- Right Sidebar -->
        <div class="four wide column">
            <?php
            $main_forums = new WP_Query(array('post_type' => bbp_get_forum_post_type(), 'post_per_page' => -1, "post_status" => bbp_get_public_status_id(), 'orderby' => 'post_date', 'order' => 'DESC', 'post_parent' => 0));
            if ($main_forums->have_posts()):
                ?>
                <div class="ui fluid vertical menu moderns">
                    <a href="<?php echo get_permalink(get_page_by_path(__('forums', 'siogivedomain'))) ?>" class="header item" style="text-transform: uppercase;"><strong><?php echo get_page_by_path(__('forums', 'siogivedomain'))->post_title ?></strong></a>
                    <?php while ($main_forums->have_posts()): $main_forums->the_post(); ?>
                        <div class="item">
                            <i class="angle double right middle aligned icon"></i>
                            <a href="<?php the_permalink(); ?>" > <?php the_title(); ?> </a>
                        </div>
                    <?php endwhile; ?>                             
                </div>
                <?php
            endif;
            wp_reset_postdata();
            ?> 

            <div class="ui fluid vertical menu moderns">
                <div class="header item" style="text-transform: uppercase;"><strong><?php echo __('Sujets Recents', 'siogivedomain') ?></strong></div>
                <?php
                $topics = new WP_Query(array('post_type' => bbp_get_topic_post_type(), 'post_per_page' => 5, "post_status" => bbp_get_public_status_id(), 'orderby' => 'post_date', 'order' => 'DESC'));
                if ($topics->have_posts()) {
                    while ($topics->have_posts()): $topics->the_post();
                        ?>
                        <div class="item">
                            <i class="angle double right icon"></i>
                            <a href="<?php the_permalink(); ?>" > <?php the_title(); ?> </a> par <a href=""><?php echo get_avatar(get_the_author_meta('ID'), 16); ?> <?php echo get_the_author() ?></a>
                            <?php echo "Il y a " . human_time_diff(get_the_time('U'), current_time('timestamp')); ?>
                        </div>
                        <?php
                    endwhile;
                }
                wp_reset_postdata();
                ?>
            </div>
            <div class="ui fluid vertical menu moderns">
                <div class="header item" style="text-transform: uppercase;"><strong><?php echo __('Reponses Recentes', 'siogivedomain') ?></strong></div>
                <?php
                $replies = new WP_Query(array('post_type' => bbp_get_reply_post_type(), 'post_per_page' => 5, "post_status" => bbp_get_public_status_id(), 'orderby' => 'post_date', 'order' => 'DESC'));
                if ($replies->have_posts()) {
                    while ($replies->have_posts()): $replies->the_post();
                        ?>
                        <div class="item">
                            <i class="angle double right icon"></i>
                            <a href="<?php the_permalink(); ?>" >  <?php echo wp_trim_words(get_the_content(), 10, '...'); ?> </a> par <a href=""><?php echo get_avatar(get_the_author_meta('ID'), 16); ?> <?php echo get_the_author() ?></a>
                            <?php echo "Il y a " . human_time_diff(get_the_time('U'), current_time('timestamp')); ?>
                        </div>
                        <?php
                    endwhile;
                }
                wp_reset_postdata();
                ?>
            </div>
            <div class="ui fluid vertical menu moderns">
                <div class="item" style="text-transform: uppercase;"><strong><?php echo __('Nos coordonnées', 'siogivedomain') ?></strong></div>
                <div  class="item"><i class="mail outline icon"></i> Siège social Yaoundé BP: 5253</div>
                <div  class="item"><i class="marker icon"></i> Situé à la Nouvelle route Bastos face Ariane TV Rue N°1839</div>
                <div  class="item"><i class="call icon"></i> (+237) 243804388 / 243803895</div>
                <a href="mailto:<?php echo get_bloginfo('admin_email'); ?>" class="item"><i class="mail icon"></i> <?php echo get_bloginfo('admin_email'); ?></a>
            </div>

        </div>
    </div>
</div>
