<?php
/**
 * Description: Single Video Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Barko
 * @subpackage barkbybarko.dk
 * @since Version 1.0.0
 * @author Mikkel Tschentscher
 * @link https://mikkeltschentscher.dk
 *
 */
get_header();
get_template_part('partials/module', 'header'); ?>

<div class="section section-gray section-video">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="//www.youtube.com/embed/333?rel=0"></iframe>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <h1 class="h4">7 gode råd: Lær hvalpen at være alene hjemme</h1>
                <p>31. oktober 2016 | Niveau: <a href="#">Begynder</a></p>
            </div>
            <div class="col-md-5 text-right">
                <p class="h4">Af <a href="#">Maibritt Lund</a>, <a href="#">Henrik Jørgensen</a></p>
                <p>Kategori: <a href="#">Hundeopdragelse</a>, <a href="#">Øvelser</a></p>
            </div>
        </div>
    </div>
</div>


<div class="section section-default section-tabs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="tab-container">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Videoinformation</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Om underviser</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="lead">Hunden er farveblind, men hører og ser meget bedre end mennesket. </p>
                                <p>Det er vigtig viden for at forstå hundens adfærd og vores interaktion med den.</p>
                                <p>Er alle de signaler, som hunden sender til en anden hund, ved at anvende diverse kropsdele. For at disse signaler skal betragtes som kommunikation, kræves ændringer i modtagerens adfærd, som ikke sker tilfældigt, men netop på grund af afsenderens adfærd. Hunden anvender alle dele af kroppen til at sende meddelelser. Først og fremmest er det hovedet med øjene, tænder, mundvig, ører, øjenbryn, og diverse rynker.</p>
                                <p>Hals, halsstilling og vinkel betyder en del som bekræftigelse af andre signaler.</p>
                            </div>
                            <div class="col-md-6">
                                <div class="banner-ad-md"></div>
                            </div>
                        </div>                        
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">...</div>
                  </div>
                </div>

            </div>
        </div>
    </div>
</div>




<div class="section section-info section-related">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="h4">Relaterede videoer</p>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/22-n8?rel=0"></iframe>
                </div>
                <h2 class="h4">7 gode råd: Lær hvalpen at være alene hjemme</h2>
                <p class="small">31. oktober 2016 | Niveau: <a href="#">Begynder</a></p>
            </div>
            <div class="col-md-3">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/22-n8?rel=0"></iframe>
                </div>
                <h2 class="h4">7 gode råd: Lær hvalpen at være alene hjemme</h2>
                <p class="small">31. oktober 2016 | Niveau: <a href="#">Begynder</a></p>
            </div>
            <div class="col-md-3">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/22-n8?rel=0"></iframe>
                </div>
                <h2 class="h4">7 gode råd: Lær hvalpen at være alene hjemme</h2>
                <p class="small">31. oktober 2016 | Niveau: <a href="#">Begynder</a></p>
            </div>
            <div class="col-md-3">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/22-n8?rel=0"></iframe>
                </div>
                <h2 class="h4">7 gode råd: Lær hvalpen at være alene hjemme</h2>
                <p class="small">31. oktober 2016 | Niveau: <a href="#">Begynder</a></p>
            </div>
        </div>
    </div>
</div>

<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>