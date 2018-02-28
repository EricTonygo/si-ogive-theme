<!-- Content area -->
<div class="ui container content">
    <div class="ui stackable doubling grid">
        <!-- Middle Content -->
        <div class="twelve wide column">
            <div id='job_details' class="ui fluid card" <?php if (isset($_SESSION['error_message'])): ?> style="display: none"<?php endif ?>>
                <div class="ui content">
                    <?php if (!is_user_logged_in()): ?>
                        <div class="ui mini warning icon message">
                            <i class="warning sign icon"></i>
                            <div class="content">
                                <div class="header" style="font-weight: normal;">
                                    Vous devez être connecté pour donner votre avis sur ce sujet.
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <h2 class="header" style="text-transform: uppercase"><?php the_title(); ?></h2>
                    <div class="meta">
                        <!--<span><i class="calendar icon"></i>Publiée le <?php echo get_the_date() ?> à <?php echo get_the_date('H') ?>h<?php echo get_the_date('i') ?> </span>-->
                        <span>
                            Par : <a href="" class="mini image"><?php echo get_avatar(get_the_author_meta('ID'), 24); ?> <?php echo get_the_author() ?></a>
                            <?php echo "Il y a " . human_time_diff(get_the_time('U'), current_time('timestamp')); ?>
                        </span>
                        <span style="margin-left: 2em">
                            <strong>Partager sur:</strong>
                        </span>
                        <span style="margin-left: 1em">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php print(urlencode(the_permalink())) ?>&title=<?php print(urlencode(the_title())) ?>" target="_blank" class="ui mini circular facebook icon button" onclick="javascript:window.open(this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><i class="facebook icon"></i>  </a>
                            <a href="https://twitter.com/intent/tweet?status=<?php print(urlencode(the_title())) ?>+<?php print(urlencode(the_permalink())) ?>" target="_blank" class="ui mini circular twitter icon button" onclick="javascript:window.open(this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><i class="twitter icon"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php print(urlencode(the_permalink())) ?>&title=<?php print(urlencode(the_title())) ?>&source=<?php echo get_home_url() ?>" target="_blank" class="ui mini circular linkedin icon button" onclick="javascript:window.open(this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"> <i class="linkedin icon"></i></a>
                            <a href="https://plus.google.com/share?url=<?php print(urlencode(the_permalink())) ?>" target="_blank" class="ui mini circular google plus icon button" onclick="window.open(this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><i class="google plus icon"></i></a>
                            <!--<a href="whatsapp://send?text=<?php the_excerpt() ?> <?php print(urlencode(the_permalink())) ?>" data-action="share/whatsapp/share" class="ui circular green whatsapp icon button"><i class="whatsapp icon"></i></a>-->
                        </span>
                        <?php if (is_user_logged_in()): ?>
                            <span class="right floated">
                                <a href="#reply_form" class="ui yellow right floated button">Ajouter une réponse</a>
                            </span>
                        <?php endif ?>
                    </div>
                </div>
                <div class=" content content_page">
                    <p>
                        <?php the_content() ?>
                    </p>
                </div>
            </div>
            <div class="twelve wide column">
                <?php $topic_replies = new WP_Query(array('post_type' => bbp_get_reply_post_type(), 'post_per_page' => -1, "post_status" => bbp_get_public_status_id(), 'orderby' => 'post_date', 'order' => 'ASC', "meta_key" => "_bbp_topic_id", "meta_value" => get_the_ID())); ?>
                <div >
                    <div class="ui horizontal divider"> <?php echo $topic_replies->post_count; //bbp_topic_reply_count()    ?> Réponses</div>
                    <div class="ui comments">
                        <?php
                        if ($topic_replies->have_posts()):
                            ?>
                            
                            <?php while ($topic_replies->have_posts()): $topic_replies->the_post();
                                ?>
                                <div class="comment">
                                    <a class="avatar">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 64); ?>
                                    </a>
                                    <div class="content">
                                        <a class="author"><?php echo get_the_author() ?></a>
                                        <div class="metadata">
                                            <div class="date">Il y a <?php echo "" . human_time_diff(get_the_time('U'), current_time('timestamp')); ?></div>
                                        </div>
                                        <div class="text">
                                            <p><?php the_content() ?></p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        <?php endif ?>
                        <?php if (is_user_logged_in()): ?>
                            <form id="reply_form" class="ui reply form" method="POST" action="<?php the_permalink() ?>">
                                <div class="field">
                                    <textarea id="reply_message" name="reply_message" ></textarea>
                                </div>
                                <button id="submit_message" class="ui yellow labeled icon button">
                                    <i class="icon edit"></i> Répondre
                                </button>
                            </form>
                        <?php endif ?>
                    </div>
                    
                </div>
            </div>

        </div>
        <!-- Right Sidebar -->
        <div class="four wide column">
            <?php
            $main_forums = new WP_Query(array('post_type' => bbp_get_forum_post_type(), 'post_per_page' => -1, "post_status" => bbp_get_public_status_id(), 'orderby' => 'post_date', 'order' => 'DESC', 'post_parent' => 0));
            if ($main_forums->have_posts()):
                ?>
                <div class="ui fluid vertical menu moderns">
                    <a href="<?php echo get_permalink(get_page_by_path(__('forums', 'siogivedomain'))) ?>" class="item" style="text-transform: uppercase;"><strong><?php echo get_page_by_path(__('forums', 'siogivedomain'))->post_title ?></strong></a>
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
        </div>
    </div>
</div>