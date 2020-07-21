<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kedar
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />

	<!-- Disable tap highlight on IE -->
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="format-detection" content="telephone=no">
	<meta http-equiv="x-rim-auto-match" content="none">


	<?php wp_head(); ?>
</head>

<?php 
    $translations = pll_the_languages(array('raw'=>1));
    $translations['de']['text'] = 'GER';
    $translations['de']['icon'] = "<i class='icon-ger'></i>";
    $translations['en']['text'] = 'ENG';
    $translations['en']['icon'] = "<i class='icon-eng'></i>";
    $translations['ru']['text'] = 'RUS';
    $translations['ru']['icon'] = "<i class='icon-rus'></i>";
?>

<body>

<header class="header <?php if(is_front_page()) echo 'js-header'; else echo 'js-scroll'; ?> ">
    <div class="header__wrap">
        <a href="/" class="header__logo">Kedar</a>
        <nav class="header__menu js-menu">
            <ul class="header__menu-list">
            <?php if( have_rows('menu', 'options') ): ?>
                <?php while ( have_rows('menu', 'options') ) : the_row(); ?>
                    <li>
                        <a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a>
                    </li>
                <?php endwhile;?>
            <?php endif; ?>
            </ul>
            <a href="tel:<?php the_field('global-phone', 'options'); ?>" class="btn btn-o header__phone header__phone_mobile display-tablet"><?php the_field('global-phone', 'options'); ?></a>
            <ul class="header__lang-list-mobile js-lang-dropdown display-tablet">
                <li><a href="/"><i class="icon-rus"></i></a></li>
                <li><a href="/en"><i class="icon-eng"></i></a></li>
                <li><a href="/de"><i class="icon-ger"></i></a></li>
            </ul>
            <button class="js-menu-close header__menu-close display-tablet"><i class="icon-close"></i></button>
        </nav>
        <a href="tel:<?php the_field('global-phone', 'options'); ?>" class="btn btn-o header__phone header__phone_desktop"><?php the_field('global-phone', 'options'); ?></a>
        <!--<button class="header__search js-search"><i class="icon-search"></i></button>-->
        <div class="header__lang hidden-tablet">
            <?php foreach ($translations as $lang) {
                if( $lang['current_lang'] ): ?>
                <div class="header__lang-current js-lang-handler">
                    <span><?php echo $lang['icon']; ?></span>
                    <span><i class="icon-angle-down"></i></span>
                </div>
                <?php endif;
            } ?>
            <ul class="header__lang-list js-lang-dropdown">
            <?php foreach ($translations as $lang) {
                if( !$lang['current_lang'] ): ?>
                    <li>
                        <a href="<?php echo $lang['url']; ?>">
                            <?php echo $lang['icon'].$lang['text']; ?>
                        </a>
                    </li>
                <?php endif; }
            ?>
            </ul>
        </div>
        <div class="header__burger display-tablet js-burger">
            <svg width="31" height="22" viewBox="0 0 31 18" xmlns="http://www.w3.org/2000/svg">
                <line x1="2" y1="19" x2="16" y2="19" stroke="white" stroke-width="2"/>
                <line x1="2" y1="11" x2="29" y2="11" stroke="white" stroke-width="2"/>
                <line x1="2" y1="3" x2="29" y2="3" stroke="white" stroke-width="2"/>
            </svg>                
        </div>
    </div>
</header>

<main>