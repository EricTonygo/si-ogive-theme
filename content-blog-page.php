<!-- Content area -->
<div class="ui container content">
    <div class="ui stackable doubling grid">
        <!-- Middle Content -->
        <div class="eleven wide column">
            <div align="center">
                <div class="ui divider horizontal"><h2 class="ui header">Blog d'actualités et conseils</h2></div>
                <?php
                if ($blog_news->have_posts()):
                    ?>
                    <div class="ui items">
                        <?php while ($blog_news->have_posts()): $blog_news->the_post();
                            ?>
                            <div class="item" align="left">
                                <?php if (has_post_thumbnail()): ?>
                                    <a class="image" href="<?php echo wp_make_link_relative(get_permalink()); ?>">
                                        <img src="<?php the_post_thumbnail_url('full'); ?>">
                                    </a>
                                <?php endif ?>
                                <div class="content">
                                    <a class="header post_title" href="<?php echo wp_make_link_relative(get_permalink()); ?>"><?php the_title() ?></a>
                                    <div class="meta">
                                        <?php
                                        $comments_count = wp_count_comments(get_the_ID())->approved;
                                        ?>
                                        <!--<span class="cinema"><?php echo get_the_author() ?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?> <?php _e("ago", "gpdealdomain"); ?> | <?php echo $comments_count; ?> <?php if ($comments_count > 1): ?>comments<?php else: ?><?php endif ?>comment</span>-->
                                    </div>
                                    <div class="description post_title">
                                        <p><?php the_excerpt() ?></p>
                                    </div>
                                    <div class="extra">
                                        <span><?php _e("Publié dans", "gpdealdomain"); ?> : </span>
                                        <?php
                                        $post_categories = wp_get_post_categories(get_the_ID());
                                        ?>
                                        <?php foreach ($post_categories as $c): $category = get_category($c); ?>
                                            <a href="<?php echo wp_make_link_relative(get_category_link($category->term_id)); ?>"><?php echo $category->name; ?></a>
                                        <?php endforeach; ?>
                                        <div class="right floated">
                                            <a href="<?php echo wp_make_link_relative(get_permalink()); ?>">En savoir plus</a>
                                            <i class="right chevron icon"></i>
                                        </div>
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
        <div class="five wide column">
            <?php include(locate_template("content-aside-blog.php")); ?>
        </div>
    </div>
</div>