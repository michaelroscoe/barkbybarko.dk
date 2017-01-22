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

<div class="section section-default">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>HundeOpdragelse</h1>
                <p>Det kan være en stor omvæltning for både menneske og hund, når Fido flytter ind bag husets fire vægge. Skal du til at anskaffe dig en hund, eller har du lige fået en, så vil du måske finde disse råd fra hundeinstruktør Aino Pedersen nyttige.</p>
                <div class="row">
                    <div class="col-md-12">
                        Sorteret efter nyeste først
                        Viser 1-5 af 30 videoer
                        <hr>
                        <article class="row">
                            <div class="col-md-6">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/22-n8?rel=0"></iframe>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </article>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</div>

<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>