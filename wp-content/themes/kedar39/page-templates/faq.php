<?php
/*
Template Name: FAQ
*/
get_header(); ?>

<div class="kedar-hero kedar-hero--plain">
    <div class="kedar-wrap">
        <div class="kedar-hero__wrap">
            <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
            <h1 class="section-title"><?php the_title(); ?></h1>
        </div>
    </div>
</div>

<?php if( have_rows('punkty') ): ?>
<div class="faq">
    <div class="kedar-wrap">
        <div class="faq__wrap js-accordion">
        <?php while ( have_rows('punkty') ) : the_row(); ?>
            <div class="faq__item js-accordion-item">
                <div class="faq__head js-accordion-btn">
                    <h2 class="faq__question"><?php the_sub_field('title'); ?></h2>
                    <span><i class="icon-faq"></i></span>
                </div>
                <div class="faq__content js-accordion-content">
                    <p><?php the_sub_field('description'); ?></p>
                </div>
            </div>
        <?php endwhile;?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php get_template_part( 'template-parts/content-form' ); ?>

<?php
get_footer();