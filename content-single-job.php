<!-- Content area -->
<div class="ui container content">
    <div class="ui stackable doubling grid">
        <!-- Middle Content -->
        <div class="twelve wide column">
            <?php if (isset($_SESSION['success_message'])): ?>
                <div  class="ui success message">
                    <div class="content">
                        <div class="header" style="font-weight: normal;"> 
                            <?php
                            if (isset($_SESSION['success_message'])) {
                                echo $_SESSION['success_message'];
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="ui error message">
                    <div class="content">
                        <div class="header" style="font-weight: normal;"> 
                            <?php
                            if (isset($_SESSION['error_message'])) {
                                echo $_SESSION['error_message'];
                            }
                            ?> 
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <div id='job_details' class="ui fluid card" <?php if (isset($_SESSION['error_message'])): ?> style="display: none"<?php endif ?>>
                <div class="ui content">

                    <h2 class="header" style="text-transform: uppercase"><?php the_title() ?></h2>
                    <div class="meta">
                        <span><i class="calendar icon"></i>Publiée le <?php echo get_the_date() ?> à <?php echo get_the_date('H') ?>h<?php echo get_the_date('i') ?> </span>
                        <span style="margin-left: 2em">
                            <strong>Partager l'offre sur:</strong>
                        </span>
                        <span style="margin-left: 1em">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php print(urlencode(the_permalink())) ?>&title=<?php print(urlencode(the_title())) ?>" target="_blank" class="ui mini circular facebook icon button" onclick="javascript:window.open(this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><i class="facebook icon"></i>  </a>
                            <a href="https://twitter.com/intent/tweet?status=<?php print(urlencode(the_title())) ?>+<?php print(urlencode(the_permalink())) ?>" target="_blank" class="ui mini circular twitter icon button" onclick="javascript:window.open(this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><i class="twitter icon"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php print(urlencode(the_permalink())) ?>&title=<?php print(urlencode(the_title())) ?>&source=<?php echo get_home_url() ?>" target="_blank" class="ui mini circular linkedin icon button" onclick="javascript:window.open(this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"> <i class="linkedin icon"></i></a>
                            <a href="https://plus.google.com/share?url=<?php print(urlencode(the_permalink())) ?>" target="_blank" class="ui mini circular google plus icon button" onclick="window.open(this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><i class="google plus icon"></i></a>
                            <!--<a href="whatsapp://send?text=<?php the_excerpt() ?> <?php print(urlencode(the_permalink())) ?>" data-action="share/whatsapp/share" class="ui circular green whatsapp icon button"><i class="whatsapp icon"></i></a>-->
                        </span>
                        <span class="right floated">
                            <button id="apply_job_top" class="ui yellow button">POSTULER MAINTENANT</button>
                        </span>
                    </div>
                </div>
                <div class=" content content_page">
                    <p>
                        <?php the_content() ?>
                    </p>
                </div>
                <div align="right">
                    <button id="apply_job" class="ui yellow button">POSTULER MAINTENANT</button>
                </div>
            </div>
            <div id='application_job' class="ui fluid card" <?php if (!isset($_SESSION['error_message'])): ?> style="display: none"<?php endif ?>>
                <div class="ui content">
                    <h2 class="header" style="text-transform: uppercase;">Candidature à l'offre d'emploi : <?php the_title() ?></h2>
                </div>
                <div class="content content_page">
                    <form id="apply_job_form" method="POST" action="<?php the_permalink() ?>" class="ui form" enctype="multipart/form-data">
                        <div class="two fields">
                            <div class="four wide field">
                                <label for="firstname">Prénom</label>
                            </div>
                            <div class="twelve wide field">
                                <input id="firstname" placeholder="Saisissez votre prénom" name="firstname" type="text" value="<?php echo $firstname; ?>">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="four wide field">
                                <label for="lastname">Nom <span>*</span></label>
                            </div>
                            <div class="twelve wide field">
                                <input id="lastname" placeholder="Saisissez votre nom" name="lastname" type="text" value="<?php echo $lastname; ?>">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="four wide field">
                                <label for="email">Email <span>*</span></label>
                            </div>
                            <div class="twelve wide field">
                                <input id="email" placeholder="Saisissez votre email" name="email" type="email" value="<?php echo $email; ?>">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="four wide field">
                                <label for="phone">Téléphone <span>*</span></label>
                            </div>
                            <div class="twelve wide field">
                                <input id="phone" placeholder="Saisissez votre numéro de téléphone" name="phone" type="text" value="<?php echo $phone; ?>">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="four wide field">
                                <label for="address">Adresse</label>
                            </div>
                            <div class="twelve wide field">
                                <input id="address" placeholder="Saisissez votre adresse" name="address" type="text" value="<?php echo $address; ?>">
                            </div>
                        </div>
                        <?php
//                                    $countries_tmp = get_country_list();
//                                    var_dump($countries_tmp[0]);
                        ?>
                        <div class="two fields">
                            <div class="four wide field">
                                <label for="country">Pays</label>
                            </div>
                            <div class="twelve wide field">
                                <select name="country" class="ui search fluid dropdown">
                                    <option value="">Selectionner votre pays</option>
                                    <?php
                                    $countries = get_country_list();
                                    foreach ($countries as $my_country) :
                                        ?>
                                        <option value="<?php echo get_object_vars($my_country->translations)['fr'] ?>" <?php if (get_object_vars($my_country->translations)['fr'] == $country): ?> selected="selected" <?php endif ?>><?php echo get_object_vars($my_country->translations)['fr'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="four wide field">
                                <label for="qualifications">Qualifications</label>
                            </div>
                            <div class="twelve wide field">
                                <textarea id="qualification" name="qualifications" > <?php echo $qualifications; ?></textarea>
                            </div>
                        </div>

                        <div class="two fields">
                            <div class="four wide field">
                                <label for="lastdiploma">Dernier Diplôme</label>
                            </div>
                            <div class="twelve wide field">
                                <input id="lastdiploma" placeholder="Saisissez le nome de votre dernier diplôme" name="lastdiploma" type="text" value="<?php echo $lastdiploma; ?>">
                            </div>
                        </div>

                        <div class="two fields">
                            <div class="four wide field">
                                <label for="skills">Compétences</label>
                            </div>
                            <div class="twelve wide field">
                                <textarea id="skills" name="skills" ><?php echo $skills; ?></textarea>
                            </div>
                        </div>

                        <div class="two fields">
                            <div class="four wide field">
                                <label for="experience">Expérience</label>
                            </div>
                            <div class="twelve wide field">
                                <input id="experience" placeholder="Saisissez votre nombre d'années d'expérience" name="experience" type="text" value="<?php echo $experience; ?>">
                            </div>
                        </div>

                        <div class="two fields">
                            <div class="four wide field">
                                <label for="cv">CV</label>
                            </div>
                            <div class="twelve wide field">
                                <input id="cv"  name="cv" type="file">
                            </div>
                        </div>

                        <div class="ui error message"></div>

                        <div align="right">
                            <button id="cancel_apply_job" class="ui grey button"> REVENIR A L'OFFRE D'EMPLOI</button>
                            <button id="submit_apply_job" class="ui yellow button"><i class="send icon"></i>ENVOYER VOTRE CANDIDATURE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Right Sidebar -->
        <div class="four wide column">
            <div class="ui fluid vertical menu moderns">
                <a href="<?php echo get_permalink(get_page_by_path(__('offres-demploi', 'si-ogivedomain'))) ?>" class="item" style="text-transform: uppercase;"><strong><?php echo get_page_by_path(__('offres-demploi', 'si-ogivedomain'))->post_title ?></strong></a>
                <?php
                $categories = get_term_children(get_category_by_slug('offres-d-emploi')->term_id, 'category');
                foreach ($categories as $id) : $category = get_term_by('id', $id, 'category')
                    ?>
                    <a href="<?php echo get_category_link($category->term_id) ?>" class="<?php if (in_category(__($category->slug))): ?> header <?php endif ?> item"> <?php echo $category->name ?>(<?php echo $category->count ?>) </a>
                <?php endforeach; ?>
            </div>
            <div class="ui fluid vertical menu moderns">
                <div class="item" style="text-transform: uppercase;"><strong><?php echo __('Nos coordonnées', 'si-ogivedomain') ?></strong></div>
                <div  class="item"><i class="mail outline icon"></i> Siège social Yaoundé BP: 5253</div>
                <div  class="item"><i class="marker icon"></i> Situé à la Nouvelle route Bastos face Ariane TV Rue N°1839</div>
                <div  class="item"><i class="call icon"></i> (+237) 243804388 / 243803895</div>
                <a href="mailto:<?php echo get_bloginfo('admin_email'); ?>" class="item"><i class="mail icon"></i> <?php echo get_bloginfo('admin_email'); ?></a>
            </div>
            <!--            <div class="ui segments moderns">
                            <div class="ui header segment">
                                Picture Article
                            </div>
                            <div class="ui segment">
                                <div class="owl-carousel" id="single-slider">
                                    <div class="item">
                                        <p><img class="ui rounded image" src="assets/img/400x400.png"></p>
                                        <div align="justify">
                                            <div class="ui header">Learn About Angular 2</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et perspiciatis velit ducimus, reiciendis eius dolor culpa, laudantium modi minus voluptatum eveniet beatae, aperiam totam praesentium aut doloribus nemo minima a.</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <p><img class="ui rounded image" src="assets/img/400x400.png"></p>
                                        <div align="justify">
                                            <div class="ui header">How to make Chat App</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus fugit nesciunt omnis impedit veniam. Inventore praesentium quas, rerum similique, voluptatibus sit dolorum, voluptatum, voluptate fugiat asperiores reprehenderit cupiditate unde quibusdam!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui secondary segment">
                                Other Content
                            </div>
                        </div>-->
        </div>
    </div>
</div>
