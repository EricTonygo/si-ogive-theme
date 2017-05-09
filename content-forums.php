<!-- Content area -->
<div class="ui container content">
    <div class="ui stackable doubling grid">
        <!-- Middle Content -->
        <div class="twelve wide column">
            <div align="">
                <div class="ui horizontal divider"><h2><?php the_title(); ?></h2></div>
                <br>
                <div class="ui container">
                    <div class="column content_page">
                        <?php if (!is_user_logged_in()): ?>
                            <div class="ui mini warning icon message">
                                <i class="warning sign icon"></i>
                                <div class="content">
                                    <div class="header" style="font-weight: normal;">
                                        Vous devez être connecté pour participer à un forum.
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if (bbp_has_forums()) : ?>
                            <table class="ui celled table">
                                <thead>
                                    <tr>
                                        <th ><?php _e('Forum', 'bbpress'); ?></th>
                                        <th ><?php _e('Topics', 'bbpress'); ?></th>
                                        <th ><?php bbp_show_lead_topic() ? _e('Replies', 'bbpress') : _e('Posts', 'bbpress'); ?></th>
                                        <th ><?php _e('Freshness', 'bbpress'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while (bbp_forums()) : bbp_the_forum(); ?>
                                        <tr>
                                            <td>
                                                <?php if (bbp_is_user_home() && bbp_is_subscriptions()) : ?>

                                                    <span class="bbp-row-actions">

                                                        <?php do_action('bbp_theme_before_forum_subscription_action'); ?>

                                                        <?php bbp_forum_subscription_link(array('before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;')); ?>

                                                        <?php do_action('bbp_theme_after_forum_subscription_action'); ?>

                                                    </span>

                                                <?php endif; ?>

                                                <?php do_action('bbp_theme_before_forum_title'); ?>
                                                <div class="ui relaxed list">
                                                    <div class="item">
                                                        <div class="content">
                                                            <a class="header" href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a>
                                                        </div>

                                                        <?php do_action('bbp_theme_after_forum_title'); ?>

                                                        <?php do_action('bbp_theme_before_forum_description'); ?>

                                                        <div class="description"><?php bbp_forum_content(); ?></div>

                                                        <?php do_action('bbp_theme_after_forum_description'); ?>

                                                        <?php do_action('bbp_theme_before_forum_sub_forums'); ?>
                                                        <?php
                                                        bbp_list_forums(array(
                                                            'before' => '<div class="ui relaxed divided list">',
                                                            'after' => '</div>',
                                                            'link_before' => '<div class="item"><i class="angle double right icon"></i><div class="content">',
                                                            'link_after' => '</div></div>',
                                                            'count_before' => ' (',
                                                            'count_after' => ')',
                                                            'count_sep' => ', ',
                                                            'separator' => ', ',
                                                            'forum_id' => '',
                                                            'show_topic_count' => true,
                                                            'show_reply_count' => true,
                                                        ));
                                                        ?>
                                                    </div>
                                                </div>
                                                <?php do_action('bbp_theme_after_forum_sub_forums'); ?>

                                                <?php bbp_forum_row_actions(); ?>
                                            </td>
                                            <td>
                                                <?php bbp_forum_topic_count(); ?>
                                            </td>
                                            <td>
                                                <?php bbp_show_lead_topic() ? bbp_forum_reply_count() : bbp_forum_post_count(); ?>
                                            </td>
                                            <td>
                                                <?php do_action('bbp_theme_before_forum_freshness_link'); ?>

                                                <?php bbp_forum_freshness_link(); ?>

                                                <?php do_action('bbp_theme_after_forum_freshness_link'); ?>

                                                <p class="bbp-topic-meta">

                                                    <?php do_action('bbp_theme_before_topic_author'); ?>

                                                    <span class="bbp-topic-freshness-author"><?php bbp_author_link(array('post_id' => bbp_get_forum_last_active_id(), 'size' => 14)); ?></span>

                                                    <?php do_action('bbp_theme_after_topic_author'); ?>

                                                </p>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>

                            </table>

                        <?php else : ?>


                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
        <!-- Right Sidebar -->
        <div class="four wide column">
            <div class="ui fluid vertical menu moderns">
                <div class="header item" style="text-transform: uppercase;"><strong><?php echo __('Forums', 'siogivedomain') ?></strong></div>
                <?php if (bbp_has_forums()) : ?>
                    <?php while (bbp_forums()) : bbp_the_forum(); ?>
                        <div class="item">
                            <i class="angle double right middle aligned icon"></i>
                            <a href="<?php bbp_forum_permalink(); ?>" class='content'> <?php bbp_forum_title(); ?> </a>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>

                <?php endif; ?>               
            </div>

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



