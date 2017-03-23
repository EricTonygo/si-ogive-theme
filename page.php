<?php
get_header();

//the_content();
?>
<?php if (bbp_has_forums()) : ?>

    <?php while (bbp_forums()) : bbp_the_forum(); ?>

        <a class="bbp-forum-title" href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a>

    <?php endwhile; ?>

<?php else : ?>

    <h2>No Forums</h2>

<?php endif; ?>
<?php
get_footer();
