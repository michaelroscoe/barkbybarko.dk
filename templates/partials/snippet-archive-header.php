<?php
/**
 *  Description:
 *
 *  * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Barko
 * @subpackage barkbybarko.dk
 * @since Version 1.0.0
 * @author Mikkel Tschentscher
 * @link https://mikkeltschentscher.dk
 */
?>


<div class="col-md-12">
    <div class="row">
        <div class="col-md-8">
            <?php
                the_archive_title( '<h1>', '</h1>' );
                the_archive_description( '', '' );
            ?>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
</div>