 <?php
/**
 * The Front-page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kedar
 */

get_header();
?>

	<div class="hero js-hero-slider swiper-container">
        <div class="hero__wrapper swiper-wrapper">
        <?php if( have_rows('slider-block') ): ?>
            <?php while ( have_rows('slider-block') ) : the_row(); ?>

                <?php $button = get_sub_field('button'); ?>
                <div class="hero__slide swiper-slide">
                    <div class="hero__bg"><img src="<?php the_sub_field('background-image'); ?>" alt="Slider Image"></div>
                    <div class="hero__info">
                        <h1><?php the_sub_field('title'); ?></h1>
                        <p><?php the_sub_field('description'); ?></p>
                        <a href="<?php echo $button['btn-url']; ?>" class="btn"><?php echo $button['btn-title']; ?></a>
                    </div>
                </div>

            <?php endwhile;?>
        <?php endif; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <?php $adventages = get_field('adventages'); ?>
    <?php if( have_rows('adventages') ): ?>
        <?php while ( have_rows('adventages') ) : the_row(); ?>
        <section class="features">
            <div class="kedar-wrap">
                <h2 class="section-title"><?php echo $adventages['title']; ?></h2>
                <div class="features__wrap">
                <?php if( have_rows('items') ) : ?>
                    <?php while( have_rows('items') ) : the_row(); ?>
                    <div class="features__item">
                        <div class="features__img"><img src="<?php the_sub_field('image'); ?>" alt=""></div>
                        <h3><?php the_sub_field('title'); ?></h3>
                        <p><?php the_sub_field('description'); ?></p>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>
        </section>
        <?php endwhile;?>
    <?php endif; ?>

    <?php $constr = get_field('how-formed'); ?>
    <?php if( $constr ): ?>
        <section class="arrangement">
            <div class="kedar-wrap">
                <h2 class="section-title"><?php echo $constr['title']; ?></h2>
                <div class="arrangement__photos">
                    <div class="arrangement__photo">
                        <img class="desktop" src="<?php echo $constr['shema-1']; ?>" alt="constructions">
                        <img class="mobile" src="<?php echo $constr['shema-1_mob']; ?>" alt="constructions">
                    </div>
                    <div class="arrangement__photo">
                        <img class="desktop" src="<?php echo $constr['shema-1']; ?>" alt="constructions">
                        <img class="mobile" src="<?php echo $constr['shema-2_mob']; ?>" alt="constructions">
                    </div>
                </div>
                <a href="<?php echo $constr['button']['btn-url']; ?>" class="btn arrangement__btn"><?php echo $constr['button']['btn-title']; ?></a>
            </div>
        </section>
    <?php endif; ?>

    <?php $order = get_field('make-order'); ?>
    <?php if( have_rows('make-order') ): ?>
        <?php while ( have_rows('make-order') ) : the_row(); ?>
        <section class="order">
            <div class="kedar-wrap">
                <h2 class="section-title"><?php echo $order['title']; ?></h2>
                <?php if( have_rows('items') ) : ?>
                <ul class="order__wrap">
                    <?php $index = 1; while( have_rows('items') ) : the_row(); ?>
                    <li class="order__step">
                        <div class="order__icon">0<?php echo $index; $index++; ?></div>
                        <h3 class="order__title"><?php the_sub_field('title'); ?></h3>
                        <p class="order__text"><?php the_sub_field('description'); ?></p>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
                <?php $button = $order['button']; ?>
                <a href="#form_width_100" class="btn order__btn"><?php echo $button['btn-title']; ?></a>
            </div>
        </section>
        <?php endwhile;?>
    <?php endif; ?>

    <?php $about = get_field('about'); ?>
    <?php if( $about ): ?>
        <section class="about">
            <div class="kedar-wrap">
                <h2 class="section-title"><?php echo $about['title']; ?></h2>
                <?php if($about['video-link']): ?>
                <div class="about__video video">
                    <div class="video__preview js-preview"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/about.jpg" alt=""></div>
                    <div class="video__embed js-embed" data-src="<?php echo $about['video-link']; ?>"></div>
                </div>
                <?php endif; ?>
                <div class="about__info">
                    <div class="about__logo"><i class="icon-logo-green"></i></div>
                    <p class="about__text"><?php echo $about['description']; ?></p>
                </div>
                <?php $button = $about['button']; ?>
                <a href="<?php echo $button['btn-url']; ?>" class="btn about__btn"><?php echo $button['btn-title']; ?></a>
            </div>
        </section>
    <?php endif; ?>

    <?php $comments = get_field('comments'); ?>
    <?php if( have_rows('comments') ): ?>
        <?php while ( have_rows('comments') ) : the_row(); ?>

        <?php if( have_rows('items') ) : ?>
            <section class="feedback">
                <div class="kedar-wrap">
                    <h2 class="section-title"><?php echo $comments['title']; ?></h2>
                    <div class="feedback__wrap">
                    
                        <?php while( have_rows('items') ) : the_row(); ?>
                    
                        <div class="feedback__item">
                            <div class="feedback__img"><img src="<?php the_sub_field('image'); ?>" alt=""></div>
                            <div class="feedback__body">
                                <p class="feedback__text"><?php the_sub_field('description'); ?></p>
                                <p class="feedback__author"><?php the_sub_field('title'); ?></p>
                            </div>
                        </div>

                        <?php endwhile; ?>
                   
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php endwhile;?>
    <?php endif; ?>

    <?php $partners = get_field('partners'); ?>
    <?php if( have_rows('partners') ): ?>
        <?php while ( have_rows('partners') ) : the_row(); ?>
            <?php if( have_rows('items') ) : ?>
                <section class="partners">
                    <div class="kedar-wrap">
                        <h2 class="section-title"><?php echo $partners['title']; ?></h2>
                        <div class="partners__wrap">
                                <?php while( have_rows('items') ) : the_row(); ?>

                                <?php //the_sub_field('link'); ?>
                                <div class="partners__item"><img src="<?php the_sub_field('link'); ?>" alt="Image icon"></div>

                                <?php endwhile; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endwhile;?>
    <?php endif; ?>

    <?php get_template_part( 'template-parts/content-form' ); ?>
    <?php get_template_part( 'template-parts/content-map' ); ?>


<?php
get_footer();
