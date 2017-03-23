<!-- Content area -->
<div class="ui container content">
    <div class="ui stackable doubling grid">
        <!-- Middle Content -->
        <div class="twelve wide column">
            <div align="">
                <div class="ui horizontal divider"><h2><?php the_title();?></h2></div>
                <br>
                <div class="ui container">
                    <div class="column content_page">
                            <?php the_content() ?>
                        <form id="contact_form" method="POST" action="<?php the_permalink() ?>" class="ui form">
                            <div class="two fields">
                                <div class="field">
                                    <label for="name">Nom</label>
                                    <input id="name" placeholder="Saisissez votre nom" name="sender_name" type="text">
                                </div>
                                <div class="field">
                                    <label for="email">Email</label>
                                    <input id="email" placeholder="Saisissez votre email" name="sender_email" type="email">
                                </div>
                            </div>
                            <div class="field">
                                <label for="subject">Objet</label>
                                <input id="subject" placeholder="Saisissez l'objet" name="sender_subject" type="text">
                            </div>
                            <div class="field">
                                <label for="message">Message</label>
                                <textarea id="message" name="sender_message" placeholder="Saisissez votre message ici..."></textarea>
                            </div>
                            <div class="field" align="right">
                                <button id="submit_message" class="ui yellow button"><i class="send icon"></i>Laisser un message</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- Right Sidebar -->
        <div class="four wide column">
            <div class="ui fluid vertical menu moderns">
                <div class="item" style="text-transform: uppercase;"><strong><?php echo __('SI OGIVE', 'si-ogivedomain') ?></strong></div>
                <a href="<?php echo get_permalink(get_page_by_path(__('notre-vision', 'si-ogivedomain'))) ?>" class="item"> <?php echo get_page_by_path(__('notre-vision', 'si-ogivedomain'))->post_title ?> </a>
                <a href="<?php echo get_permalink(get_page_by_path(__('a-propos-de-si-ogive', 'si-ogivedomain'))) ?>" class="item"> <?php echo get_page_by_path(__('a-propos-de-si-ogive', 'si-ogivedomain'))->post_title ?> </a>
                <a href="<?php echo get_permalink(get_page_by_path(__('nous-contacter', 'si-ogivedomain'))) ?>" class="header item"> <?php echo get_page_by_path(__('nous-contacter', 'si-ogivedomain'))->post_title ?> </a>
            </div>

            <div class="ui fluid vertical menu moderns">
                <div class="item" style="text-transform: uppercase;"><strong><?php echo __('Nos coordonnées', 'si-ogivedomain') ?></strong></div>
                <div  class="item"><i class="mail outline icon"></i> Siège social Yaoundé BP: 5253</div>
                <div  class="item"><i class="marker icon"></i> Situé à la Nouvelle route Bastos face Ariane TV Rue N°1839</div>
                <div  class="item"><i class="call icon"></i> (+237) 243804388 / 243803895</div>
                <a href="mailto:<?php echo get_bloginfo('admin_email'); ?>" class="item"><i class="mail icon"></i> <?php echo get_bloginfo('admin_email'); ?></a>
            </div>
            
        </div>
    </div>
</div>
<div class="ui divider"></div>
<div class="wide column">
    <div id="map"></div>
</div>