<!-- Content area -->
<div class="ui container content">
    <div class="ui stackable doubling grid">
        <!-- Middle Content -->
        <div class="twelve wide column">
            <div id='job_details' class="ui fluid card" <?php if (isset($_SESSION['error_message'])): ?> style="display: none"<?php endif ?>>
                <div class="ui content">
                    <h2 class="header" style="text-transform: uppercase"><?php the_title(); ?></h2>
                    <div class="meta">
                        <!--<span><i class="calendar icon"></i>Publiée le <?php echo get_the_date() ?> à <?php echo get_the_date('H') ?>h<?php echo get_the_date('i') ?> </span>-->
                        <span>
                            Par : <a href=""><?php echo get_avatar( get_the_author_meta( 'ID' ), 16 ); ?> <?php echo get_the_author() ?></a>
                            <?php echo "Il y a ".human_time_diff( get_the_time('U'), current_time('timestamp') ) ; ?>
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
                        <?php if(is_user_logged_in()): ?>
                        <span class="right floated">
                            <a href="#add_reply" class="ui yellow right floated button">Répondre</a>
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
                <div align="center">
                    <div class="ui horizontal divider"> <?php  bbp_topic_reply_count() ?> Réponses</div>
                    <?php
                    $topic_replies = new WP_Query(array('post_type' => bbp_get_reply_post_type(), 'post_per_page' => -1, "post_status" => bbp_get_public_status_id(), 'orderby' => 'post_date', 'order' => 'DESC', "meta_key"=> "_bbp_topic_id", "meta_value"=>  get_the_ID()));
                    if ($topic_replies->have_posts()):
                        ?>
                        <div class="ui items">
                            <?php while ($topic_replies->have_posts()): $topic_replies->the_post();
                                ?>
                                <div class="item" align="left">
                                    <div class="ui tiny image">
                                       <?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?>
                                    </div>
                                    
                                    <div class="content">
                                        <div  class="header"><?php echo get_the_author() ?></div>
                                        <div class="description" align="justify">
                                            <p><?php the_content() ?></p>
                                        </div>
                                        <div class="extra">
                                            <span>
                                                A répondu Il y a <?php echo "".human_time_diff( get_the_time('U'), current_time('timestamp') ) ; ?>
                                            </span>
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
<!--                    <div class="ui right floated pagination menu">
                        <a class="icon item">
                            <i class="left chevron icon"></i>
                        </a>

                        <a class="icon item">
                            <i class="right chevron icon"></i>
                        </a>
                    </div>-->
                </div>
            </div>
            <?php if(is_user_logged_in()): ?>
            <div id='add_reply' class="ui fluid card" >
                <div class="ui content">
                    <h2 class="header" >Répondre au sujet: <?php the_title() ?></h2>
                </div>
                <div class="content content_page">
                    <form id="reply_form" method="POST" action="<?php the_permalink() ?>" class="ui form" enctype="multipart/form-data">

                        <div class="field">                          
                            <textarea id="reply_message" name="reply_message" ></textarea>                           
                        </div>
                        
                        <div class="ui error message"></div>

                        <div align="right">
                            <button id="submit_message" class="ui yellow button">Répondre</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php endif ?>
        </div>
        <!-- Right Sidebar -->
        <div class="four wide column">
           <?php $main_forums = new WP_Query(array('post_type' => bbp_get_forum_post_type(), 'post_per_page' => -1, "post_status" => bbp_get_public_status_id(), 'orderby' => 'post_date', 'order' => 'DESC', 'post_parent'=>0));
                    if ($main_forums->have_posts()): ?>
            <div class="ui fluid vertical menu moderns">
                <a href="<?php echo get_permalink(get_page_by_path(__('forums', 'si-ogivedomain'))) ?>" class="item" style="text-transform: uppercase;"><strong><?php echo get_page_by_path(__('forums', 'si-ogivedomain'))->post_title ?></strong></a>
                    <?php while ($main_forums->have_posts()): $main_forums->the_post(); ?>
                        <div class="item">
                        <i class="angle double right middle aligned icon"></i>
                        <a href="<?php the_permalink(); ?>" > <?php the_title(); ?> </a>
                        </div>
                    <?php endwhile; ?>                             
            </div>
            <?php endif; 
            wp_reset_postdata();?> 

            <div class="ui fluid vertical menu moderns">
                <div class="header item" style="text-transform: uppercase;"><strong><?php echo __('Sujets Recents', 'si-ogivedomain') ?></strong></div>
                <?php
                $topics = new WP_Query(array('post_type' => bbp_get_topic_post_type(), 'post_per_page' => 5, "post_status" => bbp_get_public_status_id(), 'orderby' => 'post_date', 'order' => 'DESC'));
                if ($topics->have_posts()) {
                    while ($topics->have_posts()): $topics->the_post();
                        ?>
                    <div class="item">
                        <i class="angle double right icon"></i>
                        <a href="<?php the_permalink(); ?>" > <?php the_title(); ?> </a> par <a href=""><?php echo get_avatar( get_the_author_meta( 'ID' ), 16 ); ?> <?php echo get_the_author() ?></a>
                         <?php echo "Il y a ".human_time_diff( get_the_time('U'), current_time('timestamp') ) ; ?>
                    </div>
                        <?php
                    endwhile;
                }
                wp_reset_postdata();
                ?>
            </div>
            <div class="ui fluid vertical menu moderns">
                <div class="header item" style="text-transform: uppercase;"><strong><?php echo __('Reponses Recentes', 'si-ogivedomain') ?></strong></div>
                <?php
                $replies = new WP_Query(array('post_type' => bbp_get_reply_post_type(), 'post_per_page' => 5, "post_status" => bbp_get_public_status_id(), 'orderby' => 'post_date', 'order' => 'DESC'));
                if ($replies->have_posts()) {
                    while ($replies->have_posts()): $replies->the_post();
                        ?>
                    <div class="item">
                        <i class="angle double right icon"></i>
                        <a href="<?php the_permalink(); ?>" >  <?php echo wp_trim_words( get_the_content(), 10, '...' ); ?> </a> par <a href=""><?php echo get_avatar( get_the_author_meta( 'ID' ), 16 ); ?> <?php echo get_the_author() ?></a>
                         <?php echo "Il y a ".human_time_diff( get_the_time('U'), current_time('timestamp') ) ; ?>
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