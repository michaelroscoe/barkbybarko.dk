<?php
/**
 * Description: Global Header Template
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
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php wp_title(); ?></title>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="wrapper">