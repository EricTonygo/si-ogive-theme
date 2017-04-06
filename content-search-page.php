<!-- Content area -->
<div class="ui container content">
    <div class="ui stackable grid">
        <!-- Middle Content -->
        <div class="wide column">
            <div align="center">
                <div class="ui divider horizontal"><h2 class="ui header">RESULTATS DE LA RECHERCHE</h2></div>
                <?php
                if (have_posts()):
                    ?>
                    <div class="ui items">
                        <?php while (have_posts()): the_post();
                            ?>
                            <div class="item" align="left">
                                <div class="content">
                                    <a href="<?php the_permalink() ?>" class="header"><?php the_title() ?></a>
                                    <div class="meta">
                                        <span><i class="calendar icon"></i>Publié  <?php echo " il y a " . human_time_diff(get_the_time('U'), current_time('timestamp')); ?> </span>
                                    </div>
                                    <div class="description" align="justify">
                                        <p><?php the_excerpt() ?></p>
                                    </div>
<!--                                    <div class="extra">
                                        <a href="<?php the_permalink() ?>" class="ui yellow right floated button">Détails de l'offre</a>
                                    </div>-->
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
    </div>
</div>