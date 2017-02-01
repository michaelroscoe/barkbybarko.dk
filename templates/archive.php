<?php
/**
 * Description: 
 *
 * @package Barko
 * @subpackage barkobark.dk
 * @since Version 1.0.0
 * @author Mikkel Tschentscher, hello@mikkeltschentscher.dk
 * @link https://mikkeltschentscher.dk
 *
 */
get_header();
get_template_part('partials/module', 'header'); ?>

<div class="section section-default section-archive">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <?php
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                Sorteret efter nyeste først
                            </div>
                            <div class="col-md-6 text-right">
                                Viser 1-5 af <b>30</b> videoer
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>

                        <?php
                            if ( have_posts() ) : 
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'partials/single', 'video-excerpt' );
                                endwhile;
                                the_posts_pagination( array(
                                    'prev_text' => '<span class="screen-reader-text"></span>',
                                    'next_text' => '<span class="screen-reader-text"></span>',
                                    'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
                                ) );
                            endif;
                        ?>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                Sorteret efter nyeste først
                            </div>
                            <div class="col-md-6 text-right">
                                Viser 1-5 af <b>30</b> videoer
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <aside class="col-md-4 aside">
            <div class="banner-ad-lg"></div>

                <p class="h4">Nyeste videoer</p>
                <ul class="post-list">
                    <li>
                        <a href="#" title="#">7 gode råd: Lær hvalpen at være alene hjemme</a>
                        <span>31. oktober 2016 | Niveau: <a href="#">Begynder</a></span>
                    </li>
                    <li>
                        <a href="#" title="#">Sådan starter du et indkald der holder</a>
                        <span>31. oktober 2016 | Niveau: <a href="#">Begynder</a></span>
                    </li>
                    <li>
                        <a href="#" title="#">Sådan starter du et indkald der holder</a>
                        <span>31. oktober 2016 | Niveau: <a href="#">Begynder</a></span>
                    </li>
                    <li>
                        <a href="#" title="#">11 gode råd: Sådan bør du gå med din hund</a>
                        <span>31. oktober 2016 | Niveau: <a href="#">Begynder</a></span>
                    </li>                                                                        
                </ul>
                <p class="h4">Kategorier</p>
                <ul class="post-list">
                    <li><a href="#">Øvelser</a></li>
                    <li><a href="#">Hundeopdragelse</a></li>
                    <li><a href="#">Tips &amp; Tricks</a></li>
                    <li><a href="#">Diverse</a></li>
                </ul>
            </aside>
        </div>
    </div>
</div>

<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>