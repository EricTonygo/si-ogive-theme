<!-- Content area -->
<div class="ui container content">
    <div class="ui stackable doubling grid">
        <!-- Middle Content -->
        <div class="eleven wide column">
            <div id='job_details' class="ui fluid card">
                <div class="content">
                    <h2 class="header" style="text-transform: uppercase"><?php the_title(); ?></h2>
                    <div class="meta" style="text-align: right">
                        <span>
                            <strong>Partager sur:</strong>
                        </span>
                        <span style="margin-left: 1em">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php print(urlencode(the_permalink())) ?>&title=<?php print(urlencode(the_title())) ?>" target="_blank" class="ui mini circular facebook icon button" onclick="javascript:window.open(this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><i class="facebook icon"></i>  </a>
                            <a href="https://twitter.com/intent/tweet?status=<?php print(urlencode(the_title())) ?>+<?php print(urlencode(the_permalink())) ?>" target="_blank" class="ui mini circular twitter icon button" onclick="javascript:window.open(this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><i class="twitter icon"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php print(urlencode(the_permalink())) ?>&title=<?php print(urlencode(the_title())) ?>&source=<?php echo get_home_url() ?>" target="_blank" class="ui mini circular linkedin icon button" onclick="javascript:window.open(this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"> <i class="linkedin icon"></i></a>
                            <a href="https://plus.google.com/share?url=<?php print(urlencode(the_permalink())) ?>" target="_blank" class="ui mini circular google plus icon button" onclick="window.open(this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><i class="google plus icon"></i></a>
                        </span>
                        <?php
                        $previous_post = get_previous_post();
                        $next_post = get_next_post();
                        ?>
                        <span style="margin-left: 2em">
                            <?php
                            if (!empty($previous_post)):
                                ?>
                                <a href="<?php echo esc_url(get_permalink($previous_post->ID)); ?>" style="text-decoration: none;"><i class="long arrow left icon"></i> <?php _e("Suivant", "siogivedomain"); ?></a>
                            <?php endif; ?>
                            <?php if (!empty($previous_post) && !empty($next_post)): ?>
                                |
                            <?php endif ?>
                            <?php
                            if (!empty($next_post)):
                                ?>
                                <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" style="text-decoration: none;"><?php _e("Précedent", "siogivedomain"); ?> <i class="long arrow right icon"></i></a>
                            <?php endif; ?>
                        </span>
                    </div>
                </div>
                <?php if (has_post_thumbnail()): ?>
                    <div class="image">
                        <img src="<?php the_post_thumbnail_url('full'); ?>">
                    </div>
                <?php endif ?>
                <div class=" content content_page">
                    <p>
                        <?php the_content() ?>
                    </p>
                </div>
                <div class="content">
                    <span><?php _e("Publié dans", "siogivedomain"); ?> : </span>
                    <?php
                    $post_categories = wp_get_post_categories(get_the_ID());
                    ?>
                    <?php foreach ($post_categories as $c): $category = get_category($c); ?>
                        <a href="<?php echo wp_make_link_relative(get_category_link($category->term_id)); ?>"><?php echo $category->name; ?></a>
                    <?php endforeach; ?>
                    <span class="right floated">
                        <?php
                        if (!empty($previous_post)):
                            ?>
                            <a href="<?php echo esc_url(get_permalink($previous_post->ID)); ?>" style="text-decoration: none;"><i class="long arrow left icon"></i> <?php _e("Suivant", "siogivedomain"); ?></a>
                        <?php endif; ?>
                        <?php if (!empty($previous_post) && !empty($next_post)): ?>
                            |
                        <?php endif ?>
                        <?php
                        if (!empty($next_post)):
                            ?>
                            <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" style="text-decoration: none;"><?php _e("Précedent", "siogivedomain"); ?> <i class="long arrow right icon"></i></a>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
            <div class="wide column">
                <?php
                $comments = get_comments(array('post_id' => get_the_ID(), "parent" => 0, "orderby" => "comment_date", "order" => "asc"));
                $comments_count = get_comments_number(get_the_ID())
                ?>
                <div>
                    <div class="ui horizontal divider"> <?php echo $comments_count ?> Commentaires</div>
                    <div class="ui comments">
                        <?php
                        if ($comments && !empty($comments)):
                            ?>
                            <?php
                            foreach ($comments as $comment):
                                $comment_user = get_userdata($comment->user_id);
                                ?>
                                <div class="comment">
                                    <a class="avatar">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 64); ?>
                                    </a>
                                    <div class="content">
                                        <a class="author"><?php echo $comment->comment_author; ?></a>
                                        <div class="metadata">
                                            <?php $date = apply_filters('get_comment_time', $comment->comment_date, 'U', false, true, $comment); ?>
                                            <div class="date">Il y a <?php echo "" . human_time_diff(strtotime($date), current_time('timestamp')); ?></div>
                                        </div>
                                        <div class="text">
                                            <p><?php echo $comment->comment_content; ?></p>
                                        </div>
                                        <div class="actions">
                                            <a id="show_comment_reply_form<?php echo $comment->comment_ID; ?>" onclick="show_comment_reply_form(<?php echo $comment->comment_ID; ?>)" class="reply" style="text-decoration: none"><i class="reply icon"></i><?php echo __("Repondre", "siogivedomain") ?></a>
                                            <a id="hide_comment_reply_form<?php echo $comment->comment_ID; ?>" onclick="hide_comment_reply_form(<?php echo $comment->comment_ID; ?>)" class="reply" style="display: none; text-decoration: none;"><?php echo __("Annuler", "siogivedomain") ?></a>
                                            <?php
                                            $comments_children_count = count(get_comments(array('post_id' => $post_id, "parent" => $comment->comment_ID, "orderby" => "comment_date", "order" => "asc")));
                                            ?>
                                            <?php if ($comments_children_count >= 1): ?>
                                                <a id="show_all_reply_comment<?php echo $comment->comment_ID; ?>" onclick="show_all_reply_comment(<?php echo $comment->comment_ID; ?>)" class="reply"><?php echo $comments_children_count . " " . __("réponse", "siogivedomain") ?>(s)<i class="chevron down icon"></i></a>
                                                <a id="hide_all_reply_comment<?php echo $comment->comment_ID; ?>" onclick="hide_all_reply_comment(<?php echo $comment->comment_ID; ?>)" class="reply" style="display: none;"><?php echo $comments_children_count . " " . __("réponse", "siogivedomain") ?>(s)<i class="chevron up icon"></i></a>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div id="all_reply_comment<?php echo $comment->comment_ID; ?>" style="display: none;">
                                        <?php echo getAndechoAllReply(get_the_ID(), $comment->comment_ID); ?>
                                    </div>
                                </div>
                                <form id="comment_reply_form<?php echo $comment->comment_ID; ?>" class="ui reply form add_comment_reply_form" method="POST" action="<?php the_permalink(); ?>" onsubmit="add_comment_reply(event, <?php echo $comment->comment_ID; ?>)" style="display: none">
                                    <?php if (!is_user_logged_in()): ?>
                                        <div class="two fields">
                                            <div class="field">
                                                <label><?php _e("Votre nom", "siogivedomain"); ?><em>*</em></label>
                                                <div class="one field">
                                                    <div class="field"> 
                                                        <input type="text" name="comment_author" placeholder="<?php _e("Votre nom", "siogivedomain"); ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="field">
                                                <label><?php _e("Votre e-mail", "siogivedomain"); ?><em>*</em></label>
                                                <div class="field">
                                                    <input type="text"  name="comment_author_email" placeholder="Votre e-mail" >
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <div class="field">
                                        <textarea rows="4" name="comment_content" placeholder="<?php _e("Saissez votre reponse", "siogivedomain"); ?>"></textarea>
                                    </div>
                                    <input type="hidden" name="action" value="add-comment-reply">
                                    <input type="hidden" name="post_id" value="<?php the_ID(); ?>">
                                    <input type="hidden" name="comment_parent_id" value="<?php echo $comment->comment_ID; ?>">
                                    <div class="field">
                                        <div id="server_error_message<?php echo $comment->comment_ID; ?>" class="ui negative message" style="display:none">
                                            <i class="close icon"></i>
                                            <div id="server_error_content<?php echo $comment->comment_ID; ?>" class="header"><?php _e("Internal server error", "siogivedomain"); ?></div>
                                        </div>
                                        <div id="error_name_message<?php echo $comment->comment_ID; ?>" class="ui error message" style="display: none">
                                            <i class="close icon"></i>
                                            <div id="error_name_header<?php echo $comment->comment_ID; ?>" class="header"></div>
                                            <ul id="error_name_list<?php echo $comment->comment_ID; ?>" class="list">

                                            </ul>
                                        </div>
                                    </div>
                                    <button class="ui blue submit icon button">
                                        <i class="icon edit"></i> <?php _e("Repondre", "siogivedomain"); ?>
                                    </button>
                                </form>
                                <?php
                            endforeach;
                            wp_reset_postdata();
                            ?>
                        <?php endif ?>
                        <?php //if (is_user_logged_in()): ?>
                        <form id="comment_form" class="ui reply form" method="POST" action="<?php the_permalink() ?>">
                            <input type="hidden" name="action" value="add-comment">
                            <input type="hidden" name="post_id" value="<?php the_ID(); ?>">
                            <?php if (!is_user_logged_in()): ?>
                                <div class="two fields">
                                    <div class="field">
                                        <label><?php _e("Votre nom", "siogivedomain"); ?><em>*</em></label>
                                        <div class="one field">
                                            <div class="field"> 
                                                <input type="text" name="comment_author" placeholder="<?php _e("Votre nom", "siogivedomain"); ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label><?php _e("Votre e-mail", "siogivedomain"); ?><em>*</em></label>
                                        <div class="field">
                                            <input type="text"  name="comment_author_email" placeholder="Votre e-mail" >
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                            <div class="field">
                                <textarea rows="4" id="comment_content"  name="comment_content" placeholder="<?php _e("Votre commentaire", "siogivedomain"); ?>"></textarea>
                            </div>
                            <button id="submit_message" class="ui yellow button">
                                Laisser un commentaire
                            </button>
                        </form>
                        <?php //endif ?>
                    </div>                    
                </div>
            </div>

        </div>
        <!-- Right Sidebar -->
        <div class="five wide column">
            <?php include(locate_template("content-aside-blog.php")); ?>
        </div>
    </div>
</div>